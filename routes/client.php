<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\CourseController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('show');
    Route::get('/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/update', [HomeController::class, 'update'])->name('update');
    Route::delete('/delete', [HomeController::class, 'destroy'])->name('delete');
});

Route::resource('courses', CourseController::class, [
    'as' => 'client'
])->only(['create', 'store', 'show', 'destroy']);
