<?php

namespace App\Rules;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class MaxListings implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $packageListingLimit = Auth::user()->subscription->package->number_of_listings;

        if ($packageListingLimit === -1) {
            return;
        }
        $userListingCount = Listing::where([
            'user_id' => Auth::id(),
            'status' => 'active'
        ])->count();

        if ($userListingCount >= $packageListingLimit) {
            $fail('you have reached the maximum number of listings allowed for your package.');
        }
    }
}
