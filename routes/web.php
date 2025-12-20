<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermintaanStokController;
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/', function() {
    return redirect()->route('permintaan.index');
});


Route::resource('permintaan', PermintaanStokController::class);


Route::patch('permintaan/{permintaan}/status', [PermintaanStokController::class, 'updateStatus'])
    ->name('permintaan.updateStatus');
});

// Redirect setelah login
Route::get('/', function () {
    return redirect()->route('dashboard');
});