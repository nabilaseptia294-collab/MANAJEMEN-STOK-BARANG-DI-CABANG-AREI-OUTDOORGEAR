<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $table = 'retur';
    protected $primaryKey = 'id_retur';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_admin',
        'nama_barang',
        'jumlah_retur',
        'satuan',
        'tanggal_retur',
        'alasan_retur',
        'sku'
    ];
}
