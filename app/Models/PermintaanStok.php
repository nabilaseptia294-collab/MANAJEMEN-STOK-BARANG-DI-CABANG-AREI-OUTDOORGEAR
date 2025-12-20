<?php
// app/Models/PermintaanStok.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanStok extends Model
{
    use HasFactory;
    
    protected $table = 'permintaan_stok';
    protected $primaryKey = 'id_permintaan_stok';
    
    protected $fillable = ['id_admin', 'cabang', 'tanggal_permintaan', 'status', 'alasan']; 

    // Relasi ke Admin/User
    public function admin() {
        // Ganti 'User::class' jika Model Admin Anda bernama lain
        return $this->belongsTo(User::class, 'id_admin');
    }

    // Relasi ke DetailPermintaan (One-to-Many)
    public function details() {
        return $this->hasMany(DetailPermintaan::class, 'id_permintaan_stok');
    }
}