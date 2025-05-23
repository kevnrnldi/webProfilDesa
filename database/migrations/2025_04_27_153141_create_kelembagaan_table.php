<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kelembagaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelembagaan',60);
            $table->text('kegunaan');
            $table->string('gambar_bagan_struktur',100)->nullable(); // Kolom untuk menyimpan gambar bagan struktur
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelembagaan');
    }
};
