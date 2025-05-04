@extends('layouts.mainAdmin')

@section('title', 'Detail Pengaduan')
@section('content')

<div class="container">
    <h2 class="text-primary">Detail Pengaduan</h2>

    <div class="card mt-4 p-4">
        <p><strong>Nama :</strong> {{ $pengaduan->nama }}</p>
        <p><strong>No Telepon :</strong> {{ $pengaduan->telepon }}</p>
        <p><strong>Kategori :</strong> <span class="text-primary fw-bold">{{ ucfirst($pengaduan->kategori) }}</span></p>
        <p><strong>Isi Pengaduan :</strong></p>
        <p class="text-justify">{{ $pengaduan->isi }}</p> <!-- Menambahkan kelas text-justify -->

        @if($pengaduan->lampiran)
        <p><strong>Lampiran:</strong><br>
            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank" class="btn btn-sm btn-primary mt-2">Lihat Lampiran</a>
        </p>
        @endif

        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>

@endsection
