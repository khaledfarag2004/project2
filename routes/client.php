<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\CourseController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/profile', [HomeController::class, 'show'])->name('profile');
Route::delete('/profile/delete', [HomeController::class, 'destroy'])->name('profile.delete');
Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [HomeController::class, 'update'])->name('profile.update');


Route::get('/create/courses', [CourseController::class, 'courses'])->name('create.courses');
Route::post('/create/courses', [CourseController::class, 'createCourse'])->name('create.courses');
Route::get('/profile/{id}', [CourseController::class, 'show'])->name('profile.show');
Route::delete('/Post/{id}/delete', [CourseController::class, 'destroy'])->name('Post.delete');


