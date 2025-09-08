<?php

use App\Http\Middleware\CronAuth;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: __DIR__ . '/../routes/api.php',
        apiPrefix: 'api/',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'api/payments/webhook'
        ]);
        $middleware->alias([
            'cron.auth' => CronAuth::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(function () {
            app(\App\Http\Controllers\PaymentController::class)->processPendingUsers(
                new \Illuminate\Http\Request(['secret' => config('webhook.cron_secret')])
            );
        })->everyFiveMinutes();

        $schedule->call(function () {
            app(\App\Http\Controllers\PaymentController::class)->healthCheck(
                new \Illuminate\Http\Request(['secret' => config('webhook.cron_secret')])
            );
        })->everyFifteenMinutes();

        $schedule->call(function () {
            app(\App\Http\Controllers\PaymentController::class)->cleanupOldRecords(
                new \Illuminate\Http\Request(['secret' => config('webhook.cron_secret')])
            );
        })->dailyAt('02:00');
    })
    ->create();
