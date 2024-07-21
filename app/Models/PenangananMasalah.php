<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenangananMasalah extends Model
{
    use HasFactory;

    protected $table='penanganan_masalah';
    protected $guarded=['id'];
    protected $with=['siswa','walikelas','laporan'];

    public function siswa()
    {
        //relasi dari tabel Penanganan masalah ke table siswa
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Siswa::class);
    }

    //nama method walikelas foreignkey nya akan menjadi walikelas_id di tabel Penaganan Masalah
    public function walikelas()
    {
        //relasi dari tabel Penanganan masalah ke table walikelas
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Walikelas::class);
    }

    public function laporan()
    {
        //relasi dari tabel Penanganan masalah ke table laporan masalah
        //yang dititipkan (belongsTo)
        return $this->belongsTo(LaporanMasalah::class);
    }
}
