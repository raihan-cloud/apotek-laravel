<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pelanggan::select('id_pelanggan', 'nama', 'alamat', 'no_hp')->get();
    }

    public function headings(): array
    {
        return ['ID Pelanggan', 'Nama Lengkap', 'Alamat', 'Nomor HP'];
    }
}
