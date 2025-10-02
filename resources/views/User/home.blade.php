@extends('layouts.main')
@section('title', 'Home Page')

@section('link')
    <link rel="stylesheet" href="{{ asset('asset/style/home.css') }}">
@endsection

@section('content')
<div>

{{-- === Carousel Pengumuman === --}}
@if($pengumuman->isNotEmpty())
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">

        {{-- Carousel Indicators --}}
        <div class="carousel-indicators">
            @foreach($pengumuman as $index => $item)
                <button type="button"
                        class="invisible {{ $index === 0 ? 'active' : '' }}"
                        data-bs-target="#homeCarousel"
                        data-bs-slide-to="{{ $index }}"
                        aria-label="Slide {{ $index + 1 }}"
                        @if($index === 0) aria-current="true" @endif>
                </button>
            @endforeach
        </div>

        {{-- Carousel Items --}}
        <div class="carousel-inner">
            @foreach($pengumuman as $index => $item)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="dark-overlay"></div>
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="carousel-title ">{{ $item->judul }}</h1>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Carousel Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
@endif


    {{-- === Sambutan Kepala Kelurahan === --}}
  <div class="container my-5 d-flex justify-content-center">
    <div class="row w-100">
        <div class="col-md-6">
            <h1 class="fw-bold" style=" color: #27548A;">Sambutan Kepala Kelurahan</h1>
            <h3 style="color: #DDA853">Guri Srihono</h3>
            <h5 class="text-muted mb-3">Kepala Kelurahan Lempuing</h5>
            @foreach($kataSambutan as $kata)
                <p>{!! nl2br(e($kata->isi)) !!}</p>
            @endforeach
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/Kota_Bengkulu.png" class="img-fluid logo-right" width="200" alt="Logo">
        </div>
    </div>
  </div>

    {{-- === Peta Kelurahan === --}}
    <div class="container my-5 text-center">
        <h1 class="fw-bold mb-3" style="color: #27548A">Peta Kelurahan</h1>
        <p>Menampilkan Peta Kelurahan dengan Interest Point Kelurahan Lempuing</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.9389203247465!2d102.27724767473353!3d-3.823256696150563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36ba98c3528751%3A0xca2f747f313b4424!2sKantor%20Lurah%20Lempuing!5e0!3m2!1sid!2sid!4v1745236122689!5m2!1sid!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    {{-- === Administrasi Penduduk === --}}
    <div class="container d-flex justify-content-center">
        <div class="my-5">
            <h1 class="adminh1" style="color: #27548A">Administrasi Penduduk</h1>
            <p class="adm">Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait kependudukan untuk pelayanan publik yang efektif dan efisien.</p>

            <div class="stat-grid">
                <div class="stat-card">
                    <div class="number">{{ number_format($totalPenduduk) }}</div>
                    <div class="label">Penduduk</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ number_format($totalLaki) }}</div>
                    <div class="label">Laki-Laki</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ number_format($totalKK) }}</div>
                    <div class="label">Kepala Keluarga</div>
                </div>
                <div class="stat-card">
                    <div class="number">{{ number_format($totalPerempuan) }}</div>
                    <div class="label">Perempuan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- === Berita Desa === --}}
    <div class="container my-5 text-center">
        <h1 class="fw-bold mb-3" style="color:#27548A">Berita Kelurahan</h1>
        <p class="text-muted mb-4">Menyajikan informasi terbaru tentang peristiwa dan artikel jurnalistik dari Kelurahan Lempuing</p>

        <div class="row justify-content-center">
            @foreach($berita as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($item->gambar == null)
                            <img src="{{ asset('asset/berita.png') }}" alt="Gambar Berita" class="card-img-top" width="100%" height="200px">
                        @else
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}</p>
                            <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-outline-primary mt-auto">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            <a href="{{ route('berita.user') }}" class="btn text-white " style="background-color: #27548A">Lihat Semua Berita</a>
        </div>
    </div>

</div>

{{-- === Script === --}}
<script src="{{ asset('asset/javascript/home.js') }}"></script>
@endsection
