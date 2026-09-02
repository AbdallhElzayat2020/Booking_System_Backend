<?php

use App\Http\Controllers\Admin\{AmenityController,
    CategoryController,
    HeroController,
    ListingController,
    ListingImageGalleryController,
    ListingScheduleController,
    ListingVideoController,
    LocationController,
    PackageController,
    PackageFeatureController,
    PasswordController,
    PaymentSettingController,
    PendingListingController,
    ProfileController,
    HomeController,
    AuthController,
    SettingController
};

use Illuminate\Support\Facades\Route;


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
        /* Pending Listings Routes */
        Route::get('listing/pending', [PendingListingController::class, 'index'])->name('listing.pending.index');
        Route::post('listing/pending', [PendingListingController::class, 'updateStatus'])->name('listing.update-status');

        /* Listing Image Gallery Routes */
        Route::get('listings/{listing}/gallery-images', [ListingImageGalleryController::class, 'index'])
            ->name('listings.gallery.index');

        Route::post('listings/{listing}/gallery-images', [ListingImageGalleryController::class, 'store'])
            ->name('listings.gallery.store');

        Route::delete('/listings/{listing}/gallery-images/{image}', [ListingImageGalleryController::class, 'destroy'])
            ->name('listings.gallery.destroy');

        /* Listing Video Gallery Routes */
        Route::get('/listings/{listing}/gallery-videos', [ListingVideoController::class, 'index'])
            ->name('listings.videos-gallery.index');

        Route::post('/listings/{listing}/gallery-videos', [ListingVideoController::class, 'store'])
            ->name('listings.videos-gallery.store');

        Route::delete('/listings/{listing}/gallery-videos/{video}', [ListingVideoController::class, 'destroy'])
            ->name('listings.videos-gallery.destroy');


        /* Listing schedules Routes */
        Route::prefix('listings/{listing}/schedules')
            ->name('listings.schedules.')
            ->controller(ListingScheduleController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{schedule}/edit', 'edit')->name('edit');
                Route::put('/{schedule}', 'update')->name('update');
                Route::delete('/{schedule}', 'destroy')->name('destroy');

            });


        Route::get('package/{package}/features', [PackageFeatureController::class, 'packageFeatures'])
            ->name('package.features');

        Route::get('package/{package}/features/create', [PackageFeatureController::class, 'createForPackage'])
            ->name('packages.features.create');


        /* packages Routes */
        Route::resource('packages', PackageController::class);

        /* Packages Features Routes */
        Route::resource('package-features', PackageFeatureController::class);

        /* Settings Routes */
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('general-settings', [SettingController::class, 'update'])->name('settings.update');

        /* Payment Settings Routes */
        Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');

        Route::post('payment-settings', [PaymentSettingController::class, 'update'])->name('payment-settings.update');

        /* Stripe Settings Routes */
        Route::post('stripe-settings', [PaymentSettingController::class, 'stripeSetting'])->name('stripe-settings.update');

    });




