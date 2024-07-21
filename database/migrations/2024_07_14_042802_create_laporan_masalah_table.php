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
        Schema::create('laporan_masalah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->references('id')->on('siswa');
            $table->string('masalah');
            $table->enum('status',['Belum Ditangani','Sedang Ditangani','Sudah Ditangani']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_masalah');
    }
};
