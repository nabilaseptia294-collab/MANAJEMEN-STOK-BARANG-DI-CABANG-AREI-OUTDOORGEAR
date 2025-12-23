<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        $retur = Retur::all();
        return view('retur.index', compact('retur'));
    }

    public function create()
    {
        return view('retur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'nullable',
            'jumlah_retur'  => 'required',
            'satuan'        => 'nullable',
            'tanggal_retur' => 'required',
            'alasan_retur'  => 'required'
        ]);

        // Ambil ID terakhir berdasarkan id_retur
        $last = Retur::orderBy('id_retur', 'desc')->first();
        $next = $last ? $last->id_retur + 1 : 1;

        // Generate kode retur
        $kode = 'RTR-' . date('Ymd') . '-' . str_pad($next, 3, '0', STR_PAD_LEFT);

        Retur::create([
            'id_admin'      => auth()->id(),
            'sku'           => $kode,
            'nama_barang'   => $request->nama_barang,
            'jumlah_retur'  => $request->jumlah_retur,
            'satuan'        => $request->satuan,
            'tanggal_retur' => $request->tanggal_retur,
            'alasan_retur'  => $request->alasan_retur,
        ]);

        return redirect()->route('retur.index')
            ->with('success', 'Data retur berhasil ditambahkan!');
    }
}
