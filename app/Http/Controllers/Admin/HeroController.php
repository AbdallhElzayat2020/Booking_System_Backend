<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateHeroSection;
use App\Models\Hero;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use FileHandler;

    public function index()
    {
        $banner = Hero::first();
        return view('dashboard.hero.index', [
            'banner' => $banner
        ]);
    }

    public function update(UpdateHeroSection $request)
    {
        $banner = Hero::first();
        $oldImage = $banner->bg_image;

        $data = $request->validated();
        $data['bg_image'] = $this->uploadFile($request, 'bg_image', $oldImage, 'uploads');
        $banner->update($data);
        return redirect()->back()->with('success', 'updated successfully.');
    }
}
