<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        if (! User::where('email', 'admin@kelurahan.com')->exists()) {
            User::create([
                'name'     => 'Admin',
                'email'    => 'admin@kelurahan.com',
                'password' => Hash::make('password123'),
                // Jika ada kolom role, tambahkan:
                // 'role'     => 'admin',
            ]);
        }
    }
}
