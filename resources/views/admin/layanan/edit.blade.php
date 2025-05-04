@extends('layouts.mainAdmin')

@section('title', 'Edit Layanan')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Edit Layanan</h2>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Layanan</label>
            <input type="text" class="form-control" id="judul" name="judul" maxlength="100" value="{{ old('judul', $layanan->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="syarat" class="form-label">Syarat</label>
            <textarea class="form-control" id="syarat" name="syarat" rows="5" maxlength="3000" required>{{ old('syarat', $layanan->syarat) }}</textarea>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.layanan.show', $layanan->id) }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
        <button type="submit" class="btn btn-success"> <i class="bi bi-save"></i> Update</button>
        
        </div>
        
    </form>
</div>
@endsection
