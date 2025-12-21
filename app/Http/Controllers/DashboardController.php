<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Kalau mau tampilkan jumlah produk
use App\Models\PermintaanStok; // Kalau mau tampilkan jumlah permintaan stok

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh data sederhana untuk dashboard
        $data = [
            'title' => 'Dashboard',
            'totalProduk' => Produk::count(),
            'totalPermintaan' => PermintaanStok::count(),
        ];

        return view('dashboard', $data);
    }
}
