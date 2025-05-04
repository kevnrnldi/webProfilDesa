<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demografi_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori',60);  // Misalnya "Kelompok Umur", "Pendidikan", dll
            $table->string('subkategori',60);  // Misalnya "19-25 tahun", "SD", dll
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografi_penduduk');
    }
};
