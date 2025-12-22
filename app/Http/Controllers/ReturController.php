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
        Retur::create([
            'id_admin' => auth()->id(),
            'jumlah_retur' => $request->jumlah_retur,
            'tanggal_retur' => $request->tanggal_retur,
            'alasan_retur' => $request->alasan_retur,
        ]);

        return redirect()->route('retur.index');
    }
}