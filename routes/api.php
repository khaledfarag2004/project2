<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\CourseApiController;
use App\Http\Controllers\Api\Admin\UserApiController;
use App\Http\Controllers\Api\Client\HomeApiController;
use App\Http\Controllers\Api\Client\ClientCourseApiController;

Route::apiResource('courses', CourseApiController::class);
Route::apiResource('users', UserApiController::class);

Route::prefix('client')->group(function () {

    Route::get('/courses', [ClientCourseApiController::class, 'index']);
    Route::post('/courses', [ClientCourseApiController::class, 'store']);
    Route::get('/courses/{id}', [ClientCourseApiController::class, 'show']);
    Route::delete('/courses/{id}', [ClientCourseApiController::class, 'destroy']);

    Route::get('/home', [HomeApiController::class, 'index']);
    Route::post('/login', [HomeApiController::class, 'login']);
    Route::post('/register', [HomeApiController::class, 'register']);
    Route::post('/logout', [HomeApiController::class, 'logout']);
    Route::get('/profile', [HomeApiController::class, 'show']);
    Route::put('/profile', [HomeApiController::class, 'update']);
    Route::delete('/profile', [HomeApiController::class, 'destroy']);
});
