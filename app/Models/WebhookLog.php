<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebhookLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'transaction_status',
        'payment_type',
        'fraud_status',
        'gross_amount',
        'job_id',
        'status',
        'received_at',
        'started_at',
        'completed_at',
        'processing_time_seconds',
        'attempts',
        'error_message',
        'webhook_data',
        'validation_data',
    ];

    protected $casts = [
        'webhook_data' => 'array',
        'validation_data' => 'array',
        'received_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'gross_amount' => 'decimal:2',
    ];

    /**
     * Get the user associated with this webhook
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'order_id', 'order_id');
    }

    /**
     * Scope for failed webhooks
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /**
     * Scope for completed webhooks
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope for pending webhooks
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for today's webhooks
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope for webhooks within date range
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    /**
     * Mark webhook as processing
     */
    public function markAsProcessing(?string $jobId = null): void
    {
        $this->update([
            'status' => 'processing',
            'started_at' => now(),
            'job_id' => $jobId,
            'attempts' => $this->attempts + 1,
        ]);
    }

    /**
     * Mark webhook as completed
     */
    public function markAsCompleted(): void
    {
        $completedAt = now();
        $processingTime = $this->started_at ? 
            $completedAt->diffInSeconds($this->started_at) : null;

        $this->update([
            'status' => 'completed',
            'completed_at' => $completedAt,
            'processing_time_seconds' => $processingTime,
            'error_message' => null,
        ]);
    }

    /**
     * Mark webhook as failed
     */
    public function markAsFailed(string $errorMessage): void
    {
        $this->update([
            'status' => 'failed',
            'completed_at' => now(),
            'error_message' => $errorMessage,
        ]);
    }

    /**
     * Get processing duration in human readable format
     */
    public function getProcessingDurationAttribute(): ?string
    {
        if (!$this->processing_time_seconds) {
            return null;
        }

        if ($this->processing_time_seconds < 60) {
            return "{$this->processing_time_seconds} seconds";
        }

        $minutes = floor($this->processing_time_seconds / 60);
        $seconds = $this->processing_time_seconds % 60;

        return "{$minutes}m {$seconds}s";
    }

    /**
     * Get status badge color for UI
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'yellow',
            'processing' => 'blue',
            'completed' => 'green',
            'failed' => 'red',
            default => 'gray'
        };
    }

    /**
     * Check if webhook can be retried
     */
    public function canRetry(): bool
    {
        return $this->status === 'failed' && $this->attempts < 3;
    }

    /**
     * Get webhook statistics
     */
    public static function getStatistics(array $filters = []): array
    {
        $query = self::query();

        // Apply date filter if provided
        if (isset($filters['start_date']) && isset($filters['end_date'])) {
            $query->dateRange($filters['start_date'], $filters['end_date']);
        } else {
            $query->today();
        }

        $stats = $query->selectRaw('
            status,
            COUNT(*) as count,
            AVG(processing_time_seconds) as avg_processing_time,
            MAX(processing_time_seconds) as max_processing_time,
            MIN(processing_time_seconds) as min_processing_time
        ')
        ->groupBy('status')
        ->get()
        ->keyBy('status');

        return [
            'total' => $stats->sum('count'),
            'completed' => $stats['completed']['count'] ?? 0,
            'failed' => $stats['failed']['count'] ?? 0,
            'pending' => $stats['pending']['count'] ?? 0,
            'processing' => $stats['processing']['count'] ?? 0,
            'avg_processing_time' => $stats['completed']['avg_processing_time'] ?? 0,
            'max_processing_time' => $stats['completed']['max_processing_time'] ?? 0,
            'min_processing_time' => $stats['completed']['min_processing_time'] ?? 0,
            'success_rate' => $stats->sum('count') > 0 ? 
                (($stats['completed']['count'] ?? 0) / $stats->sum('count')) * 100 : 0,
        ];
    }

    /**
     * Get hourly statistics for the last 24 hours
     */
    public static function getHourlyStats(): array
    {
        $stats = [];
        
        for ($i = 23; $i >= 0; $i--) {
            $hour = now()->subHours($i);
            $hourStart = $hour->copy()->startOfHour();
            $hourEnd = $hour->copy()->endOfHour();
            
            $hourStats = self::whereBetween('created_at', [$hourStart, $hourEnd])
                ->selectRaw('
                    status,
                    COUNT(*) as count
                ')
                ->groupBy('status')
                ->get()
                ->keyBy('status');
            
            $stats[] = [
                'hour' => $hour->format('H:00'),
                'timestamp' => $hourStart->timestamp,
                'completed' => $hourStats['completed']['count'] ?? 0,
                'failed' => $hourStats['failed']['count'] ?? 0,
                'pending' => $hourStats['pending']['count'] ?? 0,
                'total' => $hourStats->sum('count'),
            ];
        }
        
        return $stats;
    }

    /**
     * Clean up old webhook logs
     */
    public static function cleanup(int $daysToKeep = 30): int
    {
        $cutoffDate = now()->subDays($daysToKeep);
        
        return self::where('created_at', '<', $cutoffDate)
            ->where('status', 'completed')
            ->delete();
    }
}