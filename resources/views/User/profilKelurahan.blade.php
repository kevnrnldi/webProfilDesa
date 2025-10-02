@extends('layouts.main')
@section('title', 'Profil Kelurahan')

@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/profilekelurahan.css') }}">
@endsection

@section('content')

<!-- Visi & Misi -->
<section class="section visi-misi">
  <div class="profil-container">
    <div class="section-header">
      <h2 style="color: #27548A">Visi &amp; Misi</h2>
    </div>
    <div class="cards">
      <div class="card">
        <h3 class="card-title">Visi</h3>
        <ol class="card-text">
          @foreach($visiMisi as $item)
            @foreach(explode("\n", $item->visi) as $v)
              <li>{{ trim($v) }}</li>
            @endforeach
          @endforeach
        </ol>
      </div>

      <div class="card">
        <h3 class="card-title">Misi</h3>
        <ol class="card-text">
          @foreach($visiMisi as $item)
            @foreach(explode("\n", $item->misi) as $m)
              <li>{{ trim($m) }}</li>
            @endforeach
          @endforeach
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Kata Sambutan -->
<section class="section sambutan">
  <div class="profil-container">
    <div class="section-header">
      <h2>Kata Sambutan</h2>
    </div>
    <div class="card-sambutan">
      @foreach($kataSambutan as $item)
        <p class="card-text">
          {!! nl2br(e($item->isi)) !!}
        </p>
      @endforeach
    </div>
  </div>
</section>



<!-- Struktur Organisasi -->
<section class="section struktur">
  <div class="profil-container">
    <div class="section-header">
      <h2>Struktur Organisasi Kelurahan</h2>
    </div>
    <div class="card full-width struktur-card">
      @if($strukturOrganisasi->isEmpty())
        <p class="card-text">Data belum diisi.</p>
      @else
        @foreach($strukturOrganisasi as $item)
          <img src="{{ asset('storage/' . $item->gambar) }}" alt="Struktur Organisasi" class="struktur-img">
        @endforeach
      @endif
    </div>
  </div>
</section>

<!-- Tugas dan Fungsi -->
<section class="section tupoksi">
  <div class="profil-container">
    <div class="section-header">
      <h2>Tugas dan Fungsi Kelurahan</h2>
    </div>
    <div class="card full-width tugas-fungsi-card">
      <div class="card-text tugas-fungsi-text">
        {{-- Kalau mau dari database juga bisa, tinggal ganti isinya --}}
        <p>Berdasarkan Peraturan Daerah Kota Bengkulu No. 11 Tahun 2008 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Kecamatan dan Kelurahan, dijelaskan bahwa tugas dan fungsi aparat pada Kelurahan adalah sebagai berikut:</p>

        <p><strong>Lurah</strong></p>

        <p>(1) Lurah mempunyai tugas menjalankan kewenangan yang dilimpahkan oleh Walikota dalam
          menyelenggarakan urusan pemerintahan, pembangunan dan kemasyarakatan di
          wilayahnya</p>

        <p>(2) Untuk menyelenggarakan tugas tersebut pada Pasal 7, Lurah mempunyai fungsi:</p>
        <ol>
          <li>Memimpin pelaksanaan kegiatan Pemerintahan Kelurahan;</li>
          <li>Melakukan tugas di bidang pembangunan, pemberdayaan masyarakat, pelayanan masyarakat yang menjadi tanggung jawabnya;</li>
          <li>Melakukan kegiatan dalam rangka penyelenggaraan ketentraman dan ketertiban
            umum;</li>
          <li>Melaksanakan kegiatan dalam rangka pemeliharaan prasarana dan fasilitas pelayanan
            umum;</li>
          <li>Melakukan fungsi-fungsi lain yang dilimpahkan kepada pemerintah kelurahan.</li>
       </ol>
      </div>
    </div>
  </div>
</section>

@endsection
