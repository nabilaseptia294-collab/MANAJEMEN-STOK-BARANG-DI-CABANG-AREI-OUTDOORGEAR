<?php
// app/Http/Controllers/PermintaanStokController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanStok;
use App\Models\DetailPermintaan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class PermintaanStokController extends Controller
{
    /**
     * READ - Daftar permintaan
     */
    public function index()
    {
        $permintaans = PermintaanStok::with('admin', 'details.produk')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('permintaan.index', compact('permintaans'));
    }

    /**
     * CREATE - Form tambah permintaan
     */
    public function create()
    {
        $daftar_cabang = [
            'Cabang Purwokerto',
            'Cabang Jakarta',
            'Cabang Bandung',
            'Cabang Surabaya'
        ];

        $produks = Produk::all();

        return view('permintaan.create', compact('daftar_cabang', 'produks'));
    }

    /**
     * STORE - Simpan permintaan
     */
    public function store(Request $request)
    {
        $request->validate([
            'cabang'             => 'required|string|max:100',
            'tanggal_permintaan' => 'required|date',
            'alasan'             => 'nullable|string',
            'produk.*'           => 'required|exists:produk,id_produk',
            'qty.*'              => 'required|integer|min:1'
        ]);

        // 1. Simpan header permintaan
        $permintaan = PermintaanStok::create([
            'id_admin'           => Auth::id(), // pakai user login
            'cabang'             => $request->cabang,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'status'             => 'pending',
            'alasan'             => $request->alasan,
        ]);

        // 2. Simpan detail barang
        foreach ($request->produk as $i => $produkId) {
            DetailPermintaan::create([
                'id_permintaan_stok' => $permintaan->id_permintaan_stok,
                'id_produk'          => $produkId,
                'qty'                => $request->qty[$i]
            ]);
        }

        return redirect()
            ->route('permintaan.show', $permintaan->id_permintaan_stok)
            ->with('success', 'Permintaan stok berhasil diajukan');
    }

    /**
     * READ - Detail permintaan
     */
    public function show(PermintaanStok $permintaan)
    {
        $permintaan->load('admin', 'details.produk');

        return view('permintaan.show', compact('permintaan'));
    }

    /**
     * EDIT - hanya jika status pending
     */
    public function edit(PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') {
            abort(403, 'Permintaan tidak bisa diedit');
        }

        $produks = Produk::all();

        return view('permintaan.edit', compact('permintaan', 'produks'));
    }

    /**
     * UPDATE - hanya jika status pending
     */
    public function update(Request $request, PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') {
            abort(403);
        }

        $request->validate([
            'cabang' => 'required|string|max:100',
            'alasan' => 'nullable|string'
        ]);

        $permintaan->update([
            'cabang' => $request->cabang,
            'alasan' => $request->alasan,
        ]);

        return redirect()
            ->route('permintaan.show', $permintaan->id_permintaan_stok)
            ->with('success', 'Permintaan berhasil diperbarui');
    }

    /**
     * DELETE - hanya jika status pending
     */
    public function destroy(PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') {
            abort(403, 'Permintaan tidak bisa dihapus');
        }

        // hapus detail dulu
        $permintaan->details()->delete();
        $permintaan->delete();

        return redirect()
            ->route('permintaan.index')
            ->with('success', 'Permintaan berhasil dihapus');
    }
}
