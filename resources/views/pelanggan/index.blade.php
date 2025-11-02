@extends('layouts.main')

@section('title', 'Kelola Data Pelanggan')

@section('content')
<div class="card p-4">
    <h3 class="text-center text-primary mb-4 fw-bold">🧾 Kelola Data Pelanggan</h3>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

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
            <tr>
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
                    <td>{{ $index + 1 }}</td>
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
