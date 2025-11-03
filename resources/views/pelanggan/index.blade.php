@extends('layouts.main')

@section('title', 'Kelola Data Pelanggan')

@section('content')
<div class="card p-4 shadow-sm">
    <h3 class="text-center text-primary mb-4 fw-bold">🧾 Kelola Data Pelanggan</h3>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Import & Export --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- Tombol Import --}}
        <form action="{{ route('pelanggan.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
            @csrf
            <input type="file" name="file" accept=".xlsx,.xls,.csv" class="form-control form-control-sm" required>
            <button type="submit" class="btn btn-success btn-sm fw-semibold">
                ⬆️ Import Excel
            </button>
        </form>

        {{-- Tombol Export --}}
        <a href="{{ route('pelanggan.export') }}" class="btn btn-primary btn-sm fw-semibold">
            ⬇️ Export Excel
        </a>
    </div>

    {{-- Form Tambah Pelanggan --}}
    <form action="{{ route('pelanggan.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggan" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP aktif" required>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                💾 Simpan Data
            </button>
        </div>
    </form>

    <hr>

    {{-- Tabel Data Pelanggan --}}
    <h5 class="fw-bold mb-3 text-success">📋 Daftar Pelanggan</h5>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary">
            <tr class="text-center">
                <th style="width: 5%">No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th style="width: 15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $index => $pelanggan)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->no_hp }}</td>
                    <td class="text-center">
                        {{-- Edit --}}
                        <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}" class="btn btn-warning btn-sm">✏️ Edit</a>

                        {{-- Hapus --}}
                        <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                                🗑️ Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data pelanggan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
