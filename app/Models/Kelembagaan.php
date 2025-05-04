<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelembagaan extends Model
{
    use HasFactory;
    protected $table = 'kelembagaan'; // Nama tabel di database
    protected $fillable = ['nama_kelembagaan', 'kegunaan', 'gambar_bagan_struktur'];
}

