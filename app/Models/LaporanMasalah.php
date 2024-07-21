<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasalah extends Model
{
    use HasFactory;
    protected $table='laporan_masalah';
    protected $guarded=['id'];
    protected $with=['siswa'];

    public function siswa()
    {
        //relasi dari tabel Laporan masalah ke table siswa
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Siswa::class);
    }
}
