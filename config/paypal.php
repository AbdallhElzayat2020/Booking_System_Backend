<?php
return [
    'mode' => env('PAYPAL_MODE', 'sandbox'), // 'sandbox' or 'live'
    'sandbox' => [
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
        'app_id' => 'APP-80W284485P519543T',
    ],

    'live' => [
        'client_id' => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id' => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // 'Sale', 'Authorization', or 'Order'
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''),
    'locale' => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true),
    'timeout' => env('PAYPAL_TIMEOUT', 30),         // total request timeout (seconds)
    'connect_timeout' => env('PAYPAL_CONNECT_TIMEOUT', 10), // connection timeout (seconds)
    'max_retries' => env('PAYPAL_MAX_RETRIES', 2),      // retries on 5xx / 429 / network errors (0 to disable)
];
