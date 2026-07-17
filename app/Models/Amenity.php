<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'status',
        'slug',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }



    // -------------- Relationships -----------------

    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class, 'listing_amenities', 'amenity_id', 'listing_id');
    }
}
