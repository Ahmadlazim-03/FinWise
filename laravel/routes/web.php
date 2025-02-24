<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;


Route::view('/', 'form/login');
Route::view('/register', 'form/register');
Route::controller(FormController::class)->group(function () {
    Route::post('/', 'form');
    Route::post('/register', 'form');
    Route::get('/logout', 'logout');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle');
    Route::get('/auth/google/callback', 'handleGoogleCallback');
});


Route::get('/dashboard', function () {
    return view('menus/dashboard');
});

