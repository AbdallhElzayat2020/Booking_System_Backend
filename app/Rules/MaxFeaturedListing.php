<?php

namespace App\Rules;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxFeaturedListing implements ValidationRule
{
    protected ?int $listingId;

    public function __construct(?int $listingId = null)
    {
        $this->listingId = $listingId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value !== 'yes') {
            return;
        }

        $packageFeaturedListingLimit = Auth::user()->subscription->package->number_of_featured_listings;

        if ($packageFeaturedListingLimit === -1) {
            return;
        }

        $query = Listing::where([
            'user_id'     => Auth::id(),
            'status'      => 'active',
            'is_featured' => 'yes',
        ]);

        if ($this->listingId) {
            $query->where('id', '!=', $this->listingId);
        }

        $userFeaturedListingCount = $query->count();

        if ($userFeaturedListingCount >= $packageFeaturedListingLimit) {
            $fail("You have reached the maximum number of featured listings ({$packageFeaturedListingLimit}) allowed for your subscription package.");
        }
    }
}
