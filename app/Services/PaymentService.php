<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use App\Enums\PaymentStatus;
use App\Services\Midtrans\MidtransPayment;
use App\Services\Midtrans\Exceptions\MidtransException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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
     * Handle webhook notification
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
     * Process webhook notification
     */
    private function processNotification(array $validation): void
    {
        $orderId = $validation['order_id'];
        $transactionStatus = $validation['transaction_status'];

        Log::info('Processing webhook notification', [
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
        // Could send notification to admin, create review task, etc.
    }

    /**
     * Handle failed payment
     */
    private function handleFailedPayment(string $orderId, array $validation): void
    {
        Log::info("Payment failed for order: {$orderId}", $validation);
        
        $this->updatePaymentStatus($orderId, PaymentStatus::FAILED);
        
        // TODO: Send failure notification to user
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
        
        // TODO: Set up monitoring for pending payments
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
}