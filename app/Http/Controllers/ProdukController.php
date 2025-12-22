<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Wajib import ini buat hapus gambar

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('nama_produk', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('sku', 'LIKE', '%' . $request->search . '%');
            });

        }
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $produks = $query->latest()->get();

        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'sku'         => 'nullable',
            'kategori'    => 'required',
            'satuan'      => 'required',
            'harga'       => 'required|numeric',
            'status'      => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Max 2MB
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        }

        Produk::create([
            'id_admin'    => 1, 
            'nama_produk' => $request->nama_produk,
            'sku'         => $request->sku,
            'kategori'    => $request->kategori,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga,
            'status'      => $request->status,
            'gambar'      => $gambarPath,
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'sku'         => 'nullable',
            'kategori'    => 'required',
            'satuan'      => 'required',
            'harga'       => 'required|numeric',
            'status'      => 'required',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
                Storage::delete('public/' . $produk->gambar);
            }
            $gambarPath = $request->file('gambar')->store('produk_images', 'public');
        } else {
            $gambarPath = $produk->gambar;
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'sku'         => $request->sku,
            'kategori'    => $request->kategori,
            'satuan'      => $request->satuan,
            'harga'       => $request->harga,
            'status'      => $request->status,
            'gambar'      => $gambarPath
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil diperbarui');
    }
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
            Storage::delete('public/' . $produk->gambar);
        }
        $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
}