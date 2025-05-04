@extends('layouts.mainAdmin')

@section('title', 'Dashboard Admin')

@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/admin/dashboardAdmin.css') }}">
@endsection

@section('content')
<div class="container ">
    <h1>Selamat Datang, <span class="text-primary">{{ Auth::user()->name }}!</span></h1>
    
    <p class="lead">
        Halaman ini memberikan informasi terkait data utama platform, seperti jumlah pengguna, berita, dan pengaduan. Anda dapat mengelola dan memantau semua data ini dengan mudah dari sini.
    </p>

    <div class="row">
        <!-- Card Jumlah User -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <i class="bi bi-people-fill"></i>
                    <h5 class="card-title">Jumlah User</h5>
                    <h2 class="card-text">{{ $jumlahUser }}</h2>
                    <p class="card-text">Total pengguna yang telah terdaftar dan menggunakan platform ini.</p>
                    <a href="{{ route('admin.akun.index') }}" class="btn btn-light">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Berita -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <i class="bi bi-newspaper"></i>
                    <h5 class="card-title">Jumlah Berita</h5>
                    <h2 class="card-text">{{ $jumlahBerita }}</h2>
                    <p class="card-text">Jumlah berita yang telah diposting dan dapat diakses oleh publik.</p>
                    <a href="{{ route('berita.index') }}" class="btn btn-light">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Pengaduan -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <h5 class="card-title">Jumlah Pengaduan</h5>
                    <h2 class="card-text">{{ $jumlahPengaduan }}</h2>
                    <p class="card-text">Jumlah pengaduan yang sedang diproses atau menunggu tindak lanjut.</p>
                    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
