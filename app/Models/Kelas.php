<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table='kelas';
    protected $with=['jurusan'];

    public function jurusan()
    {
        //relasi dari tabel kelas ke table Jurusan
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Jurusan::class);
    }
}
