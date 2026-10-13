<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Models\Setting;
use App\Services\SettingService;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use FileHandler;

    public function __construct()
    {
        $this->middleware(['permission:setting index'])->only('index', 'update');
    }

    public function index()
    {
        return view('dashboard.setting.index');
    }

    public function update(UpdateSettingRequest $request, SettingService $settingService)
    {
        foreach ($request->validated() as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService->clearCachedSettings();

        return redirect()->back()->with('success', 'Updated Successfully');
    }

    public function logoSettings(Request $request, SettingService $settingService)
    {
        $validatedData = $request->validate([
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3000'],
            'favicon' => ['nullable', 'file', 'mimes:ico,png,jpg,jpeg', 'max:3000'],
        ]);

        // ===== Logo =====
        if ($request->hasFile('logo')) {
            $oldLogo = Setting::where('key', 'logo')->value('value');

            $logoPath = $this->uploadFile($request, 'logo', $oldLogo, 'settings');

            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $logoPath]
            );
        }

        // ===== Favicon =====
        if ($request->hasFile('favicon')) {
            $oldFavicon = Setting::where('key', 'favicon')->value('value');

            $faviconPath = $this->uploadFile($request, 'favicon', $oldFavicon, 'settings');

            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $faviconPath]
            );
        }

        $settingService->clearCachedSettings();

        return back()->with('success', 'Logo settings updated successfully.');

    }

    public function appearanceSettings(Request $request, SettingService $settingService)
    {
        $validatedData = $request->validate([
            'site_color' => ['required', 'max:7', 'string'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        $settingService->clearCachedSettings();

        return back()->with('success', 'Logo settings updated successfully.');
    }
}
