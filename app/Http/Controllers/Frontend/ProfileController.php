<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UpdateProfileRequest;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    use FileHandler;

    public function index()
    {
        $user = auth()->user();
        return view('frontend.dashboard.profile', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $oldAvatar = $user->avatar;
        $oldBanner = $user->banner;

        $data = $request->validated();

        $data['avatar'] = $this->uploadFile($request, 'avatar', $oldAvatar, 'avatars');
        $data['banner'] = $this->uploadFile($request, 'banner', $oldBanner, 'banners');

        $user->update($data);
        return redirect()->back()->with('success', 'Profile updated successfully.');

    }
}
