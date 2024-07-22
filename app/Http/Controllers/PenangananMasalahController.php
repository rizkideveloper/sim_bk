<?php

namespace App\Http\Controllers;

use App\Models\BasisPermasalahan;
use App\Models\LaporanMasalah;
use App\Models\PenangananMasalah;
use App\Models\Tracking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenangananMasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penanganan_masalah = DB::table('penanganan_masalah as pm')
        ->select('pm.*','pm.id as id_penanganan','pm.status','pm.created_at','siswa.nama as nama_siswa','kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan','walikelas.nama as nama_walikelas','lm.masalah')
        ->join('siswa','siswa.id','=','pm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->join('walikelas', 'walikelas.id','=','pm.walikelas_id')
        ->join('laporan_masalah as lm','lm.id','=','pm.laporan_id')
        ->orderBy('status', 'ASC')
        ->get();

        $data =[
            'title' => 'Penanganan Masalah',
            'penanganan_masalah' => $penanganan_masalah,
        ];

        return view('penanganan_masalah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PenangananMasalah $penangananMasalah)
    {
        $kelas = DB::table('penanganan_masalah as pm')->select('kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan')
        ->join('siswa','siswa.id','=','pm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->where('pm.id', $penangananMasalah->id)->first();

        $data=[
            'title' => 'Detail',
            'penanganan_masalah' => PenangananMasalah::find($penangananMasalah->id),
            'kelas' => $kelas
        ];
        return view('penanganan_masalah.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenangananMasalah $penangananMasalah)
    {
        $penanganan_masalah = PenangananMasalah::find($penangananMasalah->id);

        $kelas = DB::table('penanganan_masalah as pm')->select('kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan')
        ->join('siswa','siswa.id','=','pm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->where('pm.id', $penangananMasalah->id)->first();

        $data =[
            'title' => 'Form Penangan Masalah',
            'penanganan_masalah' => $penanganan_masalah,
            'basis_masalah' => BasisPermasalahan::all(),
            'kelas' => $kelas
        ];

        return view('penanganan_masalah.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenangananMasalah $penangananMasalah)
    {
        
        $validator = Validator::make($request->all(),[
            'kode' => 'required|unique:basis_permasalahan', 
            'bobot' => 'required|numeric', 
            'penanganan' => 'required', 
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 402,
                'errors' => $validator->errors()
            ];

            return response()->json($data);
        }

        BasisPermasalahan::create([
            'kode' => $request->kode,
            'masalah' => $request->masalah,
            'bobot' => $request->bobot,
            'penanganan' => $request->penanganan,
        ]);

        PenangananMasalah::where('id',$penangananMasalah->id)->update([
            'status' => 'Sudah Ditangani',
            'penanganan' => $request->penanganan
        ]);

        $penanganan_masalah= PenangananMasalah::find($penangananMasalah->id);

        LaporanMasalah::where('id',$penanganan_masalah->laporan_id)->update([
            'status' => 'Sudah Ditangani'
        ]);

        $data = [
                'status' => 200
            ];

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenangananMasalah $penangananMasalah)
    {
        //
    }

    public function check_KategoriMasalah(Request $request)
    {

        $basisMasalah = BasisPermasalahan::find($request->kategori_masalah);

        if ($basisMasalah) {
            PenangananMasalah::where('id', $request->id_penanganan)->update([
                'status' => 'Sudah Ditangani',
                'penanganan' => $basisMasalah->penanganan
            ]);

            $penanganan=PenangananMasalah::find($request->id_penanganan);

            LaporanMasalah::where('id', $penanganan->laporan_id )->update([
                'status' => 'Sudah Ditangani',
            ]);

            $data=[
                'status' => 1
            ];
        }else {
            $data=[
                'status' => 0,
                'bobot' => ['Ringan'=>1,'Sedang' =>3,'Berat'=>5]
            ];
        }

        return response()->json($data);
    }

    public function cetakPdf()
    {
        $penanganan_masalah = DB::table('penanganan_masalah as pm')->select('pm.*','kelas.nama as nama_kelas','kelas.urutan as nama_urutan','jurusan.nama as nama_jurusan','walikelas.nama as nama_walikelas','siswa.nama as nama_siswa','lm.masalah')
        ->join('laporan_masalah as lm','lm.id','=','pm.laporan_id')
        ->join('walikelas','walikelas.id','=','pm.walikelas_id')
        ->join('siswa','siswa.id','=','pm.siswa_id')
        ->join('kelas','kelas.id','=','siswa.kelas_id')
        ->join('jurusan','jurusan.id','=','kelas.jurusan_id')
        ->where('pm.status', 'Sudah Ditangani')
        ->get();

        $data=[
            'title' => 'Penaganan Masalah',
            'penanganan_masalah' =>$penanganan_masalah,
            'tanggal_cetak' =>date('d F Y')
        ];
        
        $pdf = Pdf::loadview('penanganan_masalah.cetakPdf', $data);
        return $pdf->stream(date('dmY').'cetak_penanganan_masalah.pdf');
    }
}
