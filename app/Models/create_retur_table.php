<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'retur';

    protected $primaryKey = 'id_retur';

    protected $fillable = [
        'id_admin',
        'jumlah_retur',
        'tanggal_retur',
        'alasan_retur'
    ];
}