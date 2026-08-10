<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class checkoutController extends Controller
{

    public function index(string $slug, string $id)
    {
        $package = Package::with('features')->where('slug', $slug)->where('id', $id)->firstOrFail();

        session()->put('selected_package_id', $package->id);

        return view('frontend.pages.checkout', compact('package'));
    }
}
