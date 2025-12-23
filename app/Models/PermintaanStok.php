<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanStok extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'permintaan_stok'; 

    // Kolom yang bisa diisi massal
    protected $fillable = ['id_admin','cabang','tanggal_permintaan','status','alasan'];

    // Relasi ke detail permintaan (one-to-many)
    public function details()
    {
        // Satu permintaan bisa punya banyak produk
        return $this->hasMany(DetailPermintaan::class, 'id_permintaan_stok');
    }

    // Relasi ke admin   yang membuat permintaan
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
