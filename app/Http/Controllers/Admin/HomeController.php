<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $totalUsers = User::where('user_type', 'user')->count();
        $totalAdmins = User::where('user_type', 'admin')->count();
        $totalListings = Listing::active()->count();
        $pendingListings = Listing::active()->where('is_approved', 'no')->count();
        $totalCategories = Category::active()->count();
        $totalLocations = Location::active()->count();
        $totalAmenities = Amenity::active()->count();
        $totalActivePackages = Package::active()->count();
        $totalUnActivePackages = Package::inActive()->count();
        $totalOrders = Order::all()->count();


        return view('dashboard.home', [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalListings' => $totalListings,
            'pendingListings' => $pendingListings,
            'totalCategories' => $totalCategories,
            'totalLocations' => $totalLocations,
            'totalAmenities' => $totalAmenities,
            'totalActivePackages' => $totalActivePackages,
            'totalUnActivePackages' => $totalUnActivePackages,
            'totalOrders' => $totalOrders,
        ]);
    }
}
