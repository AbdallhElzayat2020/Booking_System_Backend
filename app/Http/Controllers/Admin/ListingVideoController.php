<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingVideoGallery;
use Illuminate\Http\Request;

class ListingVideoController extends Controller
{
    //
    public function index(Listing $listing)
    {
        $videos = $listing->videos;
        return view('dashboard.listings.videoGallery.index', compact('listing', 'videos'));
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


//            if ($video->listing_id != $listing->id) {
//                abort(404);
//            }

//            $listing->videos()
//                ->whereKey($video->id)
//                ->firstOrFail()
//                ->delete();


            $listing->videos()->findOrFail($video->id)->delete();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'deleted successfully.');
    }

}


