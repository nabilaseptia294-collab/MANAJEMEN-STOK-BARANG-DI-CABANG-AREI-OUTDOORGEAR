<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class permintaan_stok extends Model
{
    use HasFactory;

    protected $table = 'permintaan_stok';

    protected $primaryKey = 'id_permintaan';

    protected $fillable = [
        'tanggal_permintaan',
        'status',
        'alasan'
    ];
}