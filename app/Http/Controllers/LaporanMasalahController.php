<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\LaporanMasalah;
use App\Models\PenangananMasalah;
use App\Models\Siswa;
use App\Models\Tracking;
use App\Models\User;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanMasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walikelas = Walikelas::where('nip', auth()->user()->nip)->first();

        $kelas = Kelas::where('id', $walikelas->kelas_id)->first();

        $data =[
            'title' => 'Data Laporan Masalah',
            'laporan_masalah' => LaporanMasalah::orderBy('status','ASC')->get(),
            'kelas' => $kelas
        ];

        return view('laporan_masalah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $walikelas = Walikelas::where('nip', auth()->user()->nip)->first();
        $data =[
            'title' => 'Form Tambah',
            'siswa' => Siswa::where('kelas_id', $walikelas->kelas_id)->get()
        ];

        return view('laporan_masalah.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaSiswa' => 'required',
            'masalah' => 'required'
        ]);

        LaporanMasalah::create([
            'siswa_id' => $request->namaSiswa,
            'masalah' => $request->masalah,
            'status' => 'Belum Ditangani'
        ]);

        return redirect('/laporanMasalah')->with('success', 'Laporan masalah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanMasalah $laporanMasalah)
    {
        $kelas = DB::table('laporan_masalah as lm')->select('kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan')
        ->join('siswa','siswa.id','=','lm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->where('lm.id', $laporanMasalah->id)->first();

        $data=[
            'title' => 'Detail',
            'penanganan_masalah' => PenangananMasalah::where('laporan_id',$laporanMasalah->id)->first(),
            'kelas' => $kelas
        ];
        return view('laporan_masalah.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanMasalah $laporanMasalah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanMasalah $laporanMasalah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanMasalah $laporanMasalah)
    {
        LaporanMasalah::destroy($laporanMasalah->id);
        return redirect('/laporanMasalah')->with('success', 'Laporan masalah berhasil dihapus!');
    }

    public function kirim_laporan($id_laporan, $id_siswa)
    {

        LaporanMasalah::where('id', $id_laporan)->update([
            'status' => 'Sedang Ditangani'
        ]);

        $siswa = Siswa::find($id_siswa);
        $kelas_id = $siswa->kelas->id;
        $walikelas = Walikelas::where('kelas_id', $kelas_id)->first(); 

        PenangananMasalah::create([
            'siswa_id' => $id_siswa,
            'walikelas_id' => $walikelas->id,
            'laporan_id' => $id_laporan,
            'penanganan' => '-',
            'status' => 'Sedang Ditangani'
        ]);

        return redirect('/laporanMasalah')->with('success', 'Laporan masalah berhasil dikirim!');

    }
}
