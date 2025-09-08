<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use App\Enums\PaymentStatus;
use App\Services\Midtrans\MidtransPayment;
use App\Services\Midtrans\Exceptions\MidtransException;
use App\Jobs\ProcessWebhookJob;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PaymentService
{
    public function __construct(
        private MidtransPayment $midtrans,
        private UserRegistrationService $userRegistrationService,
        private NotificationService $notificationService
    ) {}

    /**
     * Create a new payment
     */
    public function createPayment(array $data): array
    {
        $validatedData = $this->validatePaymentData($data);

        return DB::transaction(function () use ($validatedData) {
            $course = Course::findOrFail($validatedData['course_id']);
            $orderId = Str::uuid()->toString();

            // Create user record with pending status
            $user = $this->createUserRecord($validatedData, $orderId);

            // Create payment
            $paymentData = $this->buildPaymentData($validatedData, $course, $orderId);
            $result = $this->midtrans->createPayment($paymentData);

            // Update user with payment token
            $user->update([
                'payment_token' => $result['token'] ?? null,
                'payment_status' => PaymentStatus::PENDING->value
            ]);

            Log::info('Payment created successfully', [
                'order_id' => $orderId,
                'user_id' => $user->id,
                'course_id' => $course->id
            ]);

            return $result;
        });
    }

    /**
     * Create simple payment
     */
    public function createSimplePayment(array $data): array
    {
        $validatedData = $this->validateSimplePaymentData($data);

        try {
            $customer = ['email' => $validatedData['customer_email']];
            
            return $this->midtrans->createSimplePayment(
                $validatedData['method'],
                $validatedData['order_id'],
                $validatedData['amount'],
                $customer
            );
        } catch (MidtransException $e) {
            Log::error('Simple payment creation failed', [
                'error' => $e->getMessage(),
                'data' => $validatedData
            ]);
            throw $e;
        }
    }

    /**
     * Get payment status
     */
    public function getPaymentStatus(string $orderId): array
    {
        return $this->midtrans->getPaymentStatus($orderId);
    }

    /**
     * Cancel payment
     */
    public function cancelPayment(string $orderId): array
    {
        $result = $this->midtrans->cancelPayment($orderId);
        
        // Update local status
        $this->updatePaymentStatus($orderId, PaymentStatus::CANCELLED);
        
        return $result;
    }

    /**
     * Handle webhook notification (legacy - now mostly for fallback)
     */
    public function handleWebhook(array $notification): void
    {
        $validation = $this->midtrans->validateWebhookNotification($notification);

        if (!$validation['valid']) {
            Log::warning('Invalid webhook signature', ['notification' => $notification]);
            throw new \InvalidArgumentException('Invalid webhook signature');
        }

        $this->processNotification($validation);
    }

    /**
     * Get webhook job statistics
     */
    public function getWebhookJobStats(): array
    {
        $cacheKey = 'webhook_stats';
        
        return Cache::remember($cacheKey, 300, function () { // 5 minutes cache
            $stats = [
                'pending_jobs' => 0,
                'failed_jobs' => 0,
                'completed_jobs_today' => 0,
                'avg_processing_time' => 0,
                'last_24h_stats' => [],
                'queue_status' => 'unknown'
            ];

            try {
                // Get queue statistics (implementation depends on queue driver)
                $queueConnection = config('queue.default');
                
                if ($queueConnection === 'database') {
                    $stats['pending_jobs'] = DB::table('jobs')
                        ->where('queue', 'webhooks')
                        ->count();
                    
                    $stats['failed_jobs'] = DB::table('failed_jobs')
                        ->where('payload', 'like', '%ProcessWebhookJob%')
                        ->whereDate('failed_at', today())
                        ->count();
                }

                // Get processing statistics from logs or dedicated tracking table
                $stats['completed_jobs_today'] = $this->getCompletedWebhookJobsToday();
                $stats['avg_processing_time'] = $this->getAverageProcessingTime();
                $stats['last_24h_stats'] = $this->getLast24HourStats();
                $stats['queue_status'] = $this->getQueueStatus();

            } catch (\Exception $e) {
                Log::error('Failed to get webhook statistics', [
                    'error' => $e->getMessage()
                ]);
            }

            return $stats;
        });
    }

    /**
     * Retry failed webhook jobs
     */
    public function retryFailedWebhookJobs(int $limit = 10): array
    {
        $results = [
            'retried' => 0,
            'failed' => 0,
            'jobs' => []
        ];

        try {
            // Get failed jobs from database (if using database queue driver)
            if (config('queue.default') === 'database') {
                $failedJobs = DB::table('failed_jobs')
                    ->where('payload', 'like', '%ProcessWebhookJob%')
                    ->whereDate('failed_at', '>=', now()->subDays(7)) // Only retry jobs from last 7 days
                    ->limit($limit)
                    ->get();

                foreach ($failedJobs as $failedJob) {
                    try {
                        $payload = json_decode($failedJob->payload, true);
                        $webhookData = $payload['data']['webhookData'] ?? null;
                        
                        if ($webhookData) {
                            // Re-dispatch the job
                            ProcessWebhookJob::dispatch($webhookData)
                                ->onQueue('webhooks')
                                ->delay(now()->addSeconds(5));
                            
                            // Remove from failed jobs table
                            DB::table('failed_jobs')->where('id', $failedJob->id)->delete();
                            
                            $results['retried']++;
                            $results['jobs'][] = [
                                'job_id' => $failedJob->id,
                                'order_id' => $webhookData['order_id'] ?? 'unknown',
                                'status' => 'retried'
                            ];

                            Log::info('Failed webhook job retried', [
                                'job_id' => $failedJob->id,
                                'order_id' => $webhookData['order_id'] ?? 'unknown'
                            ]);
                        }
                    } catch (\Exception $e) {
                        $results['failed']++;
                        $results['jobs'][] = [
                            'job_id' => $failedJob->id,
                            'status' => 'retry_failed',
                            'error' => $e->getMessage()
                        ];

                        Log::error('Failed to retry webhook job', [
                            'job_id' => $failedJob->id,
                            'error' => $e->getMessage()
                        ]);
                    }
                }
            }

        } catch (\Exception $e) {
            Log::error('Error retrying failed webhook jobs', [
                'error' => $e->getMessage()
            ]);
            
            throw $e;
        }

        return $results;
    }

    /**
     * Monitor webhook processing health
     */
    public function getWebhookHealthStatus(): array
    {
        $health = [
            'status' => 'healthy',
            'issues' => [],
            'recommendations' => []
        ];

        try {
            $stats = $this->getWebhookJobStats();
            
            // Check for high failure rate
            $totalJobs = $stats['completed_jobs_today'] + $stats['failed_jobs'];
            if ($totalJobs > 0) {
                $failureRate = ($stats['failed_jobs'] / $totalJobs) * 100;
                
                if ($failureRate > 20) {
                    $health['status'] = 'unhealthy';
                    $health['issues'][] = "High failure rate: {$failureRate}%";
                    $health['recommendations'][] = 'Check webhook processing logs and Midtrans connectivity';
                } elseif ($failureRate > 10) {
                    $health['status'] = 'warning';
                    $health['issues'][] = "Elevated failure rate: {$failureRate}%";
                    $health['recommendations'][] = 'Monitor webhook processing closely';
                }
            }
            
            // Check for queue backlog
            if ($stats['pending_jobs'] > 50) {
                $health['status'] = 'warning';
                $health['issues'][] = "High number of pending jobs: {$stats['pending_jobs']}";
                $health['recommendations'][] = 'Consider scaling queue workers';
            }
            
            // Check average processing time
            if ($stats['avg_processing_time'] > 60) { // More than 60 seconds
                $health['status'] = 'warning';
                $health['issues'][] = "Slow processing time: {$stats['avg_processing_time']}s";
                $health['recommendations'][] = 'Investigate slow webhook processing';
            }

        } catch (\Exception $e) {
            $health['status'] = 'error';
            $health['issues'][] = 'Unable to check webhook health';
            $health['recommendations'][] = 'Check application logs and monitoring systems';
        }

        return $health;
    }

    /**
     * Get available payment methods
     */
    public function getAvailablePaymentMethods(): array
    {
        return $this->midtrans->getAvailablePaymentMethods();
    }

    /**
     * Test connection
     */
    public function testConnection(): array
    {
        return $this->midtrans->testConnection();
    }

    /**
     * Get configuration
     */
    public function getConfig(): array
    {
        return $this->midtrans->getConfig();
    }

    // ============= PRIVATE METHODS =============

    /**
     * Get completed webhook jobs count for today
     */
    private function getCompletedWebhookJobsToday(): int
    {
        // This could be implemented using a dedicated tracking table
        // or by analyzing logs. For now, return a placeholder
        try {
            // Example implementation using a hypothetical webhook_logs table
            // return DB::table('webhook_logs')
            //     ->where('status', 'completed')
            //     ->whereDate('created_at', today())
            //     ->count();
            
            return 0; // Placeholder
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get average processing time for webhook jobs
     */
    private function getAverageProcessingTime(): float
    {
        // This could be calculated from job execution logs
        // For now, return a placeholder
        try {
            // Example implementation
            // return DB::table('webhook_logs')
            //     ->whereDate('created_at', today())
            //     ->avg('processing_time') ?? 0;
            
            return 0.0; // Placeholder
        } catch (\Exception $e) {
            return 0.0;
        }
    }

    /**
     * Get statistics for the last 24 hours
     */
    private function getLast24HourStats(): array
    {
        // Return hourly breakdown of webhook processing
        $stats = [];
        
        for ($i = 23; $i >= 0; $i--) {
            $hour = now()->subHours($i);
            $stats[] = [
                'hour' => $hour->format('H:00'),
                'processed' => 0, // Placeholder
                'failed' => 0,    // Placeholder
            ];
        }
        
        return $stats;
    }

    /**
     * Get queue status
     */
    private function getQueueStatus(): string
    {
        try {
            // Simple connectivity test
            Queue::size('webhooks');
            return 'operational';
        } catch (\Exception $e) {
            return 'error';
        }
    }

    /**
     * Validate payment data
     */
    private function validatePaymentData(array $data): array
    {
        $validator = Validator::make($data, [
            'method' => 'required|string',
            'customer.username' => 'required|string|max:45',
            'customer.email' => 'required|email|max:45',
            'customer.phone' => 'required|string|min:10',
            'course_id' => 'required|integer|exists:courses,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    /**
     * Validate simple payment data
     */
    private function validateSimplePaymentData(array $data): array
    {
        $validator = Validator::make($data, [
            'method' => 'required|string',
            'order_id' => 'required|string|max:50|unique:users,order_id',
            'amount' => 'required|integer|min:1',
            'customer_email' => 'required|email|max:45',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    /**
     * Create user record
     */
    private function createUserRecord(array $data, string $orderId): User
    {
        return User::create([
            'username' => $data['customer']['username'],
            'email' => $data['customer']['email'],
            'phone' => $data['customer']['phone'],
            'order_id' => $orderId,
            'course_id' => $data['course_id'],
            'payment_status' => PaymentStatus::PENDING->value,
            'created_at' => now(),
        ]);
    }

    /**
     * Build payment data
     */
    private function buildPaymentData(array $data, Course $course, string $orderId): array
    {
        return [
            'method' => $data['method'],
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $course->harga,
            ],
            'customer_details' => $data['customer'],
            'item_details' => [
                'name' => $course->nama,
                'price' => $course->harga,
                'quantity' => 1,
            ],
        ];
    }

    /**
     * Process webhook notification (legacy method, kept for fallback)
     */
    private function processNotification(array $validation): void
    {
        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];

        Log::info('Processing webhook notification (sync)', [
            'order_id' => $orderId,
            'transaction_status' => $transactionStatus,
            'validation' => $validation
        ]);

        // Use database transaction to ensure atomicity
        DB::transaction(function () use ($validation, $orderId, $transactionStatus) {
            $handlers = [
                'capture' => fn() => $this->handleCaptureStatus($validation),
                'settlement' => fn() => $this->handleSuccessfulPayment($orderId, $validation),
                'pending' => fn() => $this->handlePendingPayment($orderId, $validation),
                'deny' => fn() => $this->handleFailedPayment($orderId, $validation),
                'cancel' => fn() => $this->handleCancelledPayment($orderId, $validation),
                'expire' => fn() => $this->handleExpiredPayment($orderId, $validation),
            ];

            if (isset($handlers[$transactionStatus])) {
                $handlers[$transactionStatus]();
            } else {
                Log::warning("Unhandled transaction status: {$transactionStatus}", $validation);
            }
        });
    }

    /**
     * Handle capture status with fraud check
     */
    private function handleCaptureStatus(array $validation): void
    {
        $fraudStatus = $validation['fraud_status'];
        $orderId = $validation['order_id'];

        switch ($fraudStatus) {
            case 'accept':
                $this->handleSuccessfulPayment($orderId, $validation);
                break;
            case 'challenge':
                $this->handleChallengedPayment($orderId, $validation);
                break;
            default:
                $this->handleFailedPayment($orderId, $validation);
        }
    }

    /**
     * Handle successful payment
     */
    private function handleSuccessfulPayment(string $orderId, array $validation): void
    {
        Log::info("Processing successful payment for order: {$orderId}");

        try {
            $user = User::where('order_id', $orderId)->firstOrFail();
            $course = Course::findOrFail($user->course_id);

            // Update payment status
            $user->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'paid_at' => now(),
            ]);

            // Handle user registration and notifications
            $this->userRegistrationService->processUserAccess($user, $course);

            Log::info("Payment processed successfully for order: {$orderId}", [
                'user_id' => $user->id,
                'course_id' => $course->id
            ]);

        } catch (\Exception $e) {
            Log::error("Error processing successful payment for order {$orderId}", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Handle challenged payment
     */
    private function handleChallengedPayment(string $orderId, array $validation): void
    {
        Log::warning("Payment challenged for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::CHALLENGED);
        
        // TODO: Implement manual review process
    }

    /**
     * Handle failed payment
     */
    private function handleFailedPayment(string $orderId, array $validation): void
    {
        Log::info("Payment failed for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::FAILED);
    }

    /**
     * Handle cancelled payment
     */
    private function handleCancelledPayment(string $orderId, array $validation): void
    {
        Log::info("Payment cancelled for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::CANCELLED);
    }

    /**
     * Handle expired payment
     */
    private function handleExpiredPayment(string $orderId, array $validation): void
    {
        Log::info("Payment expired for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::EXPIRED);
    }

    /**
     * Handle pending payment
     */
    private function handlePendingPayment(string $orderId, array $validation): void
    {
        Log::info("Payment pending for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::PENDING);
    }

    /**
     * Update payment status
     */
    private function updatePaymentStatus(string $orderId, PaymentStatus $status): void
    {
        $user = User::where('order_id', $orderId)->first();
        
        if ($user) {
            $user->update(['payment_status' => $status->value]);
            
            Log::info("Updated payment status", [
                'order_id' => $orderId,
                'user_id' => $user->id,
                'status' => $status->value
            ]);
        } else {
            Log::warning("User not found for order_id: {$orderId}");
        }
    }

    public function validateWebhookSignature(array $webhookData)
    {
        return $this->midtrans->validateWebhookNotification($webhookData);
    }
}