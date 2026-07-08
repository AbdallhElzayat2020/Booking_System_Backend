<?php

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


});


/* --------------------- Protected Routes --------------------- */


Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['auth'],
], function () {


    Route::get('/dashboard', [HomeController::class, 'index'])
        ->name('index');


});




