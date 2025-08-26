<?php

namespace App\Services\Midtrans;

use App\Services\Midtrans\Utils\HttpClient;
use App\Services\Midtrans\Utils\CryptoUtils;
use App\Services\Midtrans\Exceptions\MidtransException;

class SnapService
{
    protected HttpClient $httpClient;
    protected string $baseUrl;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->baseUrl = $this->getBaseUrl('snap');
    }

    /**
     * Create Snap transaction
     *
     * @param array $transactionData
     * @return array
     * @throws MidtransException
     */
    public function createTransaction(array $transactionData): array
    {
        $this->validateTransactionData($transactionData);
        $payload = $this->prepareTransactionPayload($transactionData);

        $response = $this->httpClient->post(
            $this->baseUrl,
            '/snap/v1/transactions',
            $payload
        );

        return [
            'token' => $response['token'],
            'redirect_url' => $response['redirect_url'],
            'response' => $response,
        ];
    }

    /**
     * Get transaction status
     *
     * @param string $orderId
     * @return array
     * @throws MidtransException
     */
    public function getTransactionStatus(string $orderId): array
    {
        if (empty($orderId)) {
            throw new MidtransException('Order ID is required');
        }

        return $this->httpClient->get(
            $this->getBaseUrl('api'),
            "/v2/{$orderId}/status"
        );
    }

    /**
     * Cancel transaction
     *
     * @param string $orderId
     * @return array
     * @throws MidtransException
     */
    public function cancelTransaction(string $orderId): array
    {
        if (empty($orderId)) {
            throw new MidtransException('Order ID is required');
        }

        return $this->httpClient->post(
            $this->getBaseUrl('api'),
            "/v2/{$orderId}/cancel",
            []
        );
    }

    /**
     * Approve transaction
     *
     * @param string $orderId
     * @return array
     * @throws MidtransException
     */
    public function approveTransaction(string $orderId): array
    {
        if (empty($orderId)) {
            throw new MidtransException('Order ID is required');
        }

        return $this->httpClient->post(
            $this->getBaseUrl('api'),
            "/v2/{$orderId}/approve",
            []
        );
    }

    /**
     * Refund transaction
     *
     * @param string $orderId
     * @param array $refundData
     * @return array
     * @throws MidtransException
     */
    public function refundTransaction(string $orderId, array $refundData = []): array
    {
        if (empty($orderId)) {
            throw new MidtransException('Order ID is required');
        }

        $payload = [
            'refund_key' => $refundData['refund_key'] ?? CryptoUtils::generateRandomString(10),
            'amount' => $refundData['amount'] ?? null,
            'reason' => $refundData['reason'] ?? 'Refund requested'
        ];

        return $this->httpClient->post(
            $this->getBaseUrl('api'),
            "/v2/{$orderId}/refund",
            $payload
        );
    }

    /**
     * Expire transaction
     *
     * @param string $orderId
     * @return array
     * @throws MidtransException
     */
    public function expireTransaction(string $orderId): array
    {
        if (empty($orderId)) {
            throw new MidtransException('Order ID is required');
        }

        return $this->httpClient->post(
            $this->getBaseUrl('api'),
            "/v2/{$orderId}/expire",
            []
        );
    }

    /**
     * Validate transaction data
     *
     * @param array $transactionData
     * @throws MidtransException
     */
    protected function validateTransactionData(array $transactionData): void
    {
        $required = ['transaction_details', 'customer_details'];

        foreach ($required as $field) {
            if (!isset($transactionData[$field])) {
                throw new MidtransException("{$field} is required");
            }
        }

        // Validate transaction details
        $transactionDetails = $transactionData['transaction_details'];
        if (empty($transactionDetails['order_id']) || empty($transactionDetails['gross_amount'])) {
            throw new MidtransException('order_id and gross_amount are required in transaction_details');
        }

        // Validate customer details
        $customerDetails = $transactionData['customer_details'];
        if (empty($customerDetails['email']) && empty($customerDetails['phone'])) {
            throw new MidtransException('At least email or phone is required in customer_details');
        }
    }

    /**
     * Prepare transaction payload
     *
     * @param array $transactionData
     * @return array
     */
    protected function prepareTransactionPayload(array $transactionData): array
    {
        $payload = $transactionData;

        // Generate order ID if not provided
        if (empty($payload['transaction_details']['order_id'])) {
            $payload['transaction_details']['order_id'] = CryptoUtils::generateOrderId('SNAP');
        }

        // Add default credit card config if not provided
        if (!isset($payload['credit_card'])) {
            $payload['credit_card'] = [
                'secure' => config('midtrans.payment.secure', true),
                'save_card' => config('midtrans.payment.save_card', false)
            ];
        }

        // Add default callbacks if not provided
        if (!isset($payload['callbacks'])) {
            $payload['callbacks'] = [
                'finish' => config('midtrans.callback_urls.finish'),
                'error' => config('midtrans.callback_urls.error'),
                'pending' => config('midtrans.callback_urls.pending')
            ];
        }

        $payload['enabled_payments'] = ['bri_va', 'bni_va', 'bca_va'];
        $payload['bri_va'] = ["va_number" => "12345678901"];
        $payload['bni_va'] = ["va_number" => "12345678902"];
        $payload['bca_va'] = ["va_number" => "12345678903"];

        return $payload;
    }

    /**
     * Create simple transaction
     *
     * @param string $orderId
     * @param int $amount
     * @param array $customer
     * @param array|null $items
     * @return array
     * @throws MidtransException
     */
    public function createSimpleTransaction(string $orderId, int $amount, array $customer, ?array $items = null): array
    {
        $transactionData = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount
            ],
            'customer_details' => $customer
        ];

        if ($items) {
            $transactionData['item_details'] = is_array($items[0] ?? null) ? $items : [$items];
        }

        return $this->createTransaction($transactionData);
    }

    /**
     * Get Snap redirect URL
     *
     * @param string $snapToken
     * @return string
     */
    public function getSnapRedirectUrl(string $snapToken): string
    {
        $baseSnapUrl = config('midtrans.environment') === 'production'
            ? 'https://app.midtrans.com'
            : 'https://app.sandbox.midtrans.com';

        return "{$baseSnapUrl}/snap/v2/vtweb/{$snapToken}";
    }

    /**
     * Get base URL for specific service
     *
     * @param string $service
     * @return string
     */
    protected function getBaseUrl(string $service): string
    {
        $environment = config('midtrans.environment');
        return config("midtrans.base_urls.{$environment}.{$service}");
    }
}
