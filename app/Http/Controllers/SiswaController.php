<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = DB::table('siswa')->select(['*','siswa.nama AS nama_siswa','jurusan.nama AS nama_jurusan','kelas.nama AS nama_kelas','siswa.id AS siswa_id'])
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->join('jurusan', 'jurusan.id', '=', 'kelas.jurusan_id')
        ->get();

        $data=[
            'title' => 'Data Siswa',
            'siswa' => $siswa
        ];
        return view('siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah',
            'kelas' => Kelas::all(),
            'jenis_kelamin' => ['L','P']
        ];
        return view('siswa.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kelas_id' =>'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Siswa::create($validateData);
        return redirect('/siswa')->with('success', 'Siswa baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $siswa = DB::table('siswa')->select(['*','siswa.nama AS nama_siswa','jurusan.nama AS nama_jurusan','kelas.nama AS nama_kelas','siswa.id AS siswa_id'])
        ->where('siswa.id', $siswa->id)
        ->join('kelas', 'kelas.id', '=', 'siswa.kelas_id')
        ->join('jurusan', 'jurusan.id', '=', 'kelas.jurusan_id')
        ->first();

        $data=[
            'title' => 'Form Edit',
            'kelas' => Kelas::all(),
            'siswa' => $siswa,
            'jenis_kelamin' => ['L','P'] 
        ];
        return view('siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validateData = $request->validate([
            'kelas_id' =>'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Siswa::where('id', $siswa->id)->update($validateData);
        return redirect('/siswa')->with('success', 'Siswa baru berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus!');
    }
}
