<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::with('produk')->get();

        return view('stok.index', compact('stok'));
    }
}