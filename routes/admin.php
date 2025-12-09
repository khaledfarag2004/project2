<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;




Route::controller(UserController::class)
    ->prefix('admin' )
    ->name('admin.')
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/users', 'users')->name('user');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::PUT('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

Route::controller(CourseController::class)
    ->prefix('admin')
    ->name('course.')
    ->group(function () {
        Route::get('/courses', 'index')->name('index');
        Route::get('/courses/create', 'create')->name('create');
        Route::post('/courses', 'store')->name('store');
        Route::delete('/courses/delete/{id}', 'destroy')->name('delete');
    });




