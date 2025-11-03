<?php

namespace App\Imports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ObatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Ambil data dari Excel
        $kode_obat = $row['kode_obat'] ?? null;
        $nama_obat = $row['nama_obat'] ?? null;
        $stock_obat = $row['stock_obat'] ?? 0;
        $tanggal_kadaluarsa = $row['tanggal_kadaluarsa'] ?? null;

        // Jika kolom wajib kosong, skip baris ini
        if (!$nama_obat || !$kode_obat || !$tanggal_kadaluarsa) {
            return null;
        }

        return new Obat([
            'nama' => $nama_obat, // wajib diisi karena MySQL tidak boleh NULL
            'kode_obat' => $kode_obat,
            'nama_obat' => $nama_obat,
            'stock_obat' => (int) $stock_obat,
            'tanggal_kadaluarsa' => $this->parseTanggal($tanggal_kadaluarsa),
        ]);
    }

    private function parseTanggal($value)
    {
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d');
        }

        try {
            return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
        } catch (\Exception $e) {
            return null;
        }
    }
}
