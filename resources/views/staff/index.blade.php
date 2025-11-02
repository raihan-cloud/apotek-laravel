@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="text-center text-success mb-4 fw-bold">👩‍⚕️ Kelola Data Staf</h3>

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

    {{-- Tabel Data Staf --}}
    <h5 class="fw-bold mb-3 text-primary">📋 Daftar Staf</h5>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-success">
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $staff->nama }}</td>
                    <td>{{ $staff->alamat }}</td>
                    <td>{{ $staff->tempat_lahir }}</td>
                    <td>{{ $staff->tanggal_lahir }}</td>
                    <td>{{ $staff->no_hp }}</td>
                    <td>
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

