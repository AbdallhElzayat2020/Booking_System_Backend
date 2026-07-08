<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');




/* --------------------- Protected Routes --------------------- */









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
