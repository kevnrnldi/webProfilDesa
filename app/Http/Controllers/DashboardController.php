<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Berita; // pastikan model berita ada
use App\Models\Pengaduan; // pastikan model pengaduan ada

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahBerita = Berita::count();
        $jumlahPengaduan = Pengaduan::count();

        return view('admin.dashboard', compact('jumlahUser', 'jumlahBerita', 'jumlahPengaduan'));
    }

}
