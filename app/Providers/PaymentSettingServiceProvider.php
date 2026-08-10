<?php

namespace App\Providers;

use App\Services\PaymentSettingService;
use Illuminate\Support\ServiceProvider;

class PaymentSettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentSettingService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $settingService = $this->app->make(PaymentSettingService::class);

        $settingService->setGlobalSettings();
    }
}
