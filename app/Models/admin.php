<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'nama',
        'username',
        'password'
    ];
}
