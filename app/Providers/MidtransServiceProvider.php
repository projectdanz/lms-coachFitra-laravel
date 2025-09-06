<?php

namespace App\Providers;

use App\Services\NotificationService;
use App\Services\PaymentService;
use App\Services\UserRegistrationService;
use Illuminate\Support\ServiceProvider;
use App\Services\Midtrans\MidtransPayment;
use App\Services\Midtrans\SnapService;
use App\Services\Midtrans\PaymentLinkService;
use App\Services\Midtrans\DisbursementService;
use App\Services\Midtrans\PayoutService;
use App\Services\Midtrans\InvoiceService;
use App\Services\Midtrans\PaymentMethods\EWalletService;
use App\Services\Midtrans\PaymentMethods\BankService;
use App\Services\Midtrans\PaymentMethods\CardPaymentService;
use App\Services\Midtrans\PaymentMethods\RetailOutletService;
use App\Services\Midtrans\PaymentMethods\QRISService;

class MidtransServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(NotificationService::class, function ($app) {
            return new NotificationService();
        });

        $this->app->singleton(UserRegistrationService::class, function ($app) {
            $notif = $app->make(NotificationService::class);
            return new UserRegistrationService($notif);
        });

        $this->app->singleton(PaymentService::class, function ($app) {
            $notif = $app->make(NotificationService::class);
            $userRegistration = $app->make(UserRegistrationService::class);
            $midtrans = $app->make(MidtransPayment::class);

            return new PaymentService($midtrans, $userRegistration, $notif);
        });

        $this->app->singleton(MidtransPayment::class, function ($app) {
            $snapService = $app->make(SnapService::class);
            return new MidtransPayment($snapService);
        });

        $this->app->singleton(SnapService::class, function ($app) {
            return new SnapService();
        });

        // $this->app->singleton(PaymentLinkService::class, function ($app) {
        //     return new PaymentLinkService();
        // });

        // $this->app->singleton(DisbursementService::class, function ($app) {
        //     return new DisbursementService();
        // });

        // $this->app->singleton(PayoutService::class, function ($app) {
        //     return new PayoutService();
        // });

        // $this->app->singleton(InvoiceService::class, function ($app) {
        //     return new InvoiceService();
        // });

        // $this->app->singleton(EWalletService::class, function ($app) {
        //     return new EWalletService();
        // });

        // $this->app->singleton(BankService::class, function ($app) {
        //     return new BankService();
        // });

        // $this->app->singleton(CardPaymentService::class, function ($app) {
        //     return new CardPaymentService();
        // });

        // $this->app->singleton(RetailOutletService::class, function ($app) {
        //     return new RetailOutletService();
        // });

        // $this->app->singleton(QRISService::class, function ($app) {
        //     return new QRISService();
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/midtrans.php' => config_path('midtrans.php'),
        ], 'midtrans-config');
    }
}
