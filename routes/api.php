<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Cron endpoints (protect with secret key)
Route::prefix('cron')->group(function () {
    // Process pending users (run every 5 minutes)
    Route::get('/process-pending-users', [PaymentController::class, 'processPendingUsers'])
        ->name('cron.process-users');
    
    // Cleanup old records (run daily)
    Route::get('/cleanup-old-records', [PaymentController::class, 'cleanupOldRecords'])
        ->name('cron.cleanup');
    
    // Health check (run every 15 minutes)
    Route::get('/health-check', [PaymentController::class, 'healthCheck'])
        ->name('cron.health');
});

require __DIR__ . '/payment.php';
