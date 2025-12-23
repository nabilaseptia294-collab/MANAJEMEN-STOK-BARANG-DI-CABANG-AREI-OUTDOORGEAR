<?php
// app/Models/DetailPermintaan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    use HasFactory; 

    // Nama tabel di database
    protected $table = 'detail_permintaan';

    // Kolom yang bisa diisi 
    protected $fillable = ['id_permintaan_stok', 'id_produk', 'qty']; 

    // Relasi ke PermintaanStok
    // Many-to-One: banyak detail dimiliki oleh satu permintaan
    public function permintaan() {
        return $this->belongsTo(PermintaanStok::class, 'id_permintaan_stok');
    }
    
    // Relasi ke Produk
    // Many-to-One: satu detail dimiliki oleh satu produk
    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
