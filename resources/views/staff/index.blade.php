@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="text-center text-success mb-4 fw-bold">👩‍⚕️ Kelola Data Staf</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Tambah Staf --}}
    <form action="{{ route('staff.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nama Staf</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama staf" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan tempat lahir" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP" required>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-4 py-2 fw-semibold">
                💾 Simpan Data
            </button>
        </div>
    </form>

    <hr>

    {{-- Tombol Import & Export Excel --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-primary mb-0">📋 Daftar Staf</h5>

        <div class="d-flex gap-2">
            {{-- Form Import Excel --}}
            <form action="{{ route('staff.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                @csrf
                <input type="file" name="file" class="form-control form-control-sm" style="width: 220px;" required>
                <button type="submit" class="btn btn-success btn-sm fw-semibold">📤 Import Excel</button>
            </form>

            {{-- Tombol Export Excel --}}
            <a href="{{ route('staff.export') }}" class="btn btn-primary btn-sm fw-semibold">📥 Export Excel</a>
        </div>
    </div>

    {{-- Tabel Data Staf --}}
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-success text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($staffs as $staff)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->alamat }}</td>
                    <td>{{ $staff->tempat_lahir }}</td>
                    <td>{{ $staff->tanggal_lahir }}</td>
                    <td>{{ $staff->no_hp }}</td>
                    <td class="text-center">
                        <a href="{{ route('staff.edit', $staff->id_staff) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('staff.destroy', $staff->id_staff) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada data staf</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
