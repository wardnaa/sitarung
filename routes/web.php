<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::middleware(['visitor'])->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/selayang-pandang', [IndexController::class, 'tentang']);
    Route::get('/panduan', [IndexController::class, 'panduan']);
    Route::get('/kontak', [IndexController::class, 'kontak']);
    Route::get('/kecamatan/{id}', [IndexController::class, 'kecamatan']);
    Route::get('/kabupaten/{id}', [App\Http\Controllers\KabupatenController::class, 'showApi']);
    Route::get('/polaruang/{id}', [App\Http\Controllers\PolaRuangController::class, 'showApi']);
// });

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/kabupaten', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/kabupaten', App\Http\Controllers\KabupatenController::class);
Route::resource('admin/polaruang', App\Http\Controllers\PolaRuangController::class);
Route::resource('admin/pengguna', App\Http\Controllers\PenggunaController::class);
Route::resource('admin/disclaimer', App\Http\Controllers\DisclaimerController::class);

