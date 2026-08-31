<?php

namespace App\Http\Controllers\Frontend;

use App\Events\CreateOrder;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{


    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }

    public function paymentCancel()
    {
        return view('frontend.pages.payment-cancel');
    }


    public function paypalAmount()
    {
        $packageId = Session::get('selected_package_id');
        $package = Package::findOrFail($packageId);
        return $package->price;
    }

    public function setPaypalConfig()
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
                'app_id' => config('payment.paypal_app_key')
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

        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();


        $totalAmount = $this->paypalAmount() * config('payment.paypal_currency_rate');

        $response = $provider->createOrder([
            'intent' => 'CAPTURE', // Authorize or Capture
            'application_context' => [
                'return_url' => route('paypal.payment.success'),
                'cancel_url' => route('paypal.payment.cancel'),
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

        if (isset($response['id']) && $response['status'] === 'CREATED') {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    $approvalUrl = $link['href'];
                    return redirect()->away($approvalUrl);
                }
            }
        } else {
            // handle error
            return to_route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
    }

    public function paypalSuccess(Request $request)
    {
        $config = $this->setPaypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            $paymentInfo = [
                'transaction_id' => $capture['id'],
                'payment_method' => 'PayPal',
                'paid_amount' => $capture['amount']['value'],
                'paid_currency' => $capture['amount']['currency_code'],
                'payment_status' => 'Completed',
            ];

            // dispatch the event to create the order
            CreateOrder::dispatch($paymentInfo);

            return to_route('payment.success')->with('success', 'Payment successful!');
        }


    }

    public function paypalCancel()
    {
        return to_route('payment.cancel')->withErrors(['error' => 'Payment was cancelled.']);
    }
}
