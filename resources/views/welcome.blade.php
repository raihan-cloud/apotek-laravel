@extends('layouts.main')

@section('title', 'Beranda - Apotek Laravel')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold text-success">Selamat Datang di Aplikasi Apotek Laravel</h1>
    <p class="text-muted">Kelola data obat, pelanggan, dan staf dengan mudah dan cepat.</p>
</div>

<div class="row justify-content-center g-4">
    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h5 class="fw-bold mb-3 text-primary">Pelanggan</h5>
            <p class="text-muted mb-3">Kelola data pelanggan apotek dengan mudah.</p>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-custom w-100">Kelola</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h5 class="fw-bold mb-3 text-success">Obat</h5>
            <p class="text-muted mb-3">Tambah, ubah, dan hapus data obat dengan cepat.</p>
            <a href="{{ route('obat.index') }}" class="btn btn-success btn-custom w-100">Kelola</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h5 class="fw-bold mb-3 text-warning">Staf</h5>
            <p class="text-muted mb-3">Atur informasi dan peran staf apotek.</p>
            <a href="{{ route('staff.index') }}" class="btn btn-warning btn-custom w-100">Kelola</a>
        </div>
    </div>
</div>
@endsection
