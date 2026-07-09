<?php

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
        ->name('profile.forget-password.index');

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




    });




