<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KataSambutan;

class KataSambutanSeeder extends Seeder
{
    public function run(): void
    {
        KataSambutan::create([
            'judul' => 'Kata Sambutan Lurah',
            'isi' => 'Selamat datang di website resmi Kelurahan kami. Kami berkomitmen untuk memberikan pelayanan yang terbaik dan transparan kepada masyarakat. Terima kasih atas kepercayaan Anda.',
        ]);
    }
}
