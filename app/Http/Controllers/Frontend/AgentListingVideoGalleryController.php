<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingVideoGallery;
use Illuminate\Http\Request;

class AgentListingVideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Listing $listing)
    {
        $videos = $listing->videos;
        $user = auth()->user();
        return view('frontend.dashboard.listings.videoGallery.index', compact('listing', 'videos', 'user'));
    }

    public function store(Listing $listing, Request $request)
    {
        $videoId = extractYoutubeId($request->video_url);

        if (!$videoId) {
            return redirect()->back()->with('error', 'Invalid YouTube video URL.');
        }
        $request->validate([
            'video_url' => 'required|url',
            'platform' => ['nullable', 'string', 'max:255']
        ]);

        $listing->videos()->create([
            'video_url' => $videoId,
            'platform' => $request->platform
        ]);

        return redirect()->back()->with('success', 'Video added successfully.');
    }

    public function destroy(Listing $listing, ListingVideoGallery $video)
    {
        try {

            $listing->videos()->findOrFail($video->id)->delete();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
