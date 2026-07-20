<?php

use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingImageGalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;


/* --------------------- public Routes --------------------- */

Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['guest'],
], function () {


    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');


    Route::get('forget-password', [PasswordController::class, 'showForm'])
        ->name('forget-password.index');

});


/* --------------------- Protected Routes --------------------- */

Route::group(['prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'user.type:admin']],
    function () {


        Route::get('/dashboard', [HomeController::class, 'index'])
            ->name('dashboard');

        /*  --- Profile Routes --- */
        Route::get('profile', [ProfileController::class, 'index'])
            ->name('profile.index');

        Route::put('profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::put('profile/change-password', [PasswordController::class, 'updatePassword'])
            ->name('profile.change-password');


        /*  --- Hero Routes --- */

        Route::get('hero-section', [HeroController::class, 'index'])
            ->name('hero.index');

        Route::put('hero-section', [HeroController::class, 'update'])
            ->name('hero.update');

        /*  --- Categories Routes --- */
        Route::resource('categories', CategoryController::class);

        /*  --- Locations Routes --- */
        Route::resource('locations', LocationController::class);

        /* Amenities Routes */
        Route::resource('amenities', AmenityController::class);

        /* Listings Routes */
        Route::resource('listings', ListingController::class);


        /* Listing Image Gallery Routes */

        Route::get('listings/{listing}/gallery-images', [ListingImageGalleryController::class, 'index'])
            ->name('listings.gallery.index');

        Route::post('listings/{listing}/gallery-images', [ListingImageGalleryController::class, 'store'])
            ->name('listings.gallery.store');

        Route::delete('/listings/{listing}/gallery-images/{image}', [ListingImageGalleryController::class, 'destroy'])
            ->name('listings.gallery.destroy');
    });




