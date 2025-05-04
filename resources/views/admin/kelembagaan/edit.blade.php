@extends('layouts.mainAdmin')

@section('title', 'Edit Kelembagaan')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Edit Kelembagaan</h2>

    <form action="{{ route('admin.kelembagaan.update', $kelembagaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama_kelembagaan" class="form-label">Nama Kelembagaan</label>
            <input type="text" class="form-control" id="nama_kelembagaan" name="nama_kelembagaan" value="{{ $kelembagaan->nama_kelembagaan }}" required>
        </div>

        <div class="mb-3">
            <label for="kegunaan" class="form-label">Kegunaan</label>
            <textarea class="form-control" id="kegunaan" name="kegunaan" rows="4" required>{{ $kelembagaan->kegunaan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar_bagan_struktur" class="form-label">Gambar Bagan Struktur</label>
            <input type="file" class="form-control" id="gambar_bagan_struktur" name="gambar_bagan_struktur">
            @if ($kelembagaan->gambar_bagan_struktur)
                <img src="{{ asset('storage/' . $kelembagaan->gambar_bagan_struktur) }}" width="100">
            @endif
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.kelembagaan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Perbarui</button>
        </div>
    </form>
</div>

@endsection
