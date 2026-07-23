<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\PasswordController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
 * --------- install breeze for auth ----------
 * composer require laravel/breeze:^1.28 --dev
 * php artisan breeze:install
 * npm install
 * npm run dev
 *
 * ---------- install laravel flasher for flash messages ----------
 * composer require php-flasher/flasher-laravel:^1.15
 * */

/* --------------------- public Routes --------------------- */

Route::get('/', [HomeController::class, 'index'])->name('home');


/* --------------------- Protected Routes --------------------- */

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth']
], function () {


    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('password-update', [PasswordController::class, 'update'])->name('password.update');

    /* ---- listings Routes ----- */

    Route::resource('listings',AgentListingController::class);


});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])
//        ->name('profile.edit');
//
//    Route::patch('/profile', [ProfileController::class, 'update'])
//        ->name('profile.update');
//
//    Route::delete('/profile', [ProfileController::class, 'destroy'])
//        ->name('profile.destroy');
//});

require __DIR__ . '/auth.php';
