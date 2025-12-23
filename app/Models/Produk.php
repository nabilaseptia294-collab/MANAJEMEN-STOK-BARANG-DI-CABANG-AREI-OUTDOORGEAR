<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'produks';
=======
    protected $table = 'products';
>>>>>>> 84189c8 (Update model dan blade penerimaan)
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_user',
        'nama_produk',
        'kategori',
        'satuan',
        'harga',
        'sku',
        'status',
        'gambar'
    ];
}
