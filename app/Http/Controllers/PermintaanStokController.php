<?php
// app/Http/Controllers/PermintaanStokController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanStok;
use App\Models\DetailPermintaan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermintaanStokController extends Controller
{
    public function index()
    {
        $permintaans = PermintaanStok::with('admin', 'details.produk')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('permintaan.index', compact('permintaans'));
    }

    public function create()
    {
        $daftar_cabang = ['Cabang Purwokerto', 'Cabang Jakarta', 'Cabang Bandung', 'Cabang Surabaya'];
        $produks = Produk::all();
        return view('permintaan.create', compact('daftar_cabang', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang' => 'required|string|max:100',
            'tanggal_permintaan' => 'required|date',
            'alasan' => 'nullable|string',
            'produk' => 'required|array|min:1',
            'produk.*' => 'required|exists:produk,id_produk',
            'qty' => 'required|array|min:1',
            'qty.*' => 'required|integer|min:1'
        ]);

        DB::transaction(function () use ($request, &$permintaan) {
            $permintaan = PermintaanStok::create([
                'id_admin' => Auth::id(),
                'cabang' => $request->cabang,
                'tanggal_permintaan' => $request->tanggal_permintaan,
                'status' => 'pending',
                'alasan' => $request->alasan
            ]);

            if (is_array($request->produk) && is_array($request->qty)) {
                foreach ($request->produk as $i => $produkId) {
                    DetailPermintaan::create([
                    'id_permintaan_stok' => $permintaan->id, 
                    'id_produk' => $produkId,
                    'qty' => $request->qty[$i] ?? 1
                ]);
                }
            }
        });

        return redirect()->route('permintaan.show', $permintaan)
            ->with('success', 'Permintaan stok berhasil diajukan');
    }

    public function show(PermintaanStok $permintaan)
    {

        $permintaan->load('admin', 'details.produk');
        return view('permintaan.show', compact('permintaan'));
    }

    public function edit(PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa diedit');
        $produks = Produk::all();
        $daftar_cabang = ['Cabang Purwokerto', 'Cabang Jakarta', 'Cabang Bandung', 'Cabang Surabaya'];
        return view('permintaan.edit', compact('permintaan', 'produks', 'daftar_cabang'));
    }

    public function update(Request $request, PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa diperbarui');

        $request->validate([
            'cabang' => 'required|string|max:100',
            'alasan' => 'nullable|string'
        ]);

        $permintaan->update([
            'cabang' => $request->cabang,
            'alasan' => $request->alasan
        ]);

        return redirect()->route('permintaan.show', $permintaan)
            ->with('success', 'Permintaan berhasil diperbarui');
    }

    public function destroy(PermintaanStok $permintaan)
    {
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa dihapus');

        DB::transaction(function () use ($permintaan) {
            $permintaan->details()->delete();
            $permintaan->delete();
        });

        return redirect()->route('permintaan.index')
            ->with('success', 'Permintaan berhasil dihapus');
    }
}
