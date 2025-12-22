<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;

// Menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest'); // Hanya untuk user yang belum login

// Submit login
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit')
    ->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth'); 

// halaman pertama ke login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Produk (hanya bisa diakses user login)
Route::resource('produk', ProdukController::class)
    ->middleware('auth');

// Permintaan Stok (hanya bisa diakses user login)
Route::resource('permintaan', PermintaanStokController::class)
    ->middleware('auth');
