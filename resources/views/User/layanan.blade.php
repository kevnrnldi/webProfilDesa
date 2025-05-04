@extends('layouts.main')

@section('title', 'Layanan Kelurahan')

@section('link')
  <link rel="stylesheet" href="{{ asset('asset/style/layanan.css') }}">
@endsection

@section('content')
<div class="layanan-container">
  <h1 style="color: #27548A"><strong>Informasi Jenis Layanan Kelurahan Lempuing</strong></h1>
  <div class="layanan-grid">
    @php
      // Bagi koleksi layanan menjadi dua bagian
      $total = $layanans->count();
      $half  = (int) ceil($total / 2);
      $firstHalf  = $layanans->slice(0, $half);
      $secondHalf = $layanans->slice($half);
    @endphp

    {{-- Kolom pertama --}}
    <div class="layanan-column">
      @foreach($firstHalf as $layanan)
        <div class="card">
          <h2>{{ $layanan->judul }}</h2>
          @php
            // Pisahkan syarat menggunakan explode untuk memecah berdasarkan \n
            $items = explode("\n", $layanan->syarat);
          @endphp
          <ol>
            @foreach($items as $syarat)
              @if(trim($syarat) !== '')
                <li>{{ $syarat }}</li>
              @endif
            @endforeach
          </ol>
        </div>
      @endforeach
    </div>

    {{-- Kolom kedua --}}
    <div class="layanan-column">
      @foreach($secondHalf as $layanan)
        <div class="card">
          <h2>{{ $layanan->judul }}</h2>
          @php
            $items = explode("\n", $layanan->syarat);
          @endphp
          <ol>
            @foreach($items as $syarat)
              @if(trim($syarat) !== '')
                <li>{{ $syarat }}</li>
              @endif
            @endforeach
          </ol>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
