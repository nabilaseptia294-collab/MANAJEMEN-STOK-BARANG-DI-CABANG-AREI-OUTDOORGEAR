<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class StokController extends Controller
{
    public function index()
    {
        $produk = Produk::select('id', 'nama_produk', 'stok')->orderBy('nama_produk')->get();

        return view('stok.index', compact('produk'));
    }
}