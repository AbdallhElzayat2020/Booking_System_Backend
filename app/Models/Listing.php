<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Listing extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'location_id',
        'package_id',
        'image',
        'thumbnail_image',
        'title',
        'slug',
        'description',
        'phone',
        'email',
        'address',
        'website',
        'facebook_link',
        'x_link',
        'instagram_link',
        'linkedin_link',
        'whatsapp_link',
        'google_map_embed_code',
        'views',
        'attachments',
        'expired_date',
        'status',
        'is_verified',
        'is_featured',
        'seo_title',
        'seo_description',
        'deleted_at',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    // -------------- Relationships -----------------

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'listing_amenities', 'listing_id', 'amenity_id');
    }

}
