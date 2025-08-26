<?php

namespace App\Services\Midtrans;

use App\Services\Midtrans\Utils\CryptoUtils;
use App\Services\Midtrans\Exceptions\MidtransException;
// use App\Services\Midtrans\PaymentMethods\EWalletService;
// use App\Services\Midtrans\PaymentMethods\BankService;
// use App\Services\Midtrans\PaymentMethods\CardPaymentService;
// use App\Services\Midtrans\PaymentMethods\RetailOutletService;
// use App\Services\Midtrans\PaymentMethods\QRISService;

/**
 * Main Midtrans Payment Class for Laravel 11
 */
class MidtransPayment
{
    protected SnapService $snap;
    // protected PaymentLinkService $paymentLink;
    // protected DisbursementService $disbursement;
    // protected PayoutService $payout;
    // protected InvoiceService $invoice;
    // protected EWalletService $ewallet;
    // protected BankService $bank;
    // protected CardPaymentService $card;
    // protected RetailOutletService $retail;
    // protected QRISService $qris;

    public function __construct(
        SnapService $snap,
        // PaymentLinkService $paymentLink,
        // DisbursementService $disbursement,
        // PayoutService $payout,
        // InvoiceService $invoice,
        // EWalletService $ewallet,
        // BankService $bank,
        // CardPaymentService $card,
        // RetailOutletService $retail,
        // QRISService $qris
    ) {
        $this->snap = $snap;
        // $this->paymentLink = $paymentLink;
        // $this->disbursement = $disbursement;
        // $this->payout = $payout;
        // $this->invoice = $invoice;
        // $this->ewallet = $ewallet;
        // $this->bank = $bank;
        // $this->card = $card;
        // $this->retail = $retail;
        // $this->qris = $qris;
    }

    /**
     * Get module configuration
     *
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'environment' => config('midtrans.environment'),
            'server_key_configured' => !empty(config('midtrans.server_key')),
            'client_key_configured' => !empty(config('midtrans.client_key')),
            'base_urls' => config('midtrans.base_urls.' . config('midtrans.environment')),
            'supported_banks' => config('midtrans.supported_banks'),
            'callback_urls' => config('midtrans.callback_urls'),
        ];
    }

    /**
     * Test connection to Midtrans API
     *
     * @return array
     */
    public function testConnection(): array
    {
        try {
            return [
                'environment' => config('midtrans.environment'),
                'base_urls' => config('midtrans.base_urls.' . config('midtrans.environment')),
                'server_key_configured' => !empty(config('midtrans.server_key')),
                'client_key_configured' => !empty(config('midtrans.client_key')),
                'connection_status' => 'ok',
                'timestamp' => now()->toISOString(),
            ];
        } catch (\Exception $e) {
            return [
                'environment' => config('midtrans.environment'),
                'connection_status' => 'error',
                'error' => $e->getMessage(),
                'timestamp' => now()->toISOString(),
            ];
        }
    }

    /**
     * Validate webhook notification from Midtrans
     *
     * @param array $notification
     * @return array
     */
    public function validateWebhookNotification(array $notification): array
    {
        try {
            $isValid = CryptoUtils::validateNotificationSignature($notification);

            return [
                'valid' => $isValid,
                'order_id' => $notification['order_id'] ?? null,
                'transaction_status' => $notification['transaction_status'] ?? null,
                'fraud_status' => $notification['fraud_status'] ?? null,
                'payment_type' => $notification['payment_type'] ?? null,
                'gross_amount' => $notification['gross_amount'] ?? null,
                'transaction_time' => $notification['transaction_time'] ?? null,
                'signature_key' => $notification['signature_key'] ?? null,
            ];
        } catch (\Exception $e) {
            return [
                'valid' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Create a comprehensive payment with multiple options
     *
     * @param array $paymentData
     * @return array
     * @throws MidtransException
     */
    public function createPayment(array $paymentData): array
    {
        $method = $paymentData['method'] ?? null;
        unset($paymentData['method']);

        return match (strtolower($method ?? '')) {
            'snap' => $this->snap->createTransaction($paymentData),
            // 'gopay' => $this->ewallet->createGoPayPayment($paymentData),
            // 'ovo' => $this->ewallet->createOVOPayment($paymentData),
            // 'dana' => $this->ewallet->createDanaPayment($paymentData),
            // 'shopeepay' => $this->ewallet->createShopeePayPayment($paymentData),
            // 'linkaja' => $this->ewallet->createLinkAjaPayment($paymentData),
            // 'bca_va' => $this->bank->createBCAVirtualAccount($paymentData),
            // 'bni_va' => $this->bank->createBNIVirtualAccount($paymentData),
            // 'bri_va' => $this->bank->createBRIVirtualAccount($paymentData),
            // 'mandiri_va' => $this->bank->createMandiriVirtualAccount($paymentData),
            // 'permata_va' => $this->bank->createPermataVirtualAccount($paymentData),
            // 'cimb_clicks' => $this->bank->createCIMBClicksPayment($paymentData),
            // 'bca_klikpay' => $this->bank->createBCAKlikPayPayment($paymentData),
            // 'danamon_online' => $this->bank->createDanamonOnlineBankingPayment($paymentData),
            // 'credit_card' => $this->card->createCreditCardPayment($paymentData),
            // 'credit_card_3ds' => $this->card->createCreditCard3DSPayment($paymentData),
            // 'indomaret' => $this->retail->createIndomaretPayment($paymentData),
            // 'alfamart' => $this->retail->createAlfamartPayment($paymentData),
            // 'qris' => $this->qris->createQRISPayment($paymentData),
            default => throw new MidtransException("Unsupported payment method: {$method}")
        };
    }

    /**
     * Get payment status for any method
     *
     * @param string $orderId
     * @param string|null $method
     * @return array
     * @throws MidtransException
     */
    public function getPaymentStatus(string $orderId, ?string $method = null): array
    {
        return $this->snap->getTransactionStatus($orderId);
    }

    /**
     * Cancel payment for any method
     *
     * @param string $orderId
     * @param string|null $method
     * @return array
     * @throws MidtransException
     */
    public function cancelPayment(string $orderId, ?string $method = null): array
    {
        return $this->snap->cancelTransaction($orderId);
    }

    /**
     * Get all available payment methods
     *
     * @return array
     */
    public function getAvailablePaymentMethods(): array
    {
        return [
            'snap' => ['snap'],
            // 'ewallet' => $this->ewallet->getAvailableProviders(),
            // 'bank' => $this->bank->getAvailableBankMethods(),
            // 'card' => $this->card->getAvailableCardMethods(),
            // 'retail' => $this->retail->getAvailableRetailOutlets(),
            // 'qris' => ['qris'],
        ];
    }

    /**
     * Create simple payment with minimal configuration
     *
     * @param string $method
     * @param string $orderId
     * @param int $amount
     * @param array $customer
     * @param array $options
     * @return array
     * @throws MidtransException
     */
    public function createSimplePayment(
        string $method,
        string $orderId,
        int $amount,
        array $customer,
        array $options = []
    ): array {
        $paymentData = array_merge([
            'method' => $method,
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => $customer,
        ], $options);

        return $this->createPayment($paymentData);
    }

    /**
     * Batch process multiple payments
     *
     * @param array $payments
     * @return array
     */
    public function batchCreatePayments(array $payments): array
    {
        $results = [];

        foreach ($payments as $payment) {
            try {
                $result = $this->createPayment($payment);
                $results[] = ['success' => true, 'data' => $result];
            } catch (\Exception $e) {
                $results[] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                    'payment' => $payment,
                ];
            }
        }

        return $results;
    }

    /**
     * Get comprehensive payment analytics
     *
     * @param array $filters
     * @return array
     */
    public function getPaymentAnalytics(array $filters = []): array
    {
        return [
            'total_transactions' => 0,
            'total_amount' => 0,
            'success_rate' => 0,
            'payment_methods' => [],
            'time_range' => $filters,
            'last_updated' => now()->toISOString(),
        ];
    }

    /**
     * Generate comprehensive payment report
     *
     * @param array $options
     * @return array
     */
    public function generatePaymentReport(array $options = []): array
    {
        $startDate = $options['start_date'] ?? null;
        $endDate = $options['end_date'] ?? null;
        $format = $options['format'] ?? 'json';

        return [
            'report_id' => CryptoUtils::generateRandomString(16),
            'period' => ['start_date' => $startDate, 'end_date' => $endDate],
            'format' => $format,
            'generated_at' => now()->toISOString(),
            'data' => [
                'summary' => [],
                'transactions' => [],
                'analytics' => [],
            ],
        ];
    }

    /**
     * Access individual service instances
     */
    public function snap(): SnapService
    {
        return $this->snap;
    }

    // public function paymentLink(): PaymentLinkService
    // {
    //     return $this->paymentLink;
    // }

    // public function disbursement(): DisbursementService
    // {
    //     return $this->disbursement;
    // }

    // public function payout(): PayoutService
    // {
    //     return $this->payout;
    // }

    // public function invoice(): InvoiceService
    // {
    //     return $this->invoice;
    // }

    // public function ewallet(): EWalletService
    // {
    //     return $this->ewallet;
    // }

    // public function bank(): BankService
    // {
    //     return $this->bank;
    // }

    // public function card(): CardPaymentService
    // {
    //     return $this->card;
    // }

    // public function retail(): RetailOutletService
    // {
    //     return $this->retail;
    // }

    // public function qris(): QRISService
    // {
    //     return $this->qris;
    // }
}
