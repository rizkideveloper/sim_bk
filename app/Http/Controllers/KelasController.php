<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'title' => 'Data Kelas',
            'kelas' => Kelas::all()
        ];
        return view('kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah',
            'jurusan' => Jurusan::all(),
            'nama_kelas' => ['X','XI','XII']
        ];
        return view('kelas.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'urutan' => 'required|max:1',
        ]);

        Kelas::create([
            'jurusan_id' => $request->jurusan,
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        return redirect('/kelas')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // var_dump($id);die;
        $data=[
            'title' => 'Form Edit',
            'jurusan' => Jurusan::all(),
            'kelas' => Kelas::find($id),
            'nama_kelas' => ['X','XI','XII']
        ];
        return view('kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'urutan' => 'required|max:1',
        ]);

        Kelas::where('id',$id)->update([
            'jurusan_id' => $request->jurusan,
            'nama' => $request->nama,
            'urutan' => $request->urutan,
        ]);

        return redirect('/kelas')->with('success', 'Data kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect('/kelas')->with('success', 'Data kelas berhasil dihapus!');
    }
}
