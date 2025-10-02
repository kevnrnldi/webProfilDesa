@extends('layouts.main')

@section('title', 'Berita Kelurahan')
@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/berita/berita.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="header text-center my-4">
    <h1>Berita Kelurahan</h1>
    <p class="text-muted">Menyajikan informasi terbaru tentang peristiwa dan artikel jurnalistik dari Kelurahan Lempuing</p>
  </div>

  <div class="card-grid">
    
    @forelse($berita as $item)
    <div class="card">
      @if ($item->gambar == null)
        <img src="{{ asset('asset/berita.png') }}" alt="Gambar Berita">
      @else
      <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita">
      @endif
      <div class="card-content">
        <div class="card-title">{{ $item->judul }}</div>
        <div class="card-description">{{ Str::limit($item->isi, 100) }}...</div>
      </div>
    
      <div class="card-actions">
        <div class="badge-date">
          {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
        </div>
        <a href="{{ route('berita.detail', $item->id) }}" class="btn btn-primary">Lihat Selengkapnya</a>
      </div>
    </div>
    @empty
      <p class="text-center text-muted">Belum ada berita.</p>
    @endforelse
  </div>
</div>
@endsection
