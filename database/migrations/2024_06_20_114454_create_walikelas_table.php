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
        Schema::create('walikelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->references('id')->on('kelas');
            $table->string('nip',20);
            $table->string('nama',100);
            $table->enum('jenis_kelamin',['L','P']);
            $table->text('alamat');
            $table->string('no_telp',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walikelas');
    }
};
