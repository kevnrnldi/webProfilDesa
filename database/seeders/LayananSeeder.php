<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'judul' => 'REGISTER KTP',
                'syarat' => 
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Berusia 17 tahun/pernah menikah jika berusia di bawah 17 tahun (permohonan baru)\n" .
                    "Membawa KTP Lama (yang asli), jika perpanjangan\n" .
                    "Surat Ket. Kehilangan dari Kepolisian, jika hilang",
            ],
            [
                'judul' => 'REGISTER KK',
                'syarat' => 
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Berusia 17 tahun/pernah menikah jika berusia di bawah 17 tahun (permohonan baru)\n" .
                    "Membawa KTP Lama (yang asli), jika perpanjangan\n" .
                    "Surat Ket. Kehilangan dari Kepolisian, jika hilang",
            ],
            [
                'judul' => 'DOMISILI HAJI',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Fotocopy KTP\n" .
                    "Fotocopy Surat Nikah",
            ],
            [
                'judul' => 'KETERANGAN BELUM MENIKAH',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KTP\n" .
                    "Fotocopy KK\n" .
                    "Surat Pernyataan Belum Menikah bermaterai Rp. 10.000, diketahui RT dan RW",
            ],
            [
                'judul' => 'PINDAH DALAM KOTA',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Fotocopy KTP",
            ],
            [
                'judul' => 'PINDAH LUAR KOTA',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Fotocopy KTP\n" .
                    "Alamat Tujuan Pindah",
            ],
            [
                'judul' => 'KETERANGAN USAHA',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KTP\n" .
                    "Fotocopy KK\n" .
                    "Fotocopy Bukti Pelunasan PBB 3 tahun terakhir\n" .
                    "Form Ijin Tetangga (2 kiri, 2 kanan, 2 depan, 2 belakang)",
            ],
            [
                'judul' => 'KETERANGAN DOMISILI PERORANGAN',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KTP\n" .
                    "Fotocopy KK",
            ],
            [
                'judul' => 'KETERANGAN LAHIR -30 HARI',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Surat Keterangan Lahir dari Bidan / Rumah Sakit\n" .
                    "Fotocopy Surat Nikah\n" .
                    "Fotocopy KK yang sudah ada nama dan NIK bayi\n" .
                    "Fotocopy KTP kedua orangtua bayi\n" .
                    "Form Isian dari Dinas Kependudukan\n" .
                    "Fotocopy KTP dua orang saksi",
            ],
            [
                'judul' => 'KETERANGAN DOMISILI YAYASAN',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy Kartu Keluarga dan KTP Ketua Yayasan\n" .
                    "Fotocopy Akta Pengangkatan / Pendirian\n" .
                    "Denah Lokasi Yayasan\n" .
                    "Form Ijin Tetangga (2 kiri, 2 kanan, 2 depan, 2 belakang)\n" .
                    "Fotocopy Bukti Pelunasan PBB 3 tahun terakhir\n" .
                    "Form Surat Ijin Pemilik Lahan (jika sewa/kontrak)",
            ],
            [
                'judul' => 'KETERANGAN DOMISILI PERUSAHAAN',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KTP dan KK Pemilik Usaha\n" .
                    "Fotocopy NPWP\n" .
                    "Fotocopy Akta Pendirian Usaha (jika ada)\n" .
                    "Fotocopy Surat Keterangan Domisili Usaha\n" .
                    "Form Ijin Tetangga (2 kiri, 2 kanan, 2 depan, 2 belakang)\n" .
                    "Fotocopy Bukti Pelunasan PBB 3 tahun terakhir",
            ],
            [
                'judul' => 'REGISTER PENSIUN',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK\n" .
                    "Fotocopy KTP\n" .
                    "SK Pensiun",
            ],
            [
                'judul' => 'REGISTER AKTA KEMATIAN',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK Alm/Almh\n" .
                    "Fotocopy KTP Alm/Almh\n" .
                    "Surat Kematian dari Rumah Sakit / Puskesmas\n" .
                    "Fotocopy Surat Nikah (jika sudah menikah)\n" .
                    "Fotocopy KTP 2 orang saksi\n" .
                    "Form Isian dari Dinas Kependudukan",
            ],
            [
                'judul' => 'KETERANGAN AHLI WARIS',
                'syarat' =>
                    "Pengantar RT diketahui RW\n" .
                    "Fotocopy KK dan KTP ahli waris\n" .
                    "Fotocopy KK dan KTP Alm/Almh\n" .
                    "Fotocopy Surat Kematian\n" .
                    "Fotocopy Akta Lahir ahli waris\n" .
                    "Surat Pernyataan Ahli Waris bermaterai diketahui RT, RW, Kelurahan",
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
