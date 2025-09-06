<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Services\UserRegistrationService;
use App\Services\NotificationService;
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
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        try {
            $this->paymentService->handleWebhook($request->all());
            return response()->json(['message' => 'OK']);
        } catch (\Exception $e) {
            Log::error('Webhook processing error', [
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
}