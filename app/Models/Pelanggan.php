<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $primaryKey = 'id_pelanggan'; // sesuaikan dengan database
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
    ];
}
