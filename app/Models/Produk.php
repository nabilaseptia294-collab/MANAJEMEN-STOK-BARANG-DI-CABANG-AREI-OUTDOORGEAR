<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'produki';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'satuan',
        'harga'
    ];
}
