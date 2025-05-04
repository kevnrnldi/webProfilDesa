<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama (opsional)
        StrukturOrganisasi::truncate();

        // Buat data awal dengan placeholder null (akan tampil "Data belum diisi")
        StrukturOrganisasi::create([
            'gambar' => null,
        ]);

        // Atau, jika ingin memasukkan placeholder gambar:
        // StrukturOrganisasi::create([
        //     'gambar' => 'placeholder.png',
        // ]);
    }
}
