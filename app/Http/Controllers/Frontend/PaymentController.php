<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    public function paypalAmount(): int
    {
        $packageId = Session::get('selected_package_id');
        $package = Package::findOrFail($packageId);
        return $package->price;
    }

    public function setPaypalConfig(): array
    {

        return [
            'mode' => config('payment.paypal_mode'), // 'sandbox' or 'live'
            'sandbox' => [
                'client_id' => config('payment.paypal_client_id'),
                'client_secret' => config('payment.paypal_secret_key'),
                'app_id' => 'APP-80W284485P519543T',
            ],

            'live' => [
                'client_id' => config('payment.paypal_client_id'),
                'client_secret' => config('payment.paypal_secret_key'),
                'app_id' => config('payment.paypal_app_key'),
            ],

            'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // 'Sale', 'Authorization', or 'Order'

            'currency' => config('payment.paypal_currency'),

            'notify_url' => env('PAYPAL_NOTIFY_URL', ''),

            'locale' => env('PAYPAL_LOCALE', 'en_US'),

            'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true),

            'timeout' => env('PAYPAL_TIMEOUT', 30),         // total request timeout (seconds)

            'connect_timeout' => env('PAYPAL_CONNECT_TIMEOUT', 10), // connection timeout (seconds)

            'max_retries' => env('PAYPAL_MAX_RETRIES', 2),      // retries on 5xx / 429 / network errors (0 to disable)
        ];
    }

    public function payWithPaypal()
    {

        dd(\App\Models\PaymentSetting::pluck('value', 'key'));
        $config = $this->setPaypalConfig();

        $provider = new PayPalClient();

        $provider->setApiCredentials($config);

        $token = $provider->getAccessToken();

        dd($token);

        $totalAmount = $this->paypalAmount() * config('payment.paypal_currency_rate');

        $response = $provider->createOrder([
            'intent' => 'CAPTURE', //"AUTHORIZE"
            'application_context' => [
                "return_url" => route('paypal.payment.success'), // https://موقعك.com/success
                "cancel_url" => route('paypal.payment.cancel') // https://موقعك.com/cancel
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('payment.paypal_currency'),
                        'value' => $totalAmount
                    ]
                ],
            ],
        ]);

        return $response;

    }

    public function paypalSuccess()
    {

    }

    public function paypalCancel()
    {

    }
}
