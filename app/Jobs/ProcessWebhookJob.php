<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Course;
use App\Enums\PaymentStatus;
use App\Services\UserRegistrationService;
use App\Services\NotificationService;
use App\Services\Midtrans\MidtransPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\WebhookLog;

class ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $webhookData;
    public ?int $webhookLogId = null;
    public int $tries = 3;
    public int $maxExceptions = 3;
    public int $timeout = 300; // 5 minutes
    public int $backoff = 30; // 30 seconds between retries

    /**
     * Create a new job instance.
     */
    public function __construct(array $webhookData, ?int $webhookLogId = null)
    {
        $this->webhookData = $webhookData;
        $this->webhookLogId = $webhookLogId;
        $this->onQueue('webhooks'); // Use dedicated queue for webhooks
    }

    /**
     * Execute the job.
     */
    public function handle(
        MidtransPayment $midtrans,
        UserRegistrationService $userRegistrationService,
        NotificationService $notificationService
    ): void {
        $webhookLog = null;
        
        // Get or create webhook log
        if ($this->webhookLogId) {
            $webhookLog = WebhookLog::find($this->webhookLogId);
        }
        
        if (!$webhookLog) {
            $webhookLog = $this->createWebhookLog();
        }
        
        // Mark as processing
        $webhookLog->markAsProcessing($this->job->getJobId());

        Log::info('Processing webhook job started', [
            'order_id' => $this->webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $this->webhookData['transaction_status'] ?? 'unknown',
            'job_id' => $this->job->getJobId(),
            'webhook_log_id' => $webhookLog->id,
            'attempt' => $this->attempts()
        ]);

        try {
            // Validate webhook first
            $validation = $midtrans->validateWebhookNotification($this->webhookData);

            if (!$validation['valid']) {
                Log::warning('Invalid webhook signature in job', [
                    'webhook_data' => $this->webhookData,
                    'validation' => $validation,
                    'webhook_log_id' => $webhookLog->id
                ]);
                
                $webhookLog->markAsFailed('Invalid webhook signature');
                $this->fail('Invalid webhook signature');
                return;
            }

            // Store validation data
            $webhookLog->update(['validation_data' => $validation]);

            // Process the notification
            $this->processNotification(
                $validation,
                $userRegistrationService,
                $notificationService
            );

            // Mark as completed
            $webhookLog->markAsCompleted();

            Log::info('Webhook job completed successfully', [
                'order_id' => $validation['order_id'],
                'transaction_status' => $validation['transaction_status'],
                'job_id' => $this->job->getJobId(),
                'webhook_log_id' => $webhookLog->id,
                'processing_time' => $webhookLog->processing_time_seconds
            ]);

        } catch (\Exception $e) {
            $webhookLog->markAsFailed($e->getMessage());
            
            Log::error('Webhook job processing failed', [
                'order_id' => $this->webhookData['order_id'] ?? 'unknown',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'job_id' => $this->job->getJobId(),
                'webhook_log_id' => $webhookLog->id,
                'attempt' => $this->attempts()
            ]);

            // Don't retry for validation errors or user not found
            if ($e instanceof \InvalidArgumentException || 
                str_contains($e->getMessage(), 'not found')) {
                $this->fail($e);
                return;
            }

            throw $e; // Let Laravel handle retries for other exceptions
        }
    }

    /**
     * Create webhook log entry
     */
    private function createWebhookLog(): WebhookLog
    {
        return WebhookLog::create([
            'order_id' => $this->webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $this->webhookData['transaction_status'] ?? 'unknown',
            'payment_type' => $this->webhookData['payment_type'] ?? null,
            'fraud_status' => $this->webhookData['fraud_status'] ?? null,
            'gross_amount' => $this->webhookData['gross_amount'] ?? null,
            'status' => 'pending',
            'received_at' => now(),
            'webhook_data' => $this->webhookData,
        ]);
    }

    /**
     * Process webhook notification
     */
    private function processNotification(
        array $validation,
        UserRegistrationService $userRegistrationService,
        NotificationService $notificationService
    ): void {
        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];

        Log::info('Processing webhook notification in job', [
            'order_id' => $orderId,
            'transaction_status' => $transactionStatus,
            'validation' => $validation
        ]);

        // Use database transaction to ensure atomicity
        DB::transaction(function () use ($validation, $orderId, $transactionStatus, $userRegistrationService, $notificationService) {
            $handlers = [
                'capture' => fn() => $this->handleCaptureStatus($validation, $userRegistrationService, $notificationService),
                'settlement' => fn() => $this->handleSuccessfulPayment($orderId, $validation, $userRegistrationService, $notificationService),
                'pending' => fn() => $this->handlePendingPayment($orderId, $validation, $notificationService),
                'deny' => fn() => $this->handleFailedPayment($orderId, $validation, $notificationService),
                'cancel' => fn() => $this->handleCancelledPayment($orderId, $validation, $notificationService),
                'expire' => fn() => $this->handleExpiredPayment($orderId, $validation, $notificationService),
            ];

            if (isset($handlers[$transactionStatus])) {
                $handlers[$transactionStatus]();
            } else {
                Log::warning("Unhandled transaction status in job: {$transactionStatus}", $validation);
            }
        });
    }

    /**
     * Handle capture status with fraud check
     */
    private function handleCaptureStatus(
        array $validation,
        UserRegistrationService $userRegistrationService,
        NotificationService $notificationService
    ): void {
        $fraudStatus = $validation['fraud_status'];
        $orderId = $validation['order_id'];

        switch ($fraudStatus) {
            case 'accept':
                $this->handleSuccessfulPayment($orderId, $validation, $userRegistrationService, $notificationService);
                break;
            case 'challenge':
                $this->handleChallengedPayment($orderId, $validation, $notificationService);
                break;
            default:
                $this->handleFailedPayment($orderId, $validation, $notificationService);
        }
    }

    /**
     * Handle successful payment
     */
    private function handleSuccessfulPayment(
        string $orderId,
        array $validation,
        UserRegistrationService $userRegistrationService,
        NotificationService $notificationService
    ): void {
        Log::info("Processing successful payment in job for order: {$orderId}");

        $user = User::where('order_id', $orderId)->first();
        if (!$user) {
            Log::error("User not found for order_id: {$orderId}");
            throw new \InvalidArgumentException("User not found for order_id: {$orderId}");
        }

        // Prevent duplicate processing
        if ($user->payment_status === PaymentStatus::COMPLETED->value) {
            Log::info("Payment already processed for order: {$orderId}");
            return;
        }

        $course = Course::find($user->course_id);
        if (!$course) {
            Log::error("Course not found for user: {$user->id}, course_id: {$user->course_id}");
            throw new \InvalidArgumentException("Course not found for user");
        }

        // Update payment status first
        $user->update([
            'payment_status' => PaymentStatus::COMPLETED->value,
            'paid_at' => now(),
        ]);

        // Handle user registration and notifications
        try {
            $userRegistrationService->processUserAccess($user, $course);
        } catch (\Exception $e) {
            // Log error but don't fail the job - payment is already confirmed
            Log::error("User registration failed for order {$orderId}", [
                'error' => $e->getMessage(),
                'user_id' => $user->id
            ]);

            // Send fallback notification
            $notificationService->sendPaymentSuccessNotifications(
                $user,
                $course,
                null,
                'Payment confirmed. Account setup is in progress. Support will contact you if needed.'
            );
        }

        Log::info("Payment processed successfully in job for order: {$orderId}", [
            'user_id' => $user->id,
            'course_id' => $course->id
        ]);
    }

    /**
     * Handle challenged payment
     */
    private function handleChallengedPayment(
        string $orderId,
        array $validation,
        NotificationService $notificationService
    ): void {
        Log::warning("Payment challenged in job for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::CHALLENGED);
        
        // TODO: Implement manual review process
        // Could dispatch another job for admin notification
    }

    /**
     * Handle failed payment
     */
    private function handleFailedPayment(
        string $orderId,
        array $validation,
        NotificationService $notificationService
    ): void {
        Log::info("Payment failed in job for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::FAILED);
        
        // Send failure notification
        $user = User::where('order_id', $orderId)->first();
        if ($user) {
            $course = Course::find($user->course_id);
            if ($course) {
                $notificationService->sendPaymentFailureNotification(
                    $user,
                    $course,
                    $validation['transaction_status'] ?? 'Payment processing failed'
                );
            }
        }
    }

    /**
     * Handle cancelled payment
     */
    private function handleCancelledPayment(
        string $orderId,
        array $validation,
        NotificationService $notificationService
    ): void {
        Log::info("Payment cancelled in job for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::CANCELLED);
    }

    /**
     * Handle expired payment
     */
    private function handleExpiredPayment(
        string $orderId,
        array $validation,
        NotificationService $notificationService
    ): void {
        Log::info("Payment expired in job for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::EXPIRED);
        
        // Send expiry notification
        $user = User::where('order_id', $orderId)->first();
        if ($user) {
            $course = Course::find($user->course_id);
            if ($course) {
                $notificationService->sendPaymentFailureNotification(
                    $user,
                    $course,
                    'Payment session has expired. Please try again.'
                );
            }
        }
    }

    /**
     * Handle pending payment
     */
    private function handlePendingPayment(
        string $orderId,
        array $validation,
        NotificationService $notificationService
    ): void {
        Log::info("Payment pending in job for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::PENDING);
        
        // Send reminder notification
        $user = User::where('order_id', $orderId)->first();
        if ($user) {
            $course = Course::find($user->course_id);
            if ($course) {
                $notificationService->sendPaymentReminderNotification($user, $course);
            }
        }
    }

    /**
     * Update payment status
     */
    private function updatePaymentStatus(string $orderId, PaymentStatus $status): void
    {
        $user = User::where('order_id', $orderId)->first();
        
        if ($user) {
            $user->update(['payment_status' => $status->value]);
            
            Log::info("Updated payment status in job", [
                'order_id' => $orderId,
                'user_id' => $user->id,
                'status' => $status->value
            ]);
        } else {
            Log::warning("User not found for order_id in job: {$orderId}");
        }
    }

    /**
     * Handle job failure
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('Webhook job failed permanently', [
            'webhook_data' => $this->webhookData,
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
            'job_id' => $this->job->getJobId() ?? 'unknown'
        ]);

        // TODO: Implement failure handling
        // - Send alert to admin
        // - Store failed webhook for manual processing
        // - Create monitoring alert
    }

    /**
     * Get the tags that should be assigned to the job
     */
    public function tags(): array
    {
        return [
            'webhook',
            'payment',
            'order:' . ($this->webhookData['order_id'] ?? 'unknown'),
            'status:' . ($this->webhookData['transaction_status'] ?? 'unknown')
        ];
    }
}