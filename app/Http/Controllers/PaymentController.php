<?php

namespace App\Http\Controllers;

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
     * Handle webhook notification - Optimized for shared hosting
     * Uses immediate processing with optimizations
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        $webhookData = $request->all();
        
        // Log webhook receipt
        Log::info('Webhook received', [
            'order_id' => $webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $webhookData['transaction_status'] ?? 'unknown',
            'ip' => $request->ip(),
        ]);

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

            // Process webhook immediately (no queue)
            $this->processWebhookImmediate($webhookData, $webhookLog);

            $webhookLog->markAsCompleted();

            // Clear processing lock
            Cache::forget($cacheKey);

            return response()->json(['message' => 'OK'], 200);

        } catch (\Exception $e) {
            $webhookLog->markAsFailed($e->getMessage());
            Cache::forget($cacheKey ?? '');

            Log::error('Webhook processing failed', [
                'order_id' => $webhookData['order_id'] ?? 'unknown',
                'error' => $e->getMessage(),
                'webhook_log_id' => $webhookLog->id
            ]);

            // Still return 200 to prevent Midtrans retries for application errors
            return response()->json(['message' => 'Error logged'], 200);
        }
    }

    /**
     * Process webhook immediately - optimized version
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
     * Handle successful payment - streamlined version
     */
    private function handleSuccessfulPayment(string $orderId, array $validation): void
    {
        $user = User::where('order_id', $orderId)->first();
        if (!$user) {
            Log::warning("User not found for order_id: {$orderId}");
            return;
        }

        // Prevent duplicate processing
        if ($user->payment_status === 'completed') {
            Log::info("Payment already completed for order: {$orderId}");
            return;
        }

        $course = Course::find($user->course_id);
        if (!$course) {
            Log::error("Course not found for order: {$orderId}");
            return;
        }

        // Update payment status
        $user->update([
            'payment_status' => 'completed',
            'paid_at' => now(),
        ]);

        // Process user access in background using deferred execution
        $this->deferUserProcessing($user, $course);

        Log::info("Payment processed successfully for order: {$orderId}");
    }

    /**
     * Handle other payment statuses
     */
    private function handlePendingPayment(string $orderId, array $validation): void
    {
        $this->updatePaymentStatus($orderId, 'pending');
    }

    private function handleFailedPayment(string $orderId, array $validation): void
    {
        $this->updatePaymentStatus($orderId, 'failed');
    }

    /**
     * Update payment status
     */
    private function updatePaymentStatus(string $orderId, string $status): void
    {
        User::where('order_id', $orderId)->update(['payment_status' => $status]);
    }

    /**
     * Defer user processing using various methods available in shared hosting
     */
    private function deferUserProcessing($user, $course): void
    {
        try {
            // Method 1: Try immediate processing (risky but sometimes works)
            if ($this->shouldProcessImmediately()) {
                $this->userRegistrationService->processUserAccess($user, $course);
                return;
            }

            // Method 2: Use cron job processing
            $this->scheduleForCronProcessing($user, $course);

        } catch (\Exception $e) {
            Log::error('Deferred processing setup failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);

            // Fallback: Send notification with manual process message
            $this->notificationService->sendPaymentSuccessNotifications(
                $user,
                $course,
                null,
                'Payment confirmed. Account setup in progress. You will receive credentials within 30 minutes.'
            );
        }
    }

    /**
     * Check if we should process immediately based on time and load
     */
    private function shouldProcessImmediately(): bool
    {
        // Process immediately during low-traffic hours (adjust timezone accordingly)
        $currentHour = now()->hour;
        return $currentHour >= 1 && $currentHour <= 5; // 1 AM - 5 AM
    }

    /**
     * Schedule for cron job processing
     */
    private function scheduleForCronProcessing($user, $course): void
    {
        // Create a processing queue entry that cron can pick up
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

        Log::info('User processing scheduled for cron', [
            'user_id' => $user->id,
            'order_id' => $user->order_id
        ]);
    }

    /**
     * Cron job endpoint for processing users (call this from cPanel cron)
     */
    public function processPendingUsers(): JsonResponse
    {
        $pendingUsers = DB::table('pending_user_processing')
            ->where('status', 'pending')
            ->where('created_at', '>', now()->subHours(24)) // Only process recent ones
            ->limit(10) // Process in small batches
            ->get();

        $processed = 0;
        $failed = 0;

        foreach ($pendingUsers as $pending) {
            try {
                $user = User::find($pending->user_id);
                $course = Course::find($pending->course_id);

                if ($user && $course) {
                    $this->userRegistrationService->processUserAccess($user, $course);
                    
                    // Mark as completed
                    DB::table('pending_user_processing')
                        ->where('id', $pending->id)
                        ->update(['status' => 'completed', 'updated_at' => now()]);
                    
                    $processed++;
                } else {
                    // Mark as failed
                    DB::table('pending_user_processing')
                        ->where('id', $pending->id)
                        ->update(['status' => 'failed', 'updated_at' => now()]);
                    
                    $failed++;
                }

            } catch (\Exception $e) {
                Log::error('Cron user processing failed', [
                    'pending_id' => $pending->id,
                    'error' => $e->getMessage()
                ]);
                
                DB::table('pending_user_processing')
                    ->where('id', $pending->id)
                    ->update(['status' => 'failed', 'updated_at' => now()]);
                
                $failed++;
            }
        }

        return response()->json([
            'processed' => $processed,
            'failed' => $failed,
            'total' => count($pendingUsers)
        ]);
    }

    /**
     * Cleanup old records (call this from cPanel cron weekly)
     */
    public function cleanupOldRecords(): JsonResponse
    {
        $deleted = 0;

        // Clean webhook logs older than 30 days
        $deleted += WebhookLog::where('created_at', '<', now()->subDays(30))->delete();

        // Clean completed processing records older than 7 days
        $deleted += DB::table('pending_user_processing')
            ->where('status', 'completed')
            ->where('updated_at', '<', now()->subDays(7))
            ->delete();

        return response()->json(['deleted' => $deleted]);
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