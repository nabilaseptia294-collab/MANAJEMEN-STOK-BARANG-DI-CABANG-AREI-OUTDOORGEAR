<?php

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
        // Ambil semua permintaan beserta admin dan detail produknya (urut dari terbaru)
        $permintaans = PermintaanStok::with('admin', 'details.produk')
            ->orderBy('created_at', 'desc') 
            ->get();

        // Kirim ke view index
        return view('permintaan.index', compact('permintaans'));
    }

    // Tampilkan form tambah permintaan baru
    public function create()
    {
        
        $daftar_cabang = ['Cabang Purwokerto', 'Cabang Jakarta', 'Cabang Bandung', 'Cabang Surabaya'];
        // Ambil semua produk
        $produks = Produk::all();

        // Kirim ke view create
        return view('permintaan.create', compact('daftar_cabang', 'produks'));
    }

    // Simpan permintaan baru
    public function store(Request $request)
    {
        // Validasi input
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
            // Simpan permintaan utama
            $permintaan = PermintaanStok::create([
                'id_admin' => Auth::id(), // user yang login
                'cabang' => $request->cabang,
                'tanggal_permintaan' => $request->tanggal_permintaan,
                'status' => 'pending', // default pending
                'alasan' => $request->alasan
            ]);

            // Simpan detail produk
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

        // Redirect ke detail permintaan
        return redirect()->route('permintaan.show', $permintaan)
            ->with('success', 'Permintaan stok berhasil diajukan');
    }

    // Menampilkan detail
    public function show(PermintaanStok $permintaan)
    {
        
        $permintaan->load('admin', 'details.produk');
        return view('permintaan.show', compact('permintaan'));
    }

    // menampilkan form edit permintaan
    public function edit(PermintaanStok $permintaan)
    {
        // Hanya bisa edit jika status pending
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa diedit');

        $produks = Produk::all();
        $daftar_cabang = ['Cabang Purwokerto', 'Cabang Jakarta', 'Cabang Bandung', 'Cabang Surabaya'];
        return view('permintaan.edit', compact('permintaan', 'produks', 'daftar_cabang'));
    }

    // Update permintaan
    public function update(Request $request, PermintaanStok $permintaan)
    {
        // Hanya pending yang bisa update
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa diperbarui');

        // Validasi input
        $request->validate([
            'cabang' => 'required|string|max:100',
            'alasan' => 'nullable|string'
        ]);

        // Update permintaan
        $permintaan->update([
            'cabang' => $request->cabang,
            'alasan' => $request->alasan
        ]);

        return redirect()->route('permintaan.show', $permintaan)
            ->with('success', 'Permintaan berhasil diperbarui');
    }

    
    public function destroy(PermintaanStok $permintaan)
    {
        // Hanya pending yang bisa dihapus
        if ($permintaan->status !== 'pending') abort(403, 'Permintaan tidak bisa dihapus');

        // Transaction untuk konsistensi
        DB::transaction(function () use ($permintaan) {
            $permintaan->details()->delete(); // hapus detail dulu
            $permintaan->delete(); // hapus permintaan utama
        });

        return redirect()->route('permintaan.index')
            ->with('success', 'Permintaan berhasil dihapus');
    }
}
