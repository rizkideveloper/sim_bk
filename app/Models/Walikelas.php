<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table='walikelas';
    protected $with=['kelas'];

    public function kelas()
    {
        //relasi dari tabel Walikelas ke table Kelas
        //yang dititipkan (belongsTo)
        return $this->belongsTo(Kelas::class);
    }
}
