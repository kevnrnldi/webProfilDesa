@extends('layouts.main')

@section('title','Demografi Kelurahan')

@section('link')
  <!-- Muat CSS kustom -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="{{ asset('asset/style/demografi.css') }}">
@endsection

@section('content')

<div class="demografi">
{{-- Deskripsi --}}
<section class="container mt-5 mb-5 demografi-header">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="display-5 fw-bold ">DEMOGRAFI PENDUDUK</h1>
        <p class="text-muted">
          Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah.
          Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama,
          dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
        </p>
      </div>
      <div class="col-md-6 text-center">
        <img src="{{ asset('asset/demografi.png') }}"
             alt="Ilustrasi Demografi"
             class="img-fluid demografi-illu"
             width="500" height="500">
      </div>
    </div>
</section>


{{-- Jumlah Penduduk dan Kepala Keluarga --}}
<section class="container mb-5">
  <h2 class="h3 mb-4  fw-bold " style="color: #27548A">Jumlah Penduduk dan Kepala Keluarga</h2>
  <div class="row g-4">
    @foreach($jumlahPenduduk as $item)
      <div class="col-sm-6 col-lg-3">
        <div class="card demografi-card text-center h-100">
          <div class="card-body d-flex flex-column justify-content-center">
            {{-- Pilih ikon sesuai subkategori --}}
            @php
              $icons = [
                'Total'           => 'people-fill',
                'Kepala Keluarga' => 'house-fill',
                'Laki-laki'       => 'gender-male',
                'Perempuan'       => 'gender-female',
              ];
              $icon = $icons[$item->subkategori] ?? 'people';
            @endphp
            <div class="mb-3">
              <i class="bi bi-{{ $icon }} demografi-icon"></i>
            </div>
            <h5 class="card-title text-uppercase">{{ $item->subkategori }}</h5>
            <p class="card-text display-6 ">{{ number_format($item->jumlah) }} <small class="text-muted">Jiwa</small></p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>


{{-- Jumlah Penduduk Berdasarkan Umur --}}
<section class="container mt-4">
  <h2 class=" mb-3">Berdasarkan Kelompok Umur</h2>

  {{-- Data tersembunyi untuk JS --}}
  <span id="ageGroupsData" hidden>{{ json_encode($ageGroups) }}</span>
  <span id="totalCountsData" hidden>{{ json_encode($totalCounts) }}</span>

  <canvas id="populationChart" width="400" height="200"></canvas>
</section>



{{-- Jumlah Penduduk Berdasarkan Pendidikan --}}
<section class="container mt-5">
  <h2 class=" mb-4">Berdasarkan Tingkat Pendidikan</h2>
  <div class="row justify-content-center">
    {{-- Data tersembunyi untuk grafik --}}
    <span id="educationLabels" hidden>{{ json_encode($educationLabels) }}</span>
    <span id="educationCounts" hidden>{{ json_encode($educationCounts) }}</span>

    {{-- Grafik --}}
    <div class="col-md-6">
      <div class="small-chart">
        <canvas id="educationChart"></canvas>
      </div>
    </div>
    
    {{-- Legend --}}
    <div class="col-md-6">
      <ul class="list-group">
        @foreach ($educationLabels as $index => $label)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
              <span class="badge me-2" style="background-color: {{ ['#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#9C27B0', '#00BCD4', '#FF9800', '#E91E63', '#3F51B5'][$index % 9] }};">&nbsp;&nbsp;</span>
              {{ $label }}
            </span>
            <span class="fw-bold">{{ $educationCounts[$index] }}</span>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>


{{-- Berdasarkan Jenis Pekerjaan --}}
<section class="container mt-5">
  <h2 class="h4  fw-bold mb-4">Data Berdasarkan Jenis Pekerjaan</h2>
  <div class="row">
    
    {{-- TABEL SEBELAH KIRI - Semua Data --}}
    <div class="col-lg-5 mb-4">
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table table-bordered">
          <thead class="table-danger text-white text-center">
            <tr>
              <th>Jenis Pekerjaan</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pekerjaan as $item)
              <tr>
                <td>{{ $item->subkategori }}</td>
                <td class="text-center">{{ number_format($item->jumlah) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- CARD GRID SEBELAH KANAN - Hanya 6 data teratas --}}
    <div class="col-lg-7">
      <div class="row g-3">
        @foreach($pekerjaan->sortByDesc('jumlah')->take(6) as $item)
          <div class="col-6 col-md-4">
            <div class="card shadow-sm border-0 h-100">
              <div class="card-body d-flex flex-column justify-content-between">
                <h6 class="text-muted mb-2">{{ $item->subkategori }}</h6>
                <h4 class="fw-bold text-end">{{ number_format($item->jumlah) }}</h4>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>




{{-- Berdasarkan Status Perkawinan --}}
@php
  function getPerkawinanIcon($status) {
    return match($status) {
      'Belum Menikah' => 'emoji-smile',
      'Menikah' => 'heart-fill',
      'Janda', 'Duda', 'Janda/Duda' => 'person-fill-x',
      'Cerai' => 'slash-circle',
      default => 'question-circle',
    };
  }
@endphp

<section class="container mt-5">
  <h2 class="h4  fw-bold mb-4">Berdasarkan Status Perkawinan</h2>
  <div class="row g-4">
    @foreach($perkawinan as $item)
      <div class="col-sm-6 col-lg-3">
        <div class="card demografi-card text-center h-100">
          <div class="card-body d-flex flex-column justify-content-center">
            <div class="mb-3">
              <i class="bi bi-{{ getPerkawinanIcon($item->subkategori) }} demografi-icon"></i>
            </div>
            <h5 class="card-title text-uppercase">{{ $item->subkategori }}</h5>
            <p class="card-text display-6 ">
              {{ number_format($item->jumlah) }} <small class="text-muted">Jiwa</small>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>




{{-- Berdasarkan Agama --}}
<section class="container mt-5">
  <h2 class="h4  fw-bold mb-4 ">Berdasarkan Agama</h2>
  <div class="row g-4 justify-content-center">
    @foreach($agama as $item)
      <div class="col-sm-6 col-lg-3">
        <div class="card demografi-card text-center h-100 d-flex">
          <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <div class="mb-3">
              {{-- Pilih ikon berdasarkan subkategori --}}
              @php
                $icon = match(strtolower($item->subkategori)) {
                  'islam' => 'bi-moon-stars',
                  'kristen', 'katolik' => 'bi-cross',
                  'hindu' => 'bi-flower1',
                  'buddha', 'budha' => 'bi-circle-half',
                  'konghucu' => 'bi-fan',
                  default => 'bi-person-circle'
                };
              @endphp
              <i class="bi {{ $icon }} demografi-icon fs-1 "></i>
            </div>
            <h5 class="card-title text-uppercase">{{ $item->subkategori }}</h5>
            <p class="card-text display-6 ">{{ number_format($item->jumlah) }} <small class="text-muted">Jiwa</small></p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>








</div>


@section('script')
{{-- Muat JS Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- Script untuk grafik lingkaran --}}
<script src="{{ asset('asset/javascript/demografiUser/grafik.js') }}"></script>
{{-- Script untuk Chart --}}
<script src="{{ asset('asset/javascript/demografiUser/chart.js') }}"></script>
@endsection

@endsection
