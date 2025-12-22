<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect default ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard (hanya untuk user login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Resource route untuk produk (pakai auth)
Route::resource('produk', ProdukController::class)->middleware('auth');

// Resource route untuk permintaan stok (pakai auth)
Route::resource('permintaan', PermintaanStokController::class)->middleware('auth');
