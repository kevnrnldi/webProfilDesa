@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h2>Tambah Berita Baru</h2>

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('berita.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        </div>
        
    </form>
</div>
@endsection
