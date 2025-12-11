<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\client\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;


Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
});


Route::controller(UserController::class)
    ->prefix('admin')
    ->middleware('auth')
    ->name('admin.users.')
    ->group(function () {

        Route::get('/', 'home')->name('home');

        Route::get('/users', 'users')->name('index');

        Route::get('/users/show/{user}', 'show')->name('show');

        Route::get('/users/edit/{user}', 'edit')->name('edit');

        Route::put('/users/update/{user}', 'update')->name('update');

        Route::delete('/users/delete/{user}', 'destroy')->name('delete');

    });



Route::controller(CourseController::class)
    ->prefix('admin')
    ->middleware('auth')
    ->name('admin.courses.')
    ->group(function () {

        Route::get('/courses', 'index')->name('index');

        Route::get('/courses/create', 'create')->name('create');

        Route::post('/courses', 'store')->name('store');

        Route::delete('/courses/delete/{course}', 'destroy')->name('delete');

    });
