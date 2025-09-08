<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingUserProcessing extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'attempts',
        'error_message',
        'last_attempt_at',
    ];
}
