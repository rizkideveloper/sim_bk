<?php

namespace App\Http\Controllers;

use App\Models\LaporanMasalah;
use App\Models\PenangananMasalah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $laporan_masalah = DB::table('laporan_masalah as lm')->select('lm.*','kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan','siswa.nama as nama_siswa','walikelas.nama as nama_walikelas')
        ->join('siswa','siswa.id','=','lm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('walikelas','walikelas.kelas_id','=','kelas.id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->orderBy('status','DESC')
        ->get();

        $data=[
            'users' => User::count(),
            'sudah_ditangani' => PenangananMasalah::where('status', 'Sudah Ditangani')->count(),
            'sedang_ditangani' => PenangananMasalah::where('status', 'Sedang Ditangani')->count(),
            'belum_ditangani' => LaporanMasalah::where('status', 'Belum Ditangani')->count(),
            'laporan_masalah' => $laporan_masalah,
            'title' => 'Dashboard'
        ];
        return view('dashboard.index', $data);
    }

}
