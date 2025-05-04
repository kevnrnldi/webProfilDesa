<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    // Menambahkan kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'judul',   // tambahkan kolom judul
        'visi',    // tambahkan kolom visi
        'misi',    // tambahkan kolom misi
    ];
}
