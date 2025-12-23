<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_penerimaan extends Model
{
    protected $table = 'detail_penerimaan';

    protected $primaryKey = 'id_detail_penerimaan';

    protected $fillable = [
        'id_penerimaan',
        'id_produk',
        'sku',
        'jumlah_surat_jalan',
        'jumlah_diterima',
        'kondisi',
    ];

    public function penerimaan()
    {
        return $this->belongsTo(penerimaan_barang::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
