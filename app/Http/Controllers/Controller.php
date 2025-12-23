<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ReturController;

abstract class Controller
{

Route::controller(ReturController::class)->group(function () {
    // Route untuk menampilkan form edit dan proses update
    Route::get('/retur/{id}/edit', 'edit')->name('retur.edit');
    Route::put('/retur/{id}', 'update')->name('retur.update');
    
    // Route untuk proses hapus
    Route::delete('/retur/{id}', 'destroy')->name('retur.destroy');
});
}
