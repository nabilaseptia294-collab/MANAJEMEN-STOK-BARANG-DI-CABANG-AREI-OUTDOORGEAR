<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan_barang extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_barang';

    protected $primaryKey = 'id_penerimaan';

    protected $fillable = [
        'no_penerimaan',
        'no_surat_jalan',
        'id_admin',
        'id_produk',
        'tanggal_terima',
        'catatan',
        'status',
    ];

    // untuk relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    // untuk relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }

    public function detail()
    {
        return $this->hasMany(detail_penerimaan::class,
        'id_penerimaan','id_penerimaan');
    }
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan_barang extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_barang';

    protected $primaryKey = 'id_penerimaan';

    protected $fillable = [
        'no_penerimaan',
        'no_surat_jalan',
        'id_user',
        'id_produk',
        'tanggal_terima',
        'catatan',
        'status',
    ];

    // untuk relasi ke model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    // untuk relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produk', 'id_produk');
    }

    public function detail()
    {
        return $this->hasMany(detail_penerimaan::class,
        'id_penerimaan','id_penerimaan');
    }
>>>>>>> 84189c8 (Update model dan blade penerimaan)
}