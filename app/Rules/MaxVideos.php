<?php

namespace App\Rules;

use App\Models\ListingVideoGallery;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxVideos implements ValidationRule
{
    protected int $ListingId;

    public function __construct(int $ListingId)
    {
        $this->ListingId = $ListingId;
    }


    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $packageVideoLimit = Auth::user()->subscription->package->number_of_videos;

        // unlimited
        if ($packageVideoLimit === -1) {
            return;
        }

        $userVideoCount = ListingVideoGallery::where('listing_id', $this->ListingId)->count();

        if ($userVideoCount >= $packageVideoLimit) {
            $fail('You have reached the maximum number of videos allowed for this listing.');
        }


    }
}
