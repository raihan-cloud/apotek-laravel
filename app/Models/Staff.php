<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; // pastikan ini nama tabel di database
    protected $primaryKey = 'id_staff'; 
    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'tempat_lahir',
        'no_hp',
    ];
}
