@extends('layouts.main')

@section('title', 'Detail Berita')

@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/berita/beritadetail.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">

    <!-- Kolom Detail Berita -->
    <div class="col-md-8">
      <div class="card-detail">
        <h2 class="detail-title">{{ $berita->judul }}</h2>
        <div class="detail-date">
          <i class="bi bi-calendar"></i>
          {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
        </div>
        <div class="detail-image-wrapper">
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="detail-image">
        </div>
        <div class="detail-content">
          {!! nl2br(e($berita->isi)) !!}
        </div>
        <a href="{{ route('berita.user') }}" class="btn-back">Kembali</a>
      </div>
    </div>

    <!-- Kolom Berita Lainnya -->
    <div class="col-md-4">
      <div class="other-news">
        <h4>Berita Lainnya</h4>
        <div class="other-grid">
          @foreach($otherBerita as $other)
          <a href="{{ route('berita.detail', $other->id) }}" class="other-card">
            <img src="{{ asset('storage/' . $other->gambar) }}" alt="Thumb {{ $other->judul }}" class="other-thumb">
            <div class="other-info">
              <div class="other-title">{{ Str::limit($other->judul, 60) }}</div>
              <div class="other-date">{{ \Carbon\Carbon::parse($other->created_at)->format('d M Y') }}</div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
