<?php

namespace App\Http\Controllers\Frontend;

use App\Events\CreateOrder;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class checkoutController extends Controller
{

    public function index(string $slug, string $id)
    {
        $package = Package::with('features')->where('slug', $slug)->where('id', $id)->firstOrFail();

        session()->put('selected_package_id', $package->id);

        if ($package->package_type === 'free' || $package->price == 0) {
            // create Order
            $paymentInfo = [
                'transaction_id' => uniqid(),
                'payment_method' => 'Free',
                'paid_amount' => 0, // convert cents to dollars
                'paid_currency' => config('settings.site_default_currency'),
                'payment_status' => 'completed',
            ];
            CreateOrder::dispatch($paymentInfo);
            return redirect()->route('user.dashboard')
                ->with('success', __('Your order has been placed successfully.'));
        }


        return view('frontend.pages.checkout', compact('package'));
    }
}
