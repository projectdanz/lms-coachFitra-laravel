<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Services\UserRegistrationService;
use App\Services\NotificationService;
use App\Jobs\ProcessWebhookJob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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
     * Now using queue for processing to improve response time
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        $webhookData = $request->all();
        
        Log::info('Webhook received', [
            'order_id' => $webhookData['order_id'] ?? 'unknown',
            'transaction_status' => $webhookData['transaction_status'] ?? 'unknown',
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        try {
            // Basic validation before queuing
            if (empty($webhookData['order_id']) || empty($webhookData['transaction_status'])) {
                Log::warning('Invalid webhook data - missing required fields', $webhookData);
                return response()->json(['message' => 'Invalid webhook data'], 400);
            }

            // Dispatch job to queue for processing
            ProcessWebhookJob::dispatch($webhookData)
                ->onQueue('webhooks')
                ->delay(now()->addSeconds(2)); // Small delay to ensure DB consistency

            Log::info('Webhook job dispatched', [
                'order_id' => $webhookData['order_id'],
                'transaction_status' => $webhookData['transaction_status']
            ]);

            // Return success response quickly to Midtrans
            return response()->json(['message' => 'OK'], 200);

        } catch (\Exception $e) {
            Log::error('Webhook dispatch failed', [
                'message' => $e->getMessage(),
                'notification' => $webhookData,
                'trace' => $e->getTraceAsString()
            ]);

            // Fallback to synchronous processing if queue fails
            try {
                $this->paymentService->handleWebhook($webhookData);
                return response()->json(['message' => 'OK (fallback processed)'], 200);
            } catch (\Exception $fallbackException) {
                Log::error('Webhook fallback processing also failed', [
                    'original_error' => $e->getMessage(),
                    'fallback_error' => $fallbackException->getMessage(),
                    'notification' => $webhookData,
                ]);
                
                return response()->json(['message' => 'Error processing webhook'], 500);
            }
        }
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