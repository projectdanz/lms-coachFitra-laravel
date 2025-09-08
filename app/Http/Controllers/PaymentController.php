<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\WebhookLog;
use App\Services\PaymentService;
use App\Services\UserRegistrationService;
use App\Services\NotificationService;
use App\Jobs\ProcessWebhookJob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentService $paymentService,
        private UserRegistrationService $userRegistrationService,
        private NotificationService $notificationService
    ) {}

    /**
     * Create a new payment
     */
    public function createPayment(Request $request)
    {
        try {
            $result = $this->paymentService->createPayment($request->all());
            return redirect($result['redirect_url']);
        } catch (\Exception $e) {
            Log::error('Payment creation failed', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create simple payment with minimal data
     */
    public function createSimplePayment(Request $request): JsonResponse
    {
        try {
            $result = $this->paymentService->createSimplePayment($request->all());
            return response()->json(['success' => true, 'data' => $result]);
        } catch (\Exception $e) {
            Log::error('Simple payment creation failed', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get payment status
     */
    public function getPaymentStatus(string $orderId): JsonResponse
    {
        try {
            $result = $this->paymentService->getPaymentStatus($orderId);
            return response()->json(['success' => true, 'data' => $result]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get payment status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cancel payment
     */
    public function cancelPayment(string $orderId): JsonResponse
    {
        try {
            $result = $this->paymentService->cancelPayment($orderId);
            return response()->json(['success' => true, 'data' => $result]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment cancellation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle webhook notification from Midtrans
     * Optimized for shared hosting - immediate processing with cron fallback
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        $webhookData = $request->all();
        $startTime = microtime(true);
        
        Log::info('Webhook received', [
            'order_id' => $webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $webhookData['transaction_status'] ?? 'unknown',
            'ip' => $request->ip(),
        ]);

        // Set execution time limit for shared hosting
        set_time_limit(25);

        // Create webhook log for tracking
        $webhookLog = WebhookLog::create([
            'order_id' => $webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $webhookData['transaction_status'] ?? 'unknown',
            'payment_type' => $webhookData['payment_type'] ?? null,
            'fraud_status' => $webhookData['fraud_status'] ?? null,
            'gross_amount' => $webhookData['gross_amount'] ?? null,
            'status' => 'processing',
            'received_at' => now(),
            'started_at' => now(),
            'webhook_data' => $webhookData,
            'attempts' => 1,
        ]);

        try {
            // Basic validation
            if (empty($webhookData['order_id']) || empty($webhookData['transaction_status'])) {
                $webhookLog->markAsFailed('Invalid webhook data - missing required fields');
                return response()->json(['message' => 'Invalid webhook data'], 400);
            }

            // Check for duplicate processing (prevent double processing)
            $cacheKey = "webhook_processing_{$webhookData['order_id']}_{$webhookData['transaction_status']}";
            if (Cache::has($cacheKey)) {
                Log::info('Duplicate webhook ignored', ['order_id' => $webhookData['order_id']]);
                return response()->json(['message' => 'OK (duplicate)'], 200);
            }

            // Set processing lock (5 minutes)
            Cache::put($cacheKey, true, 300);

            // Process webhook immediately
            $this->processWebhookImmediate($webhookData, $webhookLog);

            $processingTime = microtime(true) - $startTime;
            $webhookLog->markAsCompleted();
            $webhookLog->update(['processing_time_seconds' => round($processingTime, 2)]);

            // Clear processing lock
            Cache::forget($cacheKey);

            Log::info('Webhook processed successfully', [
                'order_id' => $webhookData['order_id'],
                'processing_time' => round($processingTime, 2) . 's'
            ]);

            return response()->json(['message' => 'OK'], 200);

        } catch (\Exception $e) {
            $webhookLog->markAsFailed($e->getMessage());
            Cache::forget($cacheKey ?? '');

            Log::error('Webhook processing failed', [
                'order_id' => $webhookData['order_id'] ?? 'unknown',
                'error' => $e->getMessage(),
                'webhook_log_id' => $webhookLog->id
            ]);

            // Return 200 to prevent Midtrans retries for application errors
            return response()->json(['message' => 'Error logged'], 200);
        }
    }

    /**
     * Process webhook immediately - optimized for shared hosting
     */
    private function processWebhookImmediate(array $webhookData, WebhookLog $webhookLog): void
    {
        // Validate webhook signature
        $validation = $this->paymentService->validateWebhookSignature($webhookData);
        
        if (!$validation['valid']) {
            throw new \InvalidArgumentException('Invalid webhook signature');
        }

        $webhookLog->update(['validation_data' => $validation]);

        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];

        Log::info('Processing webhook immediately', [
            'order_id' => $orderId,
            'transaction_status' => $transactionStatus
        ]);

        // Use database transaction for consistency
        DB::transaction(function () use ($validation, $orderId, $transactionStatus) {
            $this->handleTransactionStatus($orderId, $transactionStatus, $validation);
        });
    }

    /**
     * Handle different transaction statuses
     */
    private function handleTransactionStatus(string $orderId, string $transactionStatus, array $validation): void
    {
        switch ($transactionStatus) {
            case 'capture':
                $this->handleCaptureStatus($orderId, $validation);
                break;
            case 'settlement':
                $this->handleSuccessfulPayment($orderId, $validation);
                break;
            case 'pending':
                $this->handlePendingPayment($orderId, $validation);
                break;
            case 'deny':
            case 'cancel':
            case 'expire':
                $this->handleFailedPayment($orderId, $validation);
                break;
            default:
                Log::warning("Unhandled transaction status: {$transactionStatus}", $validation);
        }
    }

    /**
     * Handle capture with fraud check
     */
    private function handleCaptureStatus(string $orderId, array $validation): void
    {
        $fraudStatus = $validation['fraud_status'] ?? 'accept';
        
        if ($fraudStatus === 'accept') {
            $this->handleSuccessfulPayment($orderId, $validation);
        } else {
            $this->handleFailedPayment($orderId, $validation);
        }
    }

    /**
     * Handle successful payment - optimized for shared hosting
     */
    private function handleSuccessfulPayment(string $orderId, array $validation): void
    {
        $user = User::where('order_id', $orderId)->first();
        if (!$user) {
            Log::warning("User not found for order_id: {$orderId}");
            return;
        }

        // Prevent duplicate processing
        if ($user->payment_status === PaymentStatus::COMPLETED->value) {
            Log::info("Payment already completed for order: {$orderId}");
            return;
        }

        $course = Course::find($user->course_id);
        if (!$course) {
            Log::error("Course not found for order: {$orderId}");
            return;
        }

        // Update payment status first
        $user->update([
            'payment_status' => PaymentStatus::COMPLETED->value,
            'paid_at' => now(),
        ]);

        // Process user access - decide strategy based on timing and load
        $this->processUserAccess($user, $course);

        Log::info("Payment processed successfully for order: {$orderId}");
    }

    /**
     * Process user access with optimal strategy for shared hosting
     */
    private function processUserAccess(User $user, Course $course): void
    {
        try {
            // Check if we should process immediately or defer
            if ($this->shouldProcessImmediately()) {
                Log::info('Processing user access immediately', ['user_id' => $user->id]);
                $this->userRegistrationService->processUserAccess($user, $course);
            } else {
                Log::info('Deferring user access to cron', ['user_id' => $user->id]);
                $this->deferUserProcessing($user, $course);
            }
        } catch (\Exception $e) {
            Log::error('User access processing failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);

            // Fallback to deferred processing
            $this->deferUserProcessing($user, $course);
        }
    }

    /**
     * Check if we should process immediately based on current load and time
     */
    private function shouldProcessImmediately(): bool
    {
        // Get current hour
        $currentHour = now()->hour;
        
        // Process immediately during low-traffic hours (1 AM - 5 AM)
        if ($currentHour >= 1 && $currentHour <= 5) {
            return true;
        }

        // Check recent webhook load
        $recentWebhooks = Cache::get('recent_webhook_count', 0);
        
        // If low load (less than 10 webhooks in last 10 minutes), process immediately
        return $recentWebhooks < 10;
    }

    /**
     * Defer user processing to cron job
     */
    private function deferUserProcessing(User $user, Course $course): void
    {
        // Create pending processing record
        DB::table('pending_user_processing')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Send immediate notification about processing delay
        $this->notificationService->sendPaymentSuccessNotifications(
            $user,
            $course,
            null,
            'Payment confirmed! Your account is being set up and you will receive login details within 15 minutes.'
        );

        Log::info('User processing deferred to cron', [
            'user_id' => $user->id,
            'order_id' => $user->order_id
        ]);
    }

    /**
     * Handle other payment statuses
     */
    private function handlePendingPayment(string $orderId, array $validation): void
    {
        $this->updatePaymentStatus($orderId, PaymentStatus::PENDING);
        
        // Send reminder notification
        $user = User::where('order_id', $orderId)->first();
        if ($user) {
            $course = Course::find($user->course_id);
            if ($course) {
                $this->notificationService->sendPaymentReminderNotification($user, $course);
            }
        }
    }

    private function handleFailedPayment(string $orderId, array $validation): void
    {
        $this->updatePaymentStatus($orderId, PaymentStatus::FAILED);
        
        // Send failure notification
        $user = User::where('order_id', $orderId)->first();
        if ($user) {
            $course = Course::find($user->course_id);
            if ($course) {
                $this->notificationService->sendPaymentFailureNotification(
                    $user,
                    $course,
                    $validation['transaction_status'] ?? 'Payment processing failed'
                );
            }
        }
    }

    /**
     * Update payment status
     */
    private function updatePaymentStatus(string $orderId, PaymentStatus $status): void
    {
        User::where('order_id', $orderId)->update(['payment_status' => $status->value]);
        Log::info("Updated payment status to {$status->value} for order: {$orderId}");
    }

    /**
     * Cron job endpoint - Process pending users
     */
    public function processPendingUsers(Request $request): JsonResponse
    {
        // Verify cron authentication
        if ($request->query('secret') !== config('webhook.cron_secret')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Log::info('Cron: Processing pending users started');
        
        set_time_limit(25); // Shared hosting limit
        $batchSize = config('webhook.batch_size', 5);
        
        $pendingUsers = DB::table('pending_user_processing')
            ->where('status', 'pending')
            ->where('created_at', '>', now()->subHours(24))
            ->limit($batchSize)
            ->get();

        $processed = 0;
        $failed = 0;

        foreach ($pendingUsers as $pending) {
            try {
                // Mark as processing
                DB::table('pending_user_processing')
                    ->where('id', $pending->id)
                    ->update([
                        'status' => 'processing',
                        'last_attempt_at' => now(),
                        'attempts' => ($pending->attempts ?? 0) + 1
                    ]);

                $user = User::find($pending->user_id);
                $course = Course::find($pending->course_id);

                if ($user && $course) {
                    $this->userRegistrationService->processUserAccess($user, $course);
                    
                    // Mark as completed
                    DB::table('pending_user_processing')
                        ->where('id', $pending->id)
                        ->update(['status' => 'completed', 'updated_at' => now()]);
                    
                    $processed++;
                    Log::info('Cron: User processed successfully', ['user_id' => $user->id]);
                } else {
                    throw new \Exception('User or course not found');
                }

            } catch (\Exception $e) {
                Log::error('Cron: User processing failed', [
                    'pending_id' => $pending->id,
                    'user_id' => $pending->user_id ?? null,
                    'error' => $e->getMessage()
                ]);
                
                // Mark as failed or retry
                $maxAttempts = 3;
                $currentAttempts = ($pending->attempts ?? 0) + 1;
                
                if ($currentAttempts >= $maxAttempts) {
                    DB::table('pending_user_processing')
                        ->where('id', $pending->id)
                        ->update([
                            'status' => 'failed',
                            'error_message' => $e->getMessage(),
                            'updated_at' => now()
                        ]);
                } else {
                    DB::table('pending_user_processing')
                        ->where('id', $pending->id)
                        ->update([
                            'status' => 'pending',
                            'error_message' => $e->getMessage(),
                            'updated_at' => now()
                        ]);
                }
                
                $failed++;
            }
        }

        Log::info('Cron: Processing pending users completed', [
            'processed' => $processed,
            'failed' => $failed,
            'total' => count($pendingUsers)
        ]);

        return response()->json([
            'success' => true,
            'processed' => $processed,
            'failed' => $failed,
            'total' => count($pendingUsers)
        ]);
    }

    /**
     * Cron job endpoint - Cleanup old records
     */
    public function cleanupOldRecords(Request $request): JsonResponse
    {
        if ($request->query('secret') !== config('webhook.cron_secret')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Log::info('Cron: Cleanup started');
        $deleted = 0;

        try {
            // Clean webhook logs older than 30 days
            $webhookDeleted = WebhookLog::where('created_at', '<', now()->subDays(30))->delete();
            $deleted += $webhookDeleted;

            // Clean completed processing records older than 7 days
            $processingDeleted = DB::table('pending_user_processing')
                ->where('status', 'completed')
                ->where('updated_at', '<', now()->subDays(7))
                ->delete();
            $deleted += $processingDeleted;

            // Clean failed processing records older than 30 days
            $failedDeleted = DB::table('pending_user_processing')
                ->where('status', 'failed')
                ->where('updated_at', '<', now()->subDays(30))
                ->delete();
            $deleted += $failedDeleted;

            Log::info('Cron: Cleanup completed', [
                'webhook_logs_deleted' => $webhookDeleted,
                'processing_completed_deleted' => $processingDeleted,
                'processing_failed_deleted' => $failedDeleted,
                'total_deleted' => $deleted
            ]);

        } catch (\Exception $e) {
            Log::error('Cron: Cleanup failed', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Cleanup failed'], 500);
        }

        return response()->json([
            'success' => true,
            'deleted' => $deleted
        ]);
    }

    /**
     * Cron job endpoint - Health check
     */
    public function healthCheck(Request $request): JsonResponse
    {
        if ($request->query('secret') !== config('webhook.cron_secret')) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $stats = [
            'webhook_logs_today' => WebhookLog::whereDate('created_at', today())->count(),
            'webhook_failed_today' => WebhookLog::whereDate('created_at', today())
                ->where('status', 'failed')->count(),
            'pending_processing' => DB::table('pending_user_processing')
                ->where('status', 'pending')->count(),
            'failed_processing' => DB::table('pending_user_processing')
                ->where('status', 'failed')->count(),
            'avg_processing_time' => WebhookLog::whereDate('created_at', today())
                ->where('status', 'completed')
                ->avg('processing_time_seconds'),
            'timestamp' => now()->toISOString()
        ];

        // Check for alerts
        $alerts = [];
        
        if ($stats['pending_processing'] > 50) {
            $alerts[] = 'High number of pending user processing: ' . $stats['pending_processing'];
        }
        
        if ($stats['webhook_failed_today'] > 0) {
            $failureRate = ($stats['webhook_failed_today'] / max($stats['webhook_logs_today'], 1)) * 100;
            if ($failureRate > 20) {
                $alerts[] = 'High webhook failure rate: ' . round($failureRate, 2) . '%';
            }
        }

        if (!empty($alerts)) {
            Log::warning('Health check alerts', $alerts);
        }

        return response()->json([
            'success' => true,
            'stats' => $stats,
            'alerts' => $alerts,
            'status' => empty($alerts) ? 'healthy' : 'warning'
        ]);
    }

    /**
     * Handle webhook notification synchronously (backup endpoint)
     * Keep this for emergency fallback or debugging
     */
    public function handleWebhookSync(Request $request): JsonResponse
    {
        Log::info('Synchronous webhook processing requested', [
            'order_id' => $request->input('order_id'),
            'transaction_status' => $request->input('transaction_status')
        ]);

        try {
            $this->paymentService->handleWebhook($request->all());
            return response()->json(['message' => 'OK']);
        } catch (\Exception $e) {
            Log::error('Synchronous webhook processing error', [
                'message' => $e->getMessage(),
                'notification' => $request->all(),
            ]);
            return response()->json(['message' => 'Error processing webhook'], 500);
        }
    }

    /**
     * Get available payment methods
     */
    public function getPaymentMethods(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->paymentService->getAvailablePaymentMethods(),
        ]);
    }

    /**
     * Test Midtrans connection
     */
    public function testConnection(): JsonResponse
    {
        $result = $this->paymentService->testConnection();
        return response()->json([
            'success' => $result['connection_status'] === 'ok',
            'data' => $result,
        ]);
    }

    /**
     * Get configuration info
     */
    public function getConfig(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->paymentService->getConfig(),
        ]);
    }

    /**
     * Get webhook job status and statistics
     */
    public function getWebhookStats(): JsonResponse
    {
        try {
            $stats = $this->paymentService->getWebhookJobStats();
            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get webhook stats',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Retry failed webhook jobs
     */
    public function retryFailedWebhooks(Request $request): JsonResponse
    {
        try {
            $limit = $request->input('limit', 10);
            $result = $this->paymentService->retryFailedWebhookJobs($limit);
            
            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retry webhook jobs',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}