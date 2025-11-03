<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cek duplikat berdasarkan nama
        if (Pelanggan::where('nama', $row['nama_lengkap'])->exists()) {
            return null; // lewati baris ini jika sudah ada
        }

        return new Pelanggan([
            // id_pelanggan auto increment, jadi tidak perlu diisi
            'nama' => $row['nama_lengkap'],
            'alamat' => $row['alamat'],
            'no_hp' => $row['nomor_hp'],
        ]);
    }
}
