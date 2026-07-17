<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon_image',
        'bg_image',
        'description',
        'status',
        'show_at_home',
    ];


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }



    // this for deletes image from storage when delete category but i'm use a observer class
//    protected static function booted()
//    {
//        static::deleted(function (Category $category) {
//          Storage::disk('categories')->delete($category->bg_image);
//          Storage::disk('categories')->delete($category->icon_image);
//        });
//    }

}
