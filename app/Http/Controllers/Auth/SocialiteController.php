<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login($provider)
    {
        if (!in_array($provider, ['github', 'google'])) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        if (!in_array($provider, ['github', 'google'])) {
            abort(404);
        }

        try {
            $socialiteUser = Socialite::driver($provider)->user();

            $user = User::where('provider_id', $socialiteUser->getId())
                ->where('provider_name', $provider)
                ->first();

            if (!$user) {
                $user = User::where('email', $socialiteUser->getEmail())->first();

                if ($user) {
                    $user->update([
                        'provider_id'   => $socialiteUser->getId(),
                        'provider_name' => $provider,
                    ]);
                } else {
                    $user = User::create([
                        'name'          => $socialiteUser->getName() ?? $socialiteUser->getNickname() ?? 'User',
                        'email'         => $socialiteUser->getEmail(),
                        'password'      => null,
                        'provider_id'   => $socialiteUser->getId(),
                        'provider_name' => $provider,
                    ]);
                }
            }

            Auth::login($user, true);

            return to_route('user.dashboard')
                ->with('success', 'Logged in successfully using ' . ucfirst($provider) . '!');

        } catch (\Exception $e) {
            \Log::error('Social Login Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Failed to login using ' . ucfirst($provider) . '. Please try again.');
        }
    }
}
