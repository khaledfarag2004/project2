<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;


Route::get('/login', [HomeController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [HomeController::class, 'login'])->name('client.login.submit');

Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('client.register');
Route::post('/register', [HomeController::class, 'register'])->name('client.register.submit');



