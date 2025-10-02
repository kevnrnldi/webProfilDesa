@extends('layouts.main')

@section('title', 'Pengaduan Kelurahan')
@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/pengaduan.css') }}">
@endsection

@section('content')
<div class="containerku">
    <div class="header">
        <h1>Form Pengaduan</h1>
        <p>Silakan isi form di bawah ini untuk mengajukan pengaduan.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">Nama*</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telepon">No Telepon / WA*</label>
            <input type="text" name="telepon" id="telepon" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori Pengaduan*</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Umum">Umum</option>
                <option value="Sosial">Sosial</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Permintaan">Permintaan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="isi">Isi Pengaduan*</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="lampiran">Lampiran (opsional)</label>
            <input type="file" name="lampiran" id="lampiran" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
    </form>
</div>
@endsection
