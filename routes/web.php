<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/produk');
});

/* DASHBOARD DUMMY (BIAR GA ERROR) */
Route::get('/dashboard', function () {
    return redirect('/produk');
})->name('dashboard');

/* PRODUK */
Route::resource('produk', ProdukController::class);

/* PERMINTAAN STOK */
Route::resource('permintaan-stok', PermintaanStokController::class);
