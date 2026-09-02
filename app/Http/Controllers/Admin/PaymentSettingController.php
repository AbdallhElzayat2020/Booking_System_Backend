<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePaymentSettingRequest;
use App\Models\PaymentSetting;
use App\Services\PaymentSettingService;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    /*
     * paypal_status
     * paypal_mode   = sandbox or live
     * paypal_country
     * paypal_currency
     * paypal_currency_rate
     * paypal_client_id
     * paypal_secret_key
     * paypal_app_key
     *
     * */
    public function index()
    {
        return view('dashboard.PaymentSetting.index');
    }

    public function update(UpdatePaymentSettingRequest $request, PaymentSettingService $paymentSettingService)
    {

        foreach ($request->validated() as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $paymentSettingService->clearCachedSettings();

        return redirect()->back()->with('success', 'updated successfully.');
    }

    public function stripeSetting(Request $request, PaymentSettingService $paymentSettingService)
    {

        $validatedData = $request->validate([
            'stripe_status' => ['required', 'in:active,inactive'],
            'stripe_country' => ['required'],
            'stripe_currency' => ['required'],
            'stripe_currency_rate' => ['required'],
            'stripe_key' => ['required'],
            'stripe_secret_key' => ['required'],
        ]);

        foreach ($validatedData as $key => $value) {
            PaymentSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $paymentSettingService->clearCachedSettings();

        return redirect()->back()->with('success', 'updated successfully.');
    }
}
