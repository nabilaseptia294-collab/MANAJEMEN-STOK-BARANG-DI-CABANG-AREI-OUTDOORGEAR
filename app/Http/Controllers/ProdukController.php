<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // LIST PRODUK
  public function index()
    {
    $produks = Produk::with('admin')->latest()->get();
    return view('produk.index', compact('produks'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('produk.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'satuan'      => 'required',
            'harga'       => 'required',
        ]);

        Produk::create([
            'id_admin'    => 1, // sementara biar aman
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga,
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }
}
