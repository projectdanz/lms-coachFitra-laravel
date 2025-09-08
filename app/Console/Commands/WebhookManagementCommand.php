<?php

namespace App\Console\Commands;

use App\Models\WebhookLog;
use App\Jobs\ProcessWebhookJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;

class WebhookManagementCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'webhook:manage {action} 
                           {--limit=10 : Limit for batch operations}
                           {--days=7 : Days to look back for operations}
                           {--order-id= : Specific order ID to target}';

    /**
     * The console command description.
     */
    protected $description = 'Manage webhook processing: stats, retry, cleanup, monitor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');

        return match ($action) {
            'stats' => $this->showStats(),
            'retry' => $this->retryFailed(),
            'cleanup' => $this->cleanupOld(),
            'monitor' => $this->monitorHealth(),
            'reprocess' => $this->reprocessWebhook(),
            default => $this->error("Unknown action: {$action}. Available: stats, retry, cleanup, monitor, reprocess")
        };
    }

    /**
     * Show webhook statistics
     */
    private function showStats(): int
    {
        $this->info('📊 Webhook Statistics');
        $this->newLine();

        // Overall stats
        $stats = WebhookLog::getStatistics();
        
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Webhooks Today', number_format($stats['total'])],
                ['Completed', number_format($stats['completed'])],
                ['Failed', number_format($stats['failed'])],
                ['Pending', number_format($stats['pending'])],
                ['Processing', number_format($stats['processing'])],
                ['Success Rate', round($stats['success_rate'], 2) . '%'],
                ['Avg Processing Time', round($stats['avg_processing_time'], 2) . 's'],
                ['Max Processing Time', round($stats['max_processing_time'], 2) . 's'],
            ]
        );

        // Hourly breakdown
        $this->newLine();
        $this->info('📈 Last 24 Hours Breakdown');
        
        $hourlyStats = WebhookLog::getHourlyStats();
        $recentStats = array_slice($hourlyStats, -12); // Last 12 hours
        
        $this->table(
            ['Hour', 'Total', 'Completed', 'Failed', 'Pending'],
            array_map(function ($stat) {
                return [
                    $stat['hour'],
                    $stat['total'],
                    $stat['completed'],
                    $stat['failed'],
                    $stat['pending']
                ];
            }, $recentStats)
        );

        // Queue info
        $this->newLine();
        $this->info('🔄 Queue Information');
        
        try {
            $queueSize = Queue::size('webhooks');
            $this->line("Pending Jobs in Queue: {$queueSize}");
        } catch (\Exception $e) {
            $this->warn('Could not get queue size: ' . $e->getMessage());
        }

        return self::SUCCESS;
    }

    /**
     * Retry failed webhooks
     */
    private function retryFailed(): int
    {
        $limit = $this->option('limit');
        $days = $this->option('days');
        
        $this->info("🔄 Retrying failed webhooks (limit: {$limit}, days: {$days})");

        $failedWebhooks = WebhookLog::failed()
            ->where('created_at', '>=', now()->subDays($days))
            ->where('attempts', '<', 3)
            ->limit($limit)
            ->get();

        if ($failedWebhooks->isEmpty()) {
            $this->info('✅ No failed webhooks found to retry');
            return self::SUCCESS;
        }

        $this->newLine();
        $progressBar = $this->output->createProgressBar($failedWebhooks->count());

        $retried = 0;
        $failed = 0;

        foreach ($failedWebhooks as $webhook) {
            try {
                // Re-dispatch the job
                ProcessWebhookJob::dispatch($webhook->webhook_data, $webhook->id)
                    ->onQueue('webhooks')
                    ->delay(now()->addSeconds(5));

                // Reset webhook status
                $webhook->update([
                    'status' => 'pending',
                    'error_message' => null
                ]);

                $retried++;
                $progressBar->advance();

            } catch (\Exception $e) {
                $this->newLine();
                $this->warn("Failed to retry webhook {$webhook->id}: {$e->getMessage()}");
                $failed++;
                $progressBar->advance();
            }
        }

        $progressBar->finish();
        $this->newLine(2);

        $this->info("✅ Retry completed:");
        $this->line("  - Retried: {$retried}");
        $this->line("  - Failed: {$failed}");

        return self::SUCCESS;
    }

    /**
     * Cleanup old webhook logs
     */
    private function cleanupOld(): int
    {
        $days = $this->option('days');
        
        if ($days < 7) {
            $this->error('Minimum cleanup period is 7 days for safety');
            return self::FAILURE;
        }

        $this->info("🧹 Cleaning up webhook logs older than {$days} days");

        if (!$this->confirm('This will permanently delete old webhook logs. Continue?')) {
            $this->info('Cleanup cancelled');
            return self::SUCCESS;
        }

        $deleted = WebhookLog::cleanup($days);
        
        $this->info("✅ Cleanup completed: {$deleted} records deleted");

        return self::SUCCESS;
    }

    /**
     * Monitor webhook processing health
     */
    private function monitorHealth(): int
    {
        $this->info('🔍 Webhook Health Monitor');
        $this->newLine();

        // Check recent failure rate
        $recentStats = WebhookLog::where('created_at', '>=', now()->subHour())
            ->selectRaw('
                status,
                COUNT(*) as count
            ')
            ->groupBy('status')
            ->get()
            ->keyBy('status');

        $total = $recentStats->sum('count');
        $failed = $recentStats['failed']['count'] ?? 0;
        
        if ($total > 0) {
            $failureRate = ($failed / $total) * 100;
            
            if ($failureRate > 20) {
                $this->error("❌ HIGH FAILURE RATE: {$failureRate}% in last hour");
            } elseif ($failureRate > 10) {
                $this->warn("⚠️  Elevated failure rate: {$failureRate}% in last hour");
            } else {
                $this->info("✅ Normal failure rate: {$failureRate}% in last hour");
            }
        } else {
            $this->line('📊 No webhooks in last hour');
        }

        // Check for stuck processing jobs
        $stuckJobs = WebhookLog::where('status', 'processing')
            ->where('started_at', '<', now()->subMinutes(10))
            ->count();

        if ($stuckJobs > 0) {
            $this->warn("⚠️  {$stuckJobs} jobs stuck in processing state for >10 minutes");
        } else {
            $this->info('✅ No stuck processing jobs');
        }

        // Check queue size
        try {
            $queueSize = Queue::size('webhooks');
            
            if ($queueSize > 100) {
                $this->warn("⚠️  Large queue backlog: {$queueSize} jobs");
            } elseif ($queueSize > 50) {
                $this->line("📊 Moderate queue size: {$queueSize} jobs");
            } else {
                $this->info("✅ Normal queue size: {$queueSize} jobs");
            }
        } catch (\Exception $e) {
            $this->error('❌ Cannot check queue size: ' . $e->getMessage());
        }

        // Check for very slow processing
        $slowJobs = WebhookLog::where('status', 'completed')
            ->where('processing_time_seconds', '>', 60)
            ->where('created_at', '>=', now()->subHour())
            ->count();

        if ($slowJobs > 0) {
            $this->warn("⚠️  {$slowJobs} jobs took >60 seconds to process in last hour");
        } else {
            $this->info('✅ Processing times are normal');
        }

        return self::SUCCESS;
    }

    /**
     * Reprocess a specific webhook
     */
    private function reprocessWebhook(): int
    {
        $orderId = $this->option('order-id');
        
        if (!$orderId) {
            $this->error('--order-id is required for reprocess action');
            return self::FAILURE;
        }

        $webhook = WebhookLog::where('order_id', $orderId)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$webhook) {
            $this->error("No webhook found for order ID: {$orderId}");
            return self::FAILURE;
        }

        $this->info("🔄 Reprocessing webhook for order: {$orderId}");
        $this->line("Status: {$webhook->status}");
        $this->line("Last attempt: {$webhook->updated_at}");

        if (!$this->confirm('Continue with reprocessing?')) {
            $this->info('Reprocessing cancelled');
            return self::SUCCESS;
        }

        try {
            ProcessWebhookJob::dispatch($webhook->webhook_data, $webhook->id)
                ->onQueue('webhooks');

            $webhook->update([
                'status' => 'pending',
                'error_message' => null
            ]);

            $this->info("✅ Webhook reprocessing job dispatched");

        } catch (\Exception $e) {
            $this->error("❌ Failed to reprocess webhook: {$e->getMessage()}");
            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}