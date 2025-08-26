<?php

namespace App\Services\Midtrans\Utils;

use Illuminate\Support\Str;

class CryptoUtils
{
    /**
     * Generate a random string
     *
     * @param int $length
     * @return string
     */
    public static function generateRandomString(int $length = 12): string
    {
        return Str::random($length);
    }

    /**
     * Generate order ID with prefix
     *
     * @param string $prefix
     * @return string
     */
    public static function generateOrderId(string $prefix = 'ORDER'): string
    {
        $timestamp = now()->format('YmdHis');
        $random = static::generateRandomString(6);

        return strtoupper($prefix) . '-' . $timestamp . '-' . strtoupper($random);
    }

    /**
     * Validate Midtrans notification signature
     *
     * @param array $notification
     * @return bool
     */
    public static function validateNotificationSignature(array $notification): bool
    {
        $serverKey = config('midtrans.server_key');

        if (!isset($notification['signature_key'])) {
            return false;
        }

        $orderId = $notification['order_id'] ?? '';
        $statusCode = $notification['status_code'] ?? '';
        $grossAmount = $notification['gross_amount'] ?? '';

        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $signature = hash('sha512', $input);

        return hash_equals($signature, $notification['signature_key']);
    }

    /**
     * Create signature for API requests
     *
     * @param string $orderId
     * @param string $statusCode
     * @param string $grossAmount
     * @return string
     */
    public static function createSignature(string $orderId, string $statusCode, string $grossAmount): string
    {
        $serverKey = config('midtrans.server_key');
        $input = $orderId . $statusCode . $grossAmount . $serverKey;

        return hash('sha512', $input);
    }

    /**
     * Generate secure token
     *
     * @param int $length
     * @return string
     */
    public static function generateSecureToken(int $length = 32): string
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * Hash sensitive data
     *
     * @param string $data
     * @param string $algorithm
     * @return string
     */
    public static function hashData(string $data, string $algorithm = 'sha256'): string
    {
        return hash($algorithm, $data);
    }

    /**
     * Generate UUID v4
     *
     * @return string
     */
    public static function generateUuid(): string
    {
        return (string) Str::uuid();
    }

    /**
     * Encrypt data using Laravel's encryption
     *
     * @param mixed $data
     * @return string
     */
    public static function encryptData($data): string
    {
        return encrypt($data);
    }

    /**
     * Decrypt data using Laravel's encryption
     *
     * @param string $encryptedData
     * @return mixed
     */
    public static function decryptData(string $encryptedData)
    {
        return decrypt($encryptedData);
    }

    /**
     * Generate HMAC signature
     *
     * @param string $data
     * @param string $key
     * @param string $algorithm
     * @return string
     */
    public static function generateHmac(string $data, string $key, string $algorithm = 'sha256'): string
    {
        return hash_hmac($algorithm, $data, $key);
    }

    /**
     * Verify HMAC signature
     *
     * @param string $data
     * @param string $signature
     * @param string $key
     * @param string $algorithm
     * @return bool
     */
    public static function verifyHmac(string $data, string $signature, string $key, string $algorithm = 'sha256'): bool
    {
        $expectedSignature = static::generateHmac($data, $key, $algorithm);
        return hash_equals($expectedSignature, $signature);
    }

    /**
     * Generate timestamp-based unique ID
     *
     * @param string $prefix
     * @return string
     */
    public static function generateTimestampId(string $prefix = ''): string
    {
        $timestamp = (int) (microtime(true) * 1000);
        $random = mt_rand(1000, 9999);

        return $prefix ? $prefix . '_' . $timestamp . '_' . $random : $timestamp . '_' . $random;
    }

    /**
     * Mask sensitive data for logging
     *
     * @param string $data
     * @param int $visibleChars
     * @param string $maskChar
     * @return string
     */
    public static function maskSensitiveData(string $data, int $visibleChars = 4, string $maskChar = '*'): string
    {
        $length = strlen($data);

        if ($length <= $visibleChars) {
            return str_repeat($maskChar, $length);
        }

        $masked = str_repeat($maskChar, $length - $visibleChars);
        return $masked . substr($data, -$visibleChars);
    }
}
