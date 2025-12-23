<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;
use App\Http\Controllers\ReturController;

// Route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Menampilkan halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest'); // Hanya untuk user yang belum login

// Submit login
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit')
    ->middleware('guest');

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

// Resource route untuk permintaan stok (pakai auth)
Route::resource('permintaan-stok', PermintaanStokController::class)->middleware('auth');

// Resource route untuk retur (pakai auth)
Route::prefix('retur')->middleware('auth')->group(function () {
    Route::get('/retur', [ReturController::class, 'index'])->name('retur.index');
    Route::get('/retur/create', [ReturController::class, 'create'])->name('retur.create');
    Route::post('/retur', [ReturController::class, 'store'])->name('retur.store');
    Route::get('/retur/{id}/edit', [ReturController::class, 'edit'])->name('retur.edit');
    Route::put('/retur/{id}', [ReturController::class, 'update'])->name('retur.update');
    Route::delete('/retur/{id}', [ReturController::class, 'destroy'])->name('retur.destroy');
    });

// Optional: route manual untuk permintaan stok (pakai auth)
Route::prefix('permintaan')->middleware('auth')->group(function () {
    Route::get('/', [PermintaanStokController::class, 'index'])->name('permintaan.index');
    Route::get('/create', [PermintaanStokController::class, 'create'])->name('permintaan.create');
    Route::post('/store', [PermintaanStokController::class, 'store'])->name('permintaan.store');
    Route::get('/{permintaan}', [PermintaanStokController::class, 'show'])->name('permintaan.show');
});

// Permintaan Stok (hanya bisa diakses user login)
Route::resource('permintaan', PermintaanStokController::class)
    ->middleware('auth');
