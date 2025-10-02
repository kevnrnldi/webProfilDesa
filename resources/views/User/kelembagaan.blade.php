@extends('layouts.main')

@section('title', 'Detail Kelembagaan')

@section('link')
<style>
    .kelembagaan-img {
        max-height: 300px;
        object-fit: cover;
        width: 100%;
    }
    .bagan-structure {
        margin-top: 50px;
        text-align: center;
    }
    .bagan-structure img {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection

@section('content')

<section class="container mt-5 pt-5 mb-5">
    <h1 class="text-center mb-4 fw-bold" style="color: #27548A">Detail Kelembagaan</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title text-center fw-bold text-primary" >{{ $kelembagaan->nama_kelembagaan }}</h3>

            <p class="card-text mt-4">{{ $kelembagaan->kegunaan }}</p>

            <div class="bagan-structure">
                <h3 class="mb-3 text-primary fw-bold">Struktur Organisasi</h3>
                @if($kelembagaan->gambar_bagan_struktur)
                    <img src="{{ asset('storage/' . $kelembagaan->gambar_bagan_struktur) }}" alt="Bagan Struktur {{ $kelembagaan->nama_kelembagaan }}">
                @else
                    <p class="text-muted">Bagan Struktur belum diunggah.</p>
                @endif
            </div>
        </div>
    </div>

</section>

@endsection
