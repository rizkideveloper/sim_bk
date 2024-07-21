<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'title' => 'Data Jurusan',
            'jurusan' => Jurusan::all()
        ];
        return view('jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah'
        ];
        return view('jurusan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required|unique:jurusan',
            'nama' => 'required',
        ]);

        Jurusan::create($validateData);
        return redirect('/jurusan')->with('success', 'Jurusan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        $data=[
            'title' => 'Form Edit',
            'jurusan' => Jurusan::find($jurusan->id)
        ];
        return view('jurusan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $jurusan = Jurusan::find($jurusan->id);
        if ($jurusan->kode == $request->kode) {
            $rules =[
                'kode' => 'required',
                'nama' => 'required',     
            ];
        }else {
            $rules =[
                'kode' => 'required|unique:jurusan',
                'nama' => 'required',     
            ];
        }
        $validateData = $request->validate($rules);

        Jurusan::where('id', $jurusan->id)->update($validateData);
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);
        return redirect('/jurusan')->with('success', 'Data jurusan berhasil dihapus!');
    }
}
