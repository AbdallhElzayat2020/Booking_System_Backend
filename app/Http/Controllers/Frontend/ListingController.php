<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use function Termwind\render;

class ListingController extends Controller
{
    public function listings(string $slug)
    {
//        $category = Category::where('slug', $slug)->firstOrFail();
        $category = Category::whereSlug($slug)->firstOrFail();
        $listings = $category->listings()->active()
            ->approved()
            ->with(['location', 'category'])
            ->where('category_id', $category->id)
            ->paginate(12);

        return view('frontend.pages.listings', [
            'listings' => $listings,
            'category' => $category,
        ]);
    }

    public function listingDetails(string $slug)
    {
        $listing = Listing::with(['user', 'location', 'category'])->whereSlug($slug)->firstOrFail();
        return view('frontend.pages.listing-details', [
            'listing' => $listing,
        ]);
    }

    public function showModal(string $id)
    {
        $listing = Listing::findOrFail($id);
        return view('frontend.layouts.ajax-listing-modal', compact('listing'))->render();
    }
}
