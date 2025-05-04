@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Kata Sambutan</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.katasambutan.update', $data->id) }}">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" rows="8" required>{{ $data->isi }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.katasambutan.show', $data->id) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
