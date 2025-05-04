@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h1 class="my-3 text-primary">Edit Data Pekerjaan</h1>

    <form action="{{ route('admin.demografi.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Kategori (tidak bisa diubah) --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" class="form-control" value="{{ $data->kategori }}" disabled>
            <input type="hidden" name="kategori" value="{{ $data->kategori }}">
        </div>

        {{-- Subkategori / Nama Pekerjaan --}}
        <div class="mb-3">
            <label for="subkategori" class="form-label">Nama Pekerjaan</label>
            <input type="text" name="subkategori" class="form-control" value="{{ $data->subkategori }}" required>
        </div>

        {{-- Jumlah --}}
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $data->jumlah }}" min="0" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.demografi.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
