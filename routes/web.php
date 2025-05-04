<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilKelurahanController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\KataSambutanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemografiController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\layananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//USER
// routes/web.php
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan halaman profil kelurahan ke user
Route::get('/profil-kelurahan', [HomeController::class, 'userProfil'])->name('profil.kelurahan');

// Mengarahkan route ke HomeController
Route::get('/berita', [HomeController::class, 'news'])->name('berita.user');
Route::get('/berita/{id}', [HomeController::class, 'show'])->name('berita.detail');

//layanan user
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan.index');

Route::get('/demografi-penduduk', function(){
    return view('User.demografi');})->name('demografi-penduduk');

//Pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

//Demografi
Route::get('/demografi', [HomeController::class,'demografi'])->name('demografi.index');

//Kelembagaan
Route::get('kelembagaan/{id}', [HomeController::class, 'kelembagaan'])->name('kelembagaan.user.show');








     //ADMIN
     Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
     Route::post('/login', [AuthController::class, 'login']);
     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

     // Auth
     Route::middleware('auth')->group(function () {
    // Halaman Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // Halaman Pengumuman
    Route::get('/admin/banner', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::post('/admin/banner', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::delete('/admin/banner/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');


    //profil kelurahan
    // Halaman Visi & Misi
    // 1. Tabel ringkas (judul + cuplikan misi) + tombol Preview
    Route::get('/admin/visi-misi', [ProfilKelurahanController::class, 'index'])
         ->name('admin.visimisi.index');
    // 2. Halaman Preview (tampilkan visi & misi lengkap, plus tombol Edit)
    Route::get('/admin/visi-misi/{id}', [ProfilKelurahanController::class, 'show'])
         ->name('admin.visimisi.preview');
    // 3. Halaman Edit (form edit visi & misi)
    Route::get('/admin/visi-misi/{id}/edit', [ProfilKelurahanController::class, 'edit'])
         ->name('admin.visimisi.edit');
    // 4. Proses Update
    Route::put('/admin/visi-misi/{id}', [ProfilKelurahanController::class, 'update'])
         ->name('admin.visimisi.update');


    // Halaman Kata Sambutan
    Route::get('/admin/katasambutan', [KataSambutanController::class, 'index'])->name('admin.katasambutan.index');
    Route::get('/admin/katasambutan/{id}', [KataSambutanController::class, 'show'])->name('admin.katasambutan.show');
    Route::get('/admin/katasambutan/{id}/edit', [KataSambutanController::class, 'edit'])->name('admin.katasambutan.edit');
    Route::put('/admin/katasambutan/{id}', [KataSambutanController::class, 'update'])->name('admin.katasambutan.update');


    // Halaman Struktur Organisasi
    Route::get('/admin/struktur', [StrukturOrganisasiController::class, 'index'])->name('admin.struktur.index');
    Route::post('/admin/struktur', [StrukturOrganisasiController::class, 'store'])->name('admin.struktur.store');
    Route::delete('/admin/struktur/{id}', [StrukturOrganisasiController::class, 'destroy'])->name('admin.struktur.destroy');


    // Halaman Berita
     Route::get('/admin/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/admin/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/admin/berita/{id}', [BeritaController::class, 'show'])->name('berita.show'); // preview
    Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');


    // Halaman Pengaduan
    Route::get('/admin/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/admin/pengaduan/{id}', [PengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::delete('/admin/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');

    // Halaman Akun
    Route::resource('admin/akun', UserController::class)
    ->names('admin.akun')
    ->parameters(['akun' => 'user']);

    // Halaman Demografi
    Route::resource('admin/demografi', DemografiController::class)->names('admin.demografi');
    Route::get('/admin/demografi/edit/{kategori}', [DemografiController::class, 'editByKategori'])->name('admin.demografi.edit.kategori');
     Route::put('/admin/demografi/update/{kategori}', [DemografiController::class, 'updateByKategori'])->name('admin.demografi.update.kategori');
          

    // Halaman Kelembagaan
    Route::resource('admin/kelembagaan', KelembagaanController::class)->names('admin.kelembagaan');

     // Halaman Layanan
     Route::resource('admin/layanan', LayananController::class)->names('admin.layanan');
});


 
