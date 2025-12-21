<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produks';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_admin',
        'nama_produk',
        'kategori',
        'satuan',
        'harga',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
