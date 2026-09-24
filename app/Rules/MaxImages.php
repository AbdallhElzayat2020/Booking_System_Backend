<?php

namespace App\Rules;

use App\Models\ListingImageGallery;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxImages implements ValidationRule
{
    protected int $ListingId;

    public function __construct(int $ListingId)
    {
        $this->ListingId = $ListingId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $packageImageLimit = Auth::user()->subscription->package->number_of_photos;

        // Unlimited
        if ($packageImageLimit === -1) {
            return;
        }
        $userImageCount = ListingImageGallery::where('listing_id', $this->ListingId)->count();
        $uploadedImageCount = count(request('images', []));

        $totalImageCount = $userImageCount + $uploadedImageCount;

        if ($totalImageCount > $packageImageLimit) {
            $fail('You have reached the maximum number of images allowed for this listing.');
        }
    }
}
