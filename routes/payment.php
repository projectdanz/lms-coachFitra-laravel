<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

// Payment routes
Route::prefix('payments')->group(function () {
    Route::post('/', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::post('/simple', [PaymentController::class, 'createSimplePayment'])->name('payment.create.simple');
    Route::get('/status/{orderId}', [PaymentController::class, 'getPaymentStatus'])->name('payment.status');
    Route::post('/cancel/{orderId}', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
    Route::get('/methods', [PaymentController::class, 'getPaymentMethods'])->name('payment.methods');
    Route::get('/config', [PaymentController::class, 'getConfig'])->name('payment.config');
    Route::get('/test', [PaymentController::class, 'testConnection'])->name('payment.test');
});

// Webhook endpoint (should be excluded from CSRF protection)
Route::post('/payments/webhook', [PaymentController::class, 'handleWebhook'])->name('payment.webhook');

// Payment callback routes
Route::get('/payment/finish', function () {
    return view('payment.finish');
})->name('payment.finish');

Route::get('/payment/error', function () {
    return view('payment.error');
})->name('payment.error');

Route::get('/payment/pending', function () {
    return view('payment.pending');
})->name('payment.pending');
