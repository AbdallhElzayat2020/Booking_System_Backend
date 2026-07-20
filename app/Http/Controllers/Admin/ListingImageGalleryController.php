<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImageGallery;
use App\Traits\FileHandler;
use Illuminate\Http\Request;

class ListingImageGalleryController extends Controller
{
    use FileHandler;

    public function index(Listing $listing)
    {
        $images = $listing->images;

        return view('dashboard.listings.imageGallery.index', compact('listing', 'images'));
    }

    public function store(Request $request, Listing $listing)
    {
        $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:2048']
        ], [
            'images.*.image' => 'One or more images are not valid. Please upload valid image files (jpeg, png, jpg, webp) with a maximum size of 2MB.',
            'images.*.mimes' => 'One or more images are not valid. Please upload valid image files (jpeg, png, jpg, webp) with a maximum size of 2MB.',
            'images.*.max' => 'One or more images exceed the maximum size of 2MB.'
        ]);


        $imagesPath = $this->uploadFiles($request, 'images', [], 'listing_images');
        foreach ($imagesPath as $imagePath) {

            $listing->images()->create([
                'image' => $imagePath
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully.');

    }

    public function destroy(Listing $listing, ListingImageGallery $image)
    {
        try {

            $this->deleteFile($image->image, 'listing_images');
            $image->delete();

        } catch
        (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete image.' . $e->getMessage());
        }

        return back()->with('success', 'Image deleted successfully.');
    }
}
