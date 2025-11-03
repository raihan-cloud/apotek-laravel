<?php

namespace App\Http\Controllers;

use App\Exports\ObatExport;
use App\Imports\ObatImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Menampilkan daftar obat.
     */
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    /**
     * Menampilkan form tambah obat.
     * (Tidak digunakan, karena form sudah di halaman index)
     */
    public function create()
    {
        return redirect()->route('obat.index');
    }

    /**
     * Menyimpan data obat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|string|max:50|unique:obats,kode_obat',
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Obat::create($request->only('kode_obat', 'nama_obat', 'stock_obat', 'tanggal_kadaluarsa'));

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil disimpan');
    }

    /**
     * Menampilkan form edit obat.
     */
    public function edit($id_obat)
    {
        $obat = Obat::findOrFail($id_obat);
        return redirect()->route('obat.index')->with('edit_obat', $obat);
    }

    /**
     * Update data obat.
     */
    public function update(Request $request, $id_obat)
    {
        $obat = Obat::findOrFail($id_obat);

        $request->validate([
            'kode_obat' => 'required|string|max:50|unique:obats,kode_obat,' . $obat->id_obat . ',id_obat',
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $obat->update($request->only('kode_obat', 'nama_obat', 'stock_obat', 'tanggal_kadaluarsa'));

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui');
    }

    /**
     * Hapus data obat.
     */
    public function destroy($id_obat)
    {
        $obat = Obat::findOrFail($id_obat);
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }

    /**
     * Export data obat ke file Excel.
     */
    public function export()
    {
        return Excel::download(new ObatExport, 'data-obat.xlsx');
    }

    /**
     * Import data obat dari file Excel.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        Excel::import(new ObatImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data obat berhasil diimport!');
    }
}
