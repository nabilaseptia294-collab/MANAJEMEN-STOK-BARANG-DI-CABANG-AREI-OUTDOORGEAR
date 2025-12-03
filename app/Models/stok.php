<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'stok';

    protected $primaryKey = 'id_stok';

    protected $fillable = [
        'jumlah_masuk'
    ];
}

