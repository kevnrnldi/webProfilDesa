<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DemografiPenduduk;

class JumlahPenduduk extends Seeder
{
    public function run()
    {
        // Mengosongkan tabel terlebih dahulu
        DemografiPenduduk::truncate();

        // Menambahkan data kategori dan subkategori
        DemografiPenduduk::insert([

            // Kategori: Kelompok Umur
            ['kategori' => 'Kelompok Umur', 'subkategori' => '0-6 Tahun', 'jumlah' => 100],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '7-12 Tahun', 'jumlah' => 120],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '13-18 Tahun', 'jumlah' => 150],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '19-24 Tahun', 'jumlah' => 200],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '25-55 Tahun', 'jumlah' => 500],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '56-79 Tahun', 'jumlah' => 150],
            ['kategori' => 'Kelompok Umur', 'subkategori' => '80+ Tahun', 'jumlah' => 33],

            // Kategori: Pendidikan
            ['kategori' => 'Pendidikan', 'subkategori' => 'Tidak Sekolah', 'jumlah' => 10],
            ['kategori' => 'Pendidikan', 'subkategori' => 'TK', 'jumlah' => 25],
            ['kategori' => 'Pendidikan', 'subkategori' => 'SD', 'jumlah' => 150],
            ['kategori' => 'Pendidikan', 'subkategori' => 'SMP', 'jumlah' => 200],
            ['kategori' => 'Pendidikan', 'subkategori' => 'SMA', 'jumlah' => 300],
            ['kategori' => 'Pendidikan', 'subkategori' => 'D1-D3', 'jumlah' => 100],
            ['kategori' => 'Pendidikan', 'subkategori' => 'Strata 1', 'jumlah' => 80],
            ['kategori' => 'Pendidikan', 'subkategori' => 'Strata 2', 'jumlah' => 20],
            ['kategori' => 'Pendidikan', 'subkategori' => 'Strata 3', 'jumlah' => 5],

            // Kategori: Pekerjaan
            ['kategori' => 'Pekerjaan', 'subkategori' => 'Petani', 'jumlah' => 300],
            ['kategori' => 'Pekerjaan', 'subkategori' => 'Nelayan', 'jumlah' => 50],
            ['kategori' => 'Pekerjaan', 'subkategori' => 'Pedagang', 'jumlah' => 200],
            ['kategori' => 'Pekerjaan', 'subkategori' => 'PNS', 'jumlah' => 80],
            ['kategori' => 'Pekerjaan', 'subkategori' => 'Swasta', 'jumlah' => 350],
            ['kategori' => 'Pekerjaan', 'subkategori' => 'Tidak Bekerja', 'jumlah' => 173],

            // Kategori: Agama
            ['kategori' => 'Agama', 'subkategori' => 'Islam', 'jumlah' => 900],
            ['kategori' => 'Agama', 'subkategori' => 'Kristen', 'jumlah' => 100],
            ['kategori' => 'Agama', 'subkategori' => 'Katolik', 'jumlah' => 50],
            ['kategori' => 'Agama', 'subkategori' => 'Hindu', 'jumlah' => 20],
            ['kategori' => 'Agama', 'subkategori' => 'Budha', 'jumlah' => 10],
            ['kategori' => 'Agama', 'subkategori' => 'Konghucu', 'jumlah' => 5],
            ['kategori' => 'Agama', 'subkategori' => 'Lainnya', 'jumlah' => 68],

            // Kategori: Perkawinan
            ['kategori' => 'Perkawinan', 'subkategori' => 'Belum Menikah', 'jumlah' => 400],
            ['kategori' => 'Perkawinan', 'subkategori' => 'Menikah', 'jumlah' => 500],
            ['kategori' => 'Perkawinan', 'subkategori' => 'Janda/Duda', 'jumlah' => 100],
            ['kategori' => 'Perkawinan', 'subkategori' => 'Cerai', 'jumlah' => 50],

            // Kategori: Jumlah Penduduk
            ['kategori' => 'Jumlah Penduduk', 'subkategori' => 'Total', 'jumlah' => 1500],
            ['kategori' => 'Jumlah Penduduk', 'subkategori' => 'Laki-laki', 'jumlah' => 750],
            ['kategori' => 'Jumlah Penduduk', 'subkategori' => 'Perempuan', 'jumlah' => 750],
            ['kategori' => 'Jumlah Penduduk', 'subkategori' => 'Kepala Keluarga', 'jumlah' => 500],

        ]);
    }
}
