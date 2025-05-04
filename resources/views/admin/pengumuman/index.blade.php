@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h2 class="text-primary fw-bold">Banner</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tambah Pengumuman -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPengumumanModal">+ Tambah Banner</button>

    <!-- List Pengumuman -->
    <div class="row">
        @foreach($data as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="gambar" width="200" height="200">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mt-2">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addPengumumanModal" tabindex="-1" aria-labelledby="addPengumumanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPengumumanModalLabel">Tambah Pengumuman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
