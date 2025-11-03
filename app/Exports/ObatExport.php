<?php

namespace App\Exports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ObatExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Obat::select('kode_obat', 'nama_obat', 'stock_obat', 'tanggal_kadaluarsa')->get();
    }

    public function headings(): array
    {
        return [
            'Kode Obat',
            'Nama Obat',
            'Stok',
            'Tanggal Kadaluarsa'
        ];
    }
}
