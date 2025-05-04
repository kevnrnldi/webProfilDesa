@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h1 class="my-4 text-primary">Tambah Data Pekerjaan</h1>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('admin.demografi.store') }}" method="POST">
        @csrf

        {{-- Tampilkan kategori tapi disabled --}}
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" disabled>
                <option selected>Pekerjaan</option>
            </select>
            {{-- Hidden input untuk mengirim value --}}
            <input type="hidden" name="kategori" value="Pekerjaan">
        </div>

        <div class="mb-3">
            <label for="subkategori" class="form-label">Subkategori</label>
            <input type="text" class="form-control" name="subkategori" id="subkategori" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.demografi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
