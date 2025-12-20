<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanStokController;

// Routes yang membutuhkan login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Resource Permintaan
    Route::resource('permintaan', PermintaanStokController::class);

    // Route khusus update status
    Route::patch('permintaan/{permintaan}/status', [PermintaanStokController::class, 'updateStatus'])
        ->name('permintaan.updateStatus');

    // Root ketika sudah login → redirect ke permintaan.index
    Route::get('/', function() {
        return redirect()->route('permintaan.index');
    });
});

// Jika belum login, bisa redirect ke login
Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
