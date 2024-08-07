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
        Schema::table('basis_permasalahan', function (Blueprint $table) {
            $table->tinyInteger('bobot')->after('masalah');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basis_permasalahan', function (Blueprint $table) {
            $table->dropColumn('bobot');
        
        });
    }
};
