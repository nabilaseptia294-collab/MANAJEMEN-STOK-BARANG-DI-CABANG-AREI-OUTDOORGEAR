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
            'jumlah_retur'  => 'required|numeric',
            'satuan'        => 'nullable',
            'tanggal_retur' => 'required|date',
            'alasan_retur'  => 'required'
        ]);

        $last = Retur::orderBy('id_retur', 'desc')->first();
        $next = $last ? $last->id_retur + 1 : 1;
        $kode = 'RTR-' . date('Ymd') . '-' . str_pad($next, 3, '0', STR_PAD_LEFT);

        Retur::create([
            'id_user'      => auth()->id(),
            'sku'           => $kode,
            'nama_barang'   => $request->nama_barang,
            'jumlah_retur'  => $request->jumlah_retur,
            'satuan'        => $request->satuan,
            'tanggal_retur' => $request->tanggal_retur,
            'alasan_retur'  => $request->alasan_retur,
        ]);

        return redirect()->route('retur.index')->with('success', 'Data retur berhasil ditambahkan!');
    }

    public function edit($id) {
    $retur = Retur::findOrFail($id);
    return view('retur.edit', compact('retur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alasan_retur' => 'required',
            'jumlah_retur' => 'required|numeric',
        ]);

        $retur = Retur::findOrFail($id);
        $retur->update([
            'alasan_retur' => $request->alasan_retur,
            'jumlah_retur' => $request->jumlah_retur,
        ]);

        return redirect()->route('retur.index')->with('success', 'Data retur berhasil diperbarui');
    }

    // INI FUNGSI YANG HILANG/ERROR TADI
    public function destroy($id)
    {
        $retur = Retur::findOrFail($id);
        $retur->delete();

        return redirect()->route('retur.index')->with('success', 'Data retur berhasil dihapus');
    }
}