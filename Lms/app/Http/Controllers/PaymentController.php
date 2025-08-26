<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Midtrans\MidtransPayment;
use App\Services\Midtrans\Exceptions\MidtransException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected MidtransPayment $midtrans;

    public function __construct(MidtransPayment $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    /**
     * Create a new payment
     */
    public function createPayment(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'method' => 'required|string',
            'order_id' => 'required|string|max:50',
            'amount' => 'required|integer|min:1',
            'customer.email' => 'required|email|max:45',
            'items' => 'array',
            'items.*.id' => 'string|max:50',
            'items.*.name' => 'required_with:items|string|max:50',
            'items.*.price' => 'required_with:items|integer|min:1',
            'items.*.quantity' => 'required_with:items|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $paymentData = [
                'method' => $request->input('method'),
                'transaction_details' => [
                    'order_id' => $request->order_id,
                    'gross_amount' => $request->amount,
                ],
                'customer_details' => $request->customer,
                'item_details' => $request->items ?? [],
            ];

            $result = $this->midtrans->createPayment($paymentData);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);

        } catch (\Exception $e) {
            Log::error('Payment creation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }

    /**
     * Create simple payment with minimal data
     */
    public function createSimplePayment(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'method' => 'required|string',
            'order_id' => 'required|string|max:50',
            'amount' => 'required|integer|min:1',
            'customer_email' => 'required|email|max:45',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $customer = [
                'email' => $request->customer_email,
            ];

            $result = $this->midtrans->createSimplePayment(
                $request->input('method'),
                $request->order_id,
                $request->amount,
                $customer
            );

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment creation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Get payment status
     */
    public function getPaymentStatus(string $orderId): JsonResponse
    {
        try {
            $result = $this->midtrans->getPaymentStatus($orderId);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get payment status',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Cancel payment
     */
    public function cancelPayment(string $orderId): JsonResponse
    {
        try {
            $result = $this->midtrans->cancelPayment($orderId);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);

        } catch (MidtransException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment cancellation failed',
                'error' => $e->getMessage(),
            ], $e->getStatusCode() ?: 500);
        }
    }

    /**
     * Handle webhook notification from Midtrans
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        try {
            $notification = $request->all();
            $validation = $this->midtrans->validateWebhookNotification($notification);

            if (!$validation['valid']) {
                Log::warning('Invalid webhook signature', ['notification' => $notification]);
                return response()->json(['message' => 'Invalid signature'], 401);
            }

            // Process the notification based on transaction status
            $this->processNotification($validation);

            Log::info('Webhook processed successfully', ['order_id' => $validation['order_id']]);

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
            'data' => $this->midtrans->getAvailablePaymentMethods(),
        ]);
    }

    /**
     * Test Midtrans connection
     */
    public function testConnection(): JsonResponse
    {
        $result = $this->midtrans->testConnection();

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
            'data' => $this->midtrans->getConfig(),
        ]);
    }

    /**
     * Process webhook notification
     */
    protected function processNotification(array $validation): void
    {
        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];
        $fraudStatus = $validation['fraud_status'];

        // Handle different transaction statuses
        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus === 'accept') {
                    // Payment successful
                    $this->handleSuccessfulPayment($orderId, $validation);
                } elseif ($fraudStatus === 'challenge') {
                    // Payment needs manual review
                    $this->handleChallengedPayment($orderId, $validation);
                } else {
                    // Payment failed/denied
                    $this->handleFailedPayment($orderId, $validation);
                }
                break;

            case 'settlement':
                // Payment settled
                $this->handleSettledPayment($orderId, $validation);
                break;

            case 'pending':
                // Payment pending
                $this->handlePendingPayment($orderId, $validation);
                break;

            // case 'deny':
            // case 'cancel':
            case 'expire':
                // Payment failed/cancelled
                $this->handleFailedPayment($orderId, $validation);
                break;
        }
    }

    protected function handleSuccessfulPayment(string $orderId, array $validation): void
    {
        // Update order status in database
        Log::info("Payment successful for order: {$orderId}", $validation);
    }

    protected function handleChallengedPayment(string $orderId, array $validation): void
    {
        // Mark for manual review
        Log::warning("Payment challenged for order: {$orderId}", $validation);
    }

    protected function handleFailedPayment(string $orderId, array $validation): void
    {
        // Update order status as failed
        Log::info("Payment failed for order: {$orderId}", $validation);
    }

    protected function handleSettledPayment(string $orderId, array $validation): void
    {
        // Payment settled by Midtrans
        Log::info("Payment settled for order: {$orderId}", $validation);
    }

    protected function handlePendingPayment(string $orderId, array $validation): void
    {
        // Payment is pending
        Log::info("Payment pending for order: {$orderId}", $validation);
    }
}
