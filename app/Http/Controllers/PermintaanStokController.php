<?php
// app/Http/Controllers/PermintaanStokController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermintaanStok;
use App\Models\DetailPermintaan;
use App\Models\Produk;
use App\Models\User; // Asumsi Model Admin Anda adalah User

class PermintaanStokController extends Controller
{
    // READ (Daftar)
    public function index()
    {
        $permintaans = PermintaanStok::with('admin', 'details.produk')->get();
        return view('permintaan.index', compact('permintaans'));
    }

    // CREATE (Tampilkan Form)
    public function create()
    {
        $daftar_cabang = ['Cabang Purwokerto', 'Cabang Jakarta', 'Cabang Bandung', 'Cabang Surabaya']; 
        $produks = Produk::all(); 

        return view('permintaan.create', compact('daftar_cabang', 'produks'));
    }

    // STORE (Proses Penyimpanan)
    public function store(Request $request)
    {
        // Pastikan validasi merujuk ke tabel 'produk'
        $request->validate([
            'cabang'             => 'required|string|max:100', 
            'tanggal_permintaan' => 'required|date',
            'alasan'             => 'nullable|string',
            'produk.*'           => 'required|exists:produk,id_produk', // <-- CEK: 'produk'
            'qty.*'              => 'required|integer|min:1'
        ]);

        // 1. Simpan Data Header Permintaan (PermintaanStok)
        $permintaan = PermintaanStok::create([
            'id_admin'           => 1, // <-- Pastikan ini ada dan bukan null
            'cabang'             => $request->cabang, 
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'status'             => 'pending',
            'alasan'             => $request->alasan,
        ]);

        // 2. Simpan Data Detail Produk (DetailPermintaan)
        if (isset($request->produk) && is_array($request->produk)) {
            foreach($request->produk as $i => $produkId) {
                if (isset($request->qty[$i]) && $request->qty[$i] >= 1) {
                    DetailPermintaan::create([
                        'id_permintaan_stok' => $permintaan->id_permintaan_stok,
                        'id_produk'          => $produkId,
                        'qty'                => $request->qty[$i]
                    ]);
                }
            }
        }
        
        return redirect()->route('permintaan.show', $permintaan->id_permintaan_stok)
                         ->with('success', 'Permintaan stok berhasil diajukan.');
    }

    // READ (Tampilkan Detail)
    public function show(PermintaanStok $permintaan)
    {
        $permintaan->load('admin', 'details.produk');
        return view('permintaan.show', compact('permintaan'));
    }
}