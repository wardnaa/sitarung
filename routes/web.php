<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/selayang-pandang', [IndexController::class, 'tentang']);
Route::get('/panduan', [IndexController::class, 'panduan']);
Route::get('/kontak', [IndexController::class, 'kontak']);
Route::get('/kecamatan/{id}', [IndexController::class, 'kecamatan']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
