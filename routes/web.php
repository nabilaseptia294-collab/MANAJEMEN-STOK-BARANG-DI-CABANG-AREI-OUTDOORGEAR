<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PermintaanStokController;

Route::get('/', function () {
    return redirect('/produk');
});

Route::resource('produk', ProdukController::class);
Route::resource('permintaan-stok', PermintaanStokController::class);
