<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemografiPenduduk extends Model
{
    use HasFactory;

    protected $table = 'demografi_penduduk';
    protected $fillable = ['kategori', 'subkategori', 'jumlah'];
}
