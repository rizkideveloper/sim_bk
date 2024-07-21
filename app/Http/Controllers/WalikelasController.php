<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walikelas = DB::table('walikelas')->select(['*','walikelas.nama AS nama_walikelas','jurusan.nama AS nama_jurusan','kelas.nama AS nama_kelas','walikelas.id AS walikelas_id'])
        ->join('kelas', 'kelas.id', '=', 'walikelas.kelas_id')
        ->join('jurusan', 'jurusan.id', '=', 'kelas.Jurusan_id')
        ->get();

        // var_dump($walikelas);die;

        $data=[
            'title' => 'Data WaliKelas',
            'walikelas' => $walikelas
        ];
        return view('walikelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah',
            'kelas' => Kelas::all(),
            'jk' => ['L','P']
        ];
        return view('walikelas.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kelas_id' => 'required',
            'nip' => 'required|unique:walikelas',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Walikelas::create($validateData);
        return redirect('/walikelas')->with('success', 'Walikelas baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Walikelas $walikelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $walikelas = DB::table('walikelas')->select(['*','walikelas.nama AS nama_walikelas','jurusan.nama AS nama_jurusan','kelas.nama AS nama_kelas','walikelas.id AS walikelas_id'])
        ->join('kelas', 'kelas.id', '=', 'walikelas.kelas_id')
        ->join('jurusan', 'jurusan.id', '=', 'kelas.Jurusan_id')
        ->where('walikelas.id',$id)
        ->first();

        $data=[
            'title' => 'Form Edit',
            'kelas' => Kelas::all(),
            'walikelas' => $walikelas,
            'jk' => ['L','P']
        ];
        return view('walikelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $walikelas = Walikelas::find($id);
        if ($walikelas->nip === $request->nip) {
            $rules=[
                'kelas_id' => 'required',
                'nip' => 'required',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',    
            ];
        }else {
            $rules=[
                'kelas_id' => 'required',
                'nip' => 'required|unique:walikelas',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',    
            ];
        }

        $validateData = $request->validate($rules);

        Walikelas::where('id',$id)->update($validateData);
        return redirect('/walikelas')->with('success', 'Data walikelas berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Walikelas::destroy($id);
        return redirect('/walikelas')->with('success', 'Data walikelas berhasil dihapus!');
    }
}
