@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Berita</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" rows="6" required>{{ $berita->isi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar (Opsional)</label>
                    @if($berita->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="150" class="img-thumbnail">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
