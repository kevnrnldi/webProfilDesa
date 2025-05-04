<?php

namespace App\Http\Controllers;
use App\Models\Pengumuman;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\KataSambutan;
use App\Models\StrukturOrganisasi;
use App\Models\VisiMisi;
use App\Models\DemografiPenduduk;
use App\Models\Kelembagaan;
use App\Models\Layanan;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Ambil semua pengumuman terbaru
        $pengumuman = Pengumuman::latest()->get();
        $kataSambutan = KataSambutan::all(); // Ambil data Kata Sambutan
        $berita = Berita::latest()->take(5)->get(); // Ambil 5 berita terbaru

        $data = DemografiPenduduk::where('kategori', 'Jumlah Penduduk')->get();
        $totalPenduduk = $data->firstWhere('subkategori', 'Total')?->jumlah ?? 0;
        $totalLaki = $data->firstWhere('subkategori', 'Laki-laki')?->jumlah ?? 0;
        $totalPerempuan = $data->firstWhere('subkategori', 'Perempuan')?->jumlah ?? 0;
        $totalKK = $data->firstWhere('subkategori', 'Kepala Keluarga')?->jumlah ?? 0;

        return view('User.home', compact('pengumuman','berita','kataSambutan','totalPenduduk', 'totalLaki', 'totalPerempuan', 'totalKK')); // Kirim data ke view
    }

    public function news(){
        $berita = Berita::all(); // Ambil semua data berita
        return view('User.berita', compact('berita')); // Kirim data berita ke view
    }

    public function show($id)
{
    $berita = Berita::findOrFail($id); // Ambil berita berdasarkan id
     // Ambil 5 berita lainnya selain yang sedang dilihat
    $otherBerita = Berita::where('id', '<>', $id)->latest()->take(5)->get();
    return view('User.beritadetail', compact('berita','otherBerita')); // Kirim data berita ke view
}

    public function userProfil()
    {
        $visiMisi = VisiMisi::all(); // Ambil semua data Visi dan Misi
        $kataSambutan = KataSambutan::all(); // Ambil data Kata Sambutan
        $strukturOrganisasi = StrukturOrganisasi::all(); // Ambil data Struktur Organisasi
        return view('User.profilKelurahan', compact('visiMisi', 'kataSambutan', 'strukturOrganisasi'));
    }

    public function demografi()
    {
        // Ambil data berdasarkan kategori
        $jumlahPenduduk = DemografiPenduduk::where('kategori', 'Jumlah Penduduk')->get();
        $kelompokUmur = DemografiPenduduk::where('kategori', 'Kelompok Umur')->get();
        $pendidikan = DemografiPenduduk::where('kategori', 'Pendidikan')->get();
        $pekerjaan = DemografiPenduduk::where('kategori', 'Pekerjaan')->get();
        $agama = DemografiPenduduk::where('kategori', 'Agama')->get();
        $perkawinan = DemografiPenduduk::where('kategori', 'Perkawinan')->get();
    
        // Siapkan label dan data total untuk kelompok umur
        $ageGroups = [];
        $totalCounts = [];
        foreach ($kelompokUmur as $item) {
            $ageGroups[] = $item->subkategori;
            $totalCounts[] = $item->jumlah;
        }
    
        // Siapkan label dan data total untuk pendidikan
        $educationLabels = [];
        $educationCounts = [];
        foreach ($pendidikan as $item) {
            $educationLabels[] = $item->subkategori;
            $educationCounts[] = $item->jumlah;
        }
    
        // Kirim data ke view
        return view('User.demografi', compact(
            'jumlahPenduduk',
            'kelompokUmur',
            'pendidikan',
            'pekerjaan',
            'agama',
            'perkawinan',
            'ageGroups',
            'totalCounts',
            'educationLabels',
            'educationCounts'
        ));
    }
    

    public function kelembagaan($id)
    {
        $kelembagaan = Kelembagaan::findOrFail($id);
        return view('User.kelembagaan', compact('kelembagaan'));
    }

    public function layanan(){
        $layanans = Layanan::all(); // Ambil semua data layanan
        return view('User.layanan', compact('layanans')); // Kirim data layanan ke view
    }

}
