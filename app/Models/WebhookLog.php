<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookLog extends Model
{
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
}
