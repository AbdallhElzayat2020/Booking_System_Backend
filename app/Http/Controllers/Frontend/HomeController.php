<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Hero;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $hero = Hero::first();
        $categories = Category::active()->showAtHome()->limit(8)->get();
        $packages = Package::with('features')->active()->showAtHome()->limit(3)->get();

        $featuredCategories = Category::withCount(['listings' => function ($query) {
            $query->active();
        }])->active()
            ->having('listings_count', '>', 0)
            ->orderByDesc('listings_count')
            ->limit(6)
            ->get();

        $featuredLocation = Location::whereHas('listings', function ($query) {
            $query->where([
                'status' => 'active',
                'is_approved' => 'yes',
                'is_verified' => 'yes',
                'is_featured' => 'yes'
            ]);
        })->with(['listings' => function ($query) {
            $query->where([
                'status' => 'active',
                'is_approved' => 'yes',
                'is_verified' => 'yes',
                'is_featured' => 'yes'])
                ->with('category')
                ->orderByDesc('id');
        }])->active()
            ->showAtHome()
            ->get();


        $featuredListings = Listing::where([
            'status' => 'active',
            'is_featured' => 'yes',
            'is_approved' => 'yes',
            'is_verified' => 'yes'
        ])->with(['category', 'location'])
            ->limit(8)
            ->latest()
            ->get();


        return view('frontend.home', [
            'hero' => $hero,
            'categories' => $categories,
            'packages' => $packages,
            'featuredCategories' => $featuredCategories,
            'featuredListings' => $featuredListings,
            'featuredLocation' => $featuredLocation,
        ]);
    }
}
