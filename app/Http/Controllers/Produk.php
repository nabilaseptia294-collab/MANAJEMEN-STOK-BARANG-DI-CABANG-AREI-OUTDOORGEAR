<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('produk.index', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'satuan'      => 'required',
            'harga'       => 'required|numeric',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga,
        ]);

        return redirect()->route('produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}