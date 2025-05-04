<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'judul' => 'Visi dan Misi Desa Kersik',
            'visi' => 'Menjadi desa yang mandiri, berbudaya, dan sejahtera dengan kemajuan teknologi.',
            'misi' => '1. Meningkatkan kualitas pendidikan dan keterampilan masyarakat.\n2. Meningkatkan kesejahteraan masyarakat melalui pemberdayaan ekonomi.\n3. Melestarikan budaya lokal dan mengembangkan sektor pariwisata desa.\n4. Meningkatkan infrastruktur desa untuk kemudahan akses dan layanan publik.',
        ]);
    }
}
