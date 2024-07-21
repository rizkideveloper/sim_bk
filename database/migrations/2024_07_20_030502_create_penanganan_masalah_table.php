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
        Schema::create('penanganan_masalah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->references('id')->on('siswa');
            $table->foreignId('walikelas_id')->references('id')->on('walikelas');
            $table->foreignId('laporan_id')->references('id')->on('laporan_masalah');
            $table->string('penanganan');
            $table->enum('status',['Sedang Ditangani','Sudah Ditangani']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganan_masalah');
    }
};
