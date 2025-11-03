<?php

namespace App\Exports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Staff::select('nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'no_hp')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Alamat', 'Tempat Lahir', 'Tanggal Lahir', 'No HP'];
    }
}
