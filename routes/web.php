<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;
// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route default → redirect ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard hanya untuk user login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Resource route untuk produk (pakai auth)
Route::resource('produk', ProdukController::class)->middleware('auth');

// Resource route untuk permintaan stok (pakai auth)
Route::resource('permintaan-stok', PermintaanStokController::class)->middleware('auth');

// Optional: route manual untuk permintaan stok (pakai auth)
Route::prefix('permintaan')->middleware('auth')->group(function () {
    Route::get('/', [PermintaanStokController::class, 'index'])->name('permintaan.index');
    Route::get('/create', [PermintaanStokController::class, 'create'])->name('permintaan.create');
    Route::post('/store', [PermintaanStokController::class, 'store'])->name('permintaan.store');
    Route::get('/{permintaan}', [PermintaanStokController::class, 'show'])->name('permintaan.show');
});