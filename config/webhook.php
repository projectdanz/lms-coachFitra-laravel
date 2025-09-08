<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Webhook Processing Configuration for Shared Hosting
    |--------------------------------------------------------------------------
    */

    'cron_secret' => env('CRON_SECRET', 'default-secret-change-this'),
    
    'immediate_processing' => env('WEBHOOK_IMMEDIATE_PROCESSING', true),
    
    'batch_size' => env('USER_PROCESSING_BATCH_SIZE', 5),
    
    'max_execution_time' => env('MAX_EXECUTION_TIME', 25),
    
    'cache_ttl' => env('WEBHOOK_CACHE_TTL', 300),
    
    /*
    |--------------------------------------------------------------------------
    | Processing Strategy Hours
    |--------------------------------------------------------------------------
    | Define when to process immediately vs defer to cron
    */
    'processing_hours' => [
        'immediate' => [1, 2, 3, 4, 5], // Low traffic hours (1-5 AM)
        'deferred' => [6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 0],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Monitoring & Alerting
    |--------------------------------------------------------------------------
    */
    'alerts' => [
        'pending_threshold' => 50,
        'failure_rate_threshold' => 20, // percentage
        'processing_time_threshold' => 10, // seconds
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Cleanup Settings
    |--------------------------------------------------------------------------
    */
    'cleanup' => [
        'webhook_logs_days' => 30,
        'completed_processing_days' => 7,
        'failed_processing_days' => 30,
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Retry Settings
    |--------------------------------------------------------------------------
    */
    'retry' => [
        'max_attempts' => 3,
        'delay_seconds' => 300, // 5 minutes between retries
    ],
];