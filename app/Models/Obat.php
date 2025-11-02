<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika Laravel mengikuti konvensi, tapi lebih aman dicantumkan)
    protected $table = 'obats';

    // Primary key sesuai database
    protected $primaryKey = 'id_obat';

    // Jika primary key bukan auto-increment integer, ubah properti ini. Untuk bigint auto-increment tidak perlu diubah
    // public $incrementing = true;
    // protected $keyType = 'int';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stock_obat',
        'tanggal_kadaluarsa',
    ];
}
