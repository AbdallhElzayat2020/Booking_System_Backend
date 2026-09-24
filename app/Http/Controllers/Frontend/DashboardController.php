<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->first();
        return view('frontend.dashboard.home', compact('user', 'subscription'));
    }
}
