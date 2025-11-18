<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'barang_masuk';

    protected $primaryKey = 'id_masuk';

    protected $fillable = [
        'tanggal_masuk',
        'jumlah_masuk',
    ];

}