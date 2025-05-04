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
        <p>Berdasarkan Peraturan Wali Kota Bandung No. 1407 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Kecamatan dan Kelurahan, dijelaskan bahwa tugas dan fungsi aparat pada Kelurahan adalah sebagai berikut:</p>

        <p><strong>Lurah</strong></p>

        <p>(1) Lurah mempunyai tugas membantu Camat dalam:</p>
        <ol>
          <li>melaksanakan kegiatan pemerintahan Kelurahan;</li>
          <li>melakukan pemberdayaan masyarakat;</li>
          <li>melaksanakan pelayanan masyarakat;</li>
          <li>memelihara ketenteraman dan ketertiban umum;</li>
          <li>memfasilitasi penyelenggaraan Perpustakaan di Kelurahan;</li>
          <li>memelihara sarana dan prasarana serta fasilitas pelayanan umum;</li>
          <li>melaksanakan tugas lain yang diberikan oleh camat; dan</li>
          <li>melaksanakan tugas lain sesuai dengan ketentuan peraturan perundang-undangan.</li>
        </ol>

        <p>(2) Dalam melaksanakan tugas tersebut, Lurah mempunyai uraian tugas:</p>
        <ol>
          <li>menyusun rencana kerja dan program kerja Kelurahan;</li>
          <li>membagi tugas kepada bawahan secara efektif dan efisien;</li>
          <li>mengarahkan tugas bawahan berdasarkan kebijakan Kecamatan;</li>
          <li>membina dan memotivasi bawahan untuk meningkatkan produktivitas kerja;</li>
          <li>melaksanakan kegiatan pemerintahan Kelurahan;</li>
          <li>melaksanakan pemberdayaan masyarakat di Kelurahan;</li>
          <li>memberikan fasilitasi penyelenggaraan Perpustakaan di Kelurahan;</li>
          <li>melaksanakan pelayanan masyarakat;</li>
          <li>melaksanakan pembinaan administrasi kepegawaian, keuangan, dan aset Kelurahan;</li>
          <li>memelihara sarana, prasarana, fasilitas umum dan lingkungan hidup;</li>
          <li>membina lembaga kemasyarakatan;</li>
          <li>memeriksa, memaraf, dan/atau menandatangani konsep naskah dinas;</li>
          <li>membuat telaahan staf bahan perumusan kebijakan atasan;</li>
          <li>mengkoordinasikan urusan pemerintahan umum, ekonomi, pembangunan dan sosial;</li>
          <li>melaksanakan monitoring, evaluasi, dan pelaporan;</li>
          <li>melakukan hubungan kerja dengan instansi terkait sesuai tugas dan fungsi;</li>
          <li>melaksanakan tugas lain dari atasan sesuai tugas dan fungsinya.</li>
        </ol>
      </div>
    </div>
  </div>
</section>

@endsection
