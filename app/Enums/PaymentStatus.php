<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case CHALLENGED = 'challenged';
    case REFUNDED = 'refunded';

    /**
     * Get human-readable label
     */
    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PROCESSING => 'Processing',
            self::COMPLETED => 'Completed',
            self::FAILED => 'Failed',
            self::CANCELLED => 'Cancelled',
            self::EXPIRED => 'Expired',
            self::CHALLENGED => 'Under Review',
            self::REFUNDED => 'Refunded',
        };
    }

    /**
     * Get status description
     */
    public function description(): string
    {
        return match ($this) {
            self::PENDING => 'Payment is waiting for completion',
            self::PROCESSING => 'Payment is being processed',
            self::COMPLETED => 'Payment completed successfully',
            self::FAILED => 'Payment failed or was declined',
            self::CANCELLED => 'Payment was cancelled',
            self::EXPIRED => 'Payment expired',
            self::CHALLENGED => 'Payment requires manual review',
            self::REFUNDED => 'Payment has been refunded',
        };
    }

    /**
     * Get status color for UI
     */
    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'yellow',
            self::PROCESSING => 'blue',
            self::COMPLETED => 'green',
            self::FAILED => 'red',
            self::CANCELLED => 'gray',
            self::EXPIRED => 'orange',
            self::CHALLENGED => 'purple',
            self::REFUNDED => 'indigo',
        };
    }

    /**
     * Check if status indicates successful payment
     */
    public function isSuccessful(): bool
    {
        return $this === self::COMPLETED;
    }

    /**
     * Check if status indicates failed payment
     */
    public function isFailed(): bool
    {
        return in_array($this, [
            self::FAILED,
            self::CANCELLED,
            self::EXPIRED,
        ]);
    }

    /**
     * Check if status indicates pending payment
     */
    public function isPending(): bool
    {
        return in_array($this, [
            self::PENDING,
            self::PROCESSING,
            self::CHALLENGED,
        ]);
    }

    /**
     * Check if status is final (no more changes expected)
     */
    public function isFinal(): bool
    {
        return in_array($this, [
            self::COMPLETED,
            self::FAILED,
            self::CANCELLED,
            self::EXPIRED,
            self::REFUNDED,
        ]);
    }

    /**
     * Get all possible statuses
     */
    public static function all(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    /**
     * Get statuses for dropdown/select
     */
    public static function options(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
            'description' => $case->description(),
            'color' => $case->color(),
        ], self::cases());
    }

    /**
     * Create from Midtrans status
     */
    public static function fromMidtransStatus(string $transactionStatus, ?string $fraudStatus = null): self
    {
        return match ($transactionStatus) {
            'capture' => match ($fraudStatus) {
                'accept' => self::COMPLETED,
                'challenge' => self::CHALLENGED,
                default => self::FAILED,
            },
            'settlement' => self::COMPLETED,
            'pending' => self::PENDING,
            'deny' => self::FAILED,
            'cancel' => self::CANCELLED,
            'expire' => self::EXPIRED,
            'refund' => self::REFUNDED,
            default => self::PENDING,
        };
    }
}