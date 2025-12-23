<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stok = Stok::with('produk')->get();
        return view('stok.index', compact('stok'));
    }

    public function show($id)
    {
        $stok = Stok::with('produk')->where('id_produk', $id)->firstOrFail();
        return view('stok.show', compact('stok'));
    }
}