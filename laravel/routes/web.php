<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('form/login');
});
Route::post('/',[FormController::class,'form']);

Route::get('/register', function () {
    return view(view: 'form/register');
});
Route::post('/register',[FormController::class,'form']);
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('/dashboard', function () {
    return view('index');
});

