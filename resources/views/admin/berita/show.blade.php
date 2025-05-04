@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $berita->judul }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</p>

            <!-- Menampilkan gambar berita dengan penataan tengah dan ukuran yang disesuaikan -->
            @if($berita->gambar)
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-fluid rounded" style="max-height: 500px; width: auto;">
                </div>
            @endif

            <!-- Teks isi berita dengan format justify dan line-height untuk kenyamanan baca -->
            <div class="mt-3">
                <p class="text-justify" style="line-height: 1.8; text-align: justify;">
                    {!! nl2br(e($berita->isi)) !!}
                </p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit Berita
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
