<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table='siswa';
    protected $with=['kelas'];

    public function kelas()
    {
        //relasi dari tabel Siswa ke table Kelas
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Kelas::class);
    }
}
