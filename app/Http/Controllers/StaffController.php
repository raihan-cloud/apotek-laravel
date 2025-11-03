<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Exports\StaffExport;
use App\Imports\StaffImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Menampilkan daftar staff.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    /**
     * Menampilkan form tambah staff.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Menyimpan data staff baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        Staff::create($request->only([
            'nama',
            'alamat',
            'tanggal_lahir',
            'tempat_lahir',
            'no_hp',
        ]));

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil disimpan');
    }

    /**
     * Menampilkan detail staff.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Menampilkan form edit staff.
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update data staff.
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
        ]);

        $staff->update($request->only([
            'nama',
            'alamat',
            'tanggal_lahir',
            'tempat_lahir',
            'no_hp',
        ]));

        return redirect()->route('staff.index')->with('success', 'Data staff berhasil diperbarui');
    }

    /**
     * Hapus data staff.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Data staff berhasil dihapus');
    }

    public function export()
{
    return Excel::download(new StaffExport, 'data-staf.xlsx');
}

public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new StaffImport, $request->file('file'));

    return redirect()->back()->with('success', 'Data staf berhasil diimport!');
}
}
