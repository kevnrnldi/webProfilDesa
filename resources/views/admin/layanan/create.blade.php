@extends('layouts.mainAdmin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Tambah Layanan Baru</h2>

    <form action="{{ route('admin.layanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Layanan</label>
            <input type="text" class="form-control" id="judul" name="judul" maxlength="100" required>
        </div>

        <div class="mb-3">
            <label for="syarat" class="form-label">Syarat</label>
            <textarea class="form-control" id="syarat" name="syarat" rows="5" maxlength="3000" required></textarea>
        </div>
        <div class="d-flex justify-content-between">
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <button type="submit" class="btn btn-primary"> <i class="bi bi-save"></i> Simpan</button>
        </div>
    </form>
</div>
@endsection
