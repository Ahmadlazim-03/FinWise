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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendapatan&keuangan', [App\Http\Controllers\PendapatanController::class, 'index']);
Route::get('/rekening&saldo', [App\Http\Controllers\RekeningController::class, 'index']);
Route::get('/analisiskeuangan', [App\Http\Controllers\AnalisisKeuanganController::class, 'index']);
Route::get('/informasipenganggaran', [App\Http\Controllers\InformasiPenganggaranController::class, 'index']);
Route::get('/tabungan&investasi', [App\Http\Controllers\TabunganController::class, 'index']);
Route::get('/hutang&pinjaman', [App\Http\Controllers\HutangController::class, 'index']);
Route::get('/exportdata', [App\Http\Controllers\ExportController::class, 'index']);
Route::get('/chatbot', [App\Http\Controllers\ChatbotController::class, 'index']);
Route::get('/beritadonasi', [App\Http\Controllers\BeritadonasiController::class, 'index']);
