<?php
// app/Models/DetailPermintaan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    use HasFactory;
    
    protected $table = 'detail_permintaan';
    protected $fillable = ['id_permintaan_stok', 'id_produk', 'qty']; 

    // Relasi ke Permintaan (Many-to-One)
    public function permintaan() {
        return $this->belongsTo(PermintaanStok::class, 'id_permintaan_stok');
    }
    
    // Relasi ke Produk
    public function produk() {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}