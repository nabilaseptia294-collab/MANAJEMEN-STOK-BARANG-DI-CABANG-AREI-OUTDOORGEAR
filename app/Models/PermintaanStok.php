<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanStok extends Model
{
    use HasFactory;

    protected $table = 'permintaan_stok'; // <-- sesuaikan dengan nama tabel di DB

    protected $fillable = ['id_admin','cabang','tanggal_permintaan','status','alasan'];

    public function details()
    {
        return $this->hasMany(DetailPermintaan::class, 'id_permintaan_stok');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
