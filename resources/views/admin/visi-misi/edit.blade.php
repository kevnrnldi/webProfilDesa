@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Visi dan Misi</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.visimisi.update', $data->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ $data->judul }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="visi" class="form-label">Visi</label>
                    <textarea name="visi" id="visi" class="form-control" rows="5" required>{{ $data->visi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="misi" class="form-label">Misi</label>
                    <textarea name="misi" id="misi" class="form-control" rows="5" required>{{ $data->misi }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.visimisi.preview', $data -> id) }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
