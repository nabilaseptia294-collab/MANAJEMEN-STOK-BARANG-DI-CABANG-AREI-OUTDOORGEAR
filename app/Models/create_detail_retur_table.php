<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'detail_retur';

    protected $primaryKey = 'id_detail_retur';

    protected $fillable = [
        'id_retur',
        'id_produk',
        'status',
        'alasan_retur'
    ];
}