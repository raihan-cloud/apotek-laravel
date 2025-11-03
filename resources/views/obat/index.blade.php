@extends('layouts.main')

@section('title', 'Kelola Data Obat')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold text-success mb-4">💊 Kelola Data Obat</h3>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- Tombol Import & Export --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <form action="{{ route('obat.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                @csrf
                <input type="file" name="file" class="form-control d-inline w-auto" required>
                <button type="submit" class="btn btn-outline-success btn-sm">
                    ⬆️ Import Excel
                </button>
            </form>
        </div>
        <div>
            <a href="{{ route('obat.export') }}" class="btn btn-outline-primary btn-sm">
                ⬇️ Export Excel
            </a>
        </div>
    </div>

    {{-- Form Tambah Obat --}}
    <form action="{{ route('obat.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <input type="text" name="kode_obat" class="form-control" placeholder="Kode Obat" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="nama_obat" class="form-control" placeholder="Nama Obat" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="stock_obat" class="form-control" placeholder="Stok" required>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_kadaluarsa" class="form-control" placeholder="Tanggal Kadaluarsa">
            </div>
        </div>
        <div class="text-end mt-3">
            <button class="btn btn-success px-4">💾 Tambah Obat</button>
        </div>
    </form>

    {{-- Tabel Data Obat --}}
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($obats as $index => $obat)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $obat->kode_obat }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td class="text-center">{{ $obat->stock_obat }}</td>
                    <td>{{ $obat->tanggal_kadaluarsa }}</td>
                    <td class="text-center">
                        <a href="{{ route('obat.edit', $obat->id_obat) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id_obat) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data obat</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
