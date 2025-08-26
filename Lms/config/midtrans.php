<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you wish to configure various
    | services that your application utilizes.
    |
    | Supported: "sandbox", "production"
    |
    */

    'environment' => env('MIDTRANS_ENVIRONMENT', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Server Key
    |--------------------------------------------------------------------------
    |
    | Your Midtrans server key for API authentication
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Client Key
    |--------------------------------------------------------------------------
    |
    | Your Midtrans client key for frontend integration
    |
    */

    'client_key' => env('MIDTRANS_CLIENT_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Base URLs
    |--------------------------------------------------------------------------
    |
    | Configure base URLs for different Midtrans services
    |
    */

    'base_urls' => [
        'sandbox' => [
            'api' => 'https://api.sandbox.midtrans.com',
            'snap' => 'https://app.sandbox.midtrans.com',
            'disbursement' => 'https://api.sandbox.midtrans.com',
            'payout' => 'https://app.sandbox.midtrans.com',
            'invoice' => 'https://api.sandbox.midtrans.com',
            'payment_link' => 'https://api.sandbox.midtrans.com',
        ],
        'production' => [
            'api' => 'https://api.midtrans.com',
            'snap' => 'https://app.midtrans.com',
            'disbursement' => 'https://api.midtrans.com',
            'payout' => 'https://app.midtrans.com',
            'invoice' => 'https://api.midtrans.com',
            'payment_link' => 'https://api.midtrans.com',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Callback URLs
    |--------------------------------------------------------------------------
    |
    | Default callback URLs for payment notifications
    |
    */

    'callback_urls' => [
        'finish' => env('MIDTRANS_FINISH_URL', '/payment/finish'),
        'error' => env('MIDTRANS_ERROR_URL', '/payment/error'),
        'pending' => env('MIDTRANS_PENDING_URL', '/payment/pending'),
        'notification' => env('MIDTRANS_NOTIFICATION_URL', '/payment/notification'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Configuration
    |--------------------------------------------------------------------------
    |
    | Default payment configuration options
    |
    */

    'payment' => [
        'secure' => true,
        'save_card' => false,
        'enabled_payments' => [
            'credit_card',
            'bank_transfer',
            'echannel',
            'gopay',
            'ovo',
            'dana',
            'shopeepay',
            'qris',
            'cstore'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    |
    | Enable/disable logging for debugging purposes
    |
    */

    'logging' => [
        'enabled' => env('MIDTRANS_LOGGING_ENABLED', true),
        'channel' => env('MIDTRANS_LOG_CHANNEL', 'stack'),
        'level' => env('MIDTRANS_LOG_LEVEL', 'info'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Timeout Settings
    |--------------------------------------------------------------------------
    |
    | HTTP request timeout settings in seconds
    |
    */

    'timeout' => [
        'connect' => 30,
        'request' => 60,
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Banks
    |--------------------------------------------------------------------------
    |
    | List of supported banks for various operations
    |
    */

    'supported_banks' => [
        'mandiri', 'bri', 'bca', 'bni', 'cimb', 'danamon', 'permata',
        'bsi', 'btn', 'maybank', 'panin', 'ocbc', 'mega', 'sinarmas'
    ],

    /*
    |--------------------------------------------------------------------------
    | Fee Configuration
    |--------------------------------------------------------------------------
    |
    | Default fee configuration for different payment methods
    |
    */

    'fees' => [
        'bank_transfer' => 4000,
        'gopay_disbursement' => 2500,
        'credit_card' => [
            'bca' => 2500,
            'mandiri' => 2500,
            'bni' => 2500,
            'bri' => 2500,
            'default' => 2500,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Limits
    |--------------------------------------------------------------------------
    |
    | Default payment limits for different methods
    |
    */

    'limits' => [
        'qris' => [
            'min' => 1,
            'max' => 10000000,
        ],
        'retail' => [
            'indomaret' => [
                'min' => 10000,
                'max' => 5000000,
            ],
            'alfamart' => [
                'min' => 10000,
                'max' => 2500000,
            ],
        ],
        'payout' => [
            'min' => 10000,
            'max' => 500000000,
        ],
    ],

];
