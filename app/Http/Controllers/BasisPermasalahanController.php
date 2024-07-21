<?php

namespace App\Http\Controllers;

use App\Models\BasisPermasalahan;
use Illuminate\Http\Request;

class BasisPermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =[
            'title' => 'Basis Permasalahan',
            'basisPermasalahan' => BasisPermasalahan::all()
        ];

        return view('basis_permasalahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah',
            'bobot' => ['Ringan'=>1,'Sedang' =>3,'Berat'=>5]
        ];

        return view('basis_permasalahan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'kode' => 'required|unique:basis_permasalahan',
            'masalah' => 'required',
            'bobot' => 'required',
            'penanganan' => 'required',
        ]);

        BasisPermasalahan::create($validatedData);

        return redirect('/basisPermasalahan')->with('success', 'Basis permasalahan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BasisPermasalahan $basisPermasalahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BasisPermasalahan $basisPermasalahan)
    {
        $data=[
            'title' => 'Form Edit',
            'basisPermasalahan' => BasisPermasalahan::find($basisPermasalahan->id),
            'bobot' => ['Ringan'=>1,'Sedang' =>3,'Berat'=>5]
        ];

        return view('basis_permasalahan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BasisPermasalahan $basisPermasalahan)
    {
        $basis = BasisPermasalahan::where('id', $basisPermasalahan->id)->first();
        
        if ($basis->kode == $request->kode) {
            $rules=[
                'kode' => 'required',
                'masalah' => 'required',
                'bobot' => 'required',
                'penanganan' => 'required',
            ];
        }else {
            $rules=[
                'kode' => 'required|unique:basis_permasalahan',
                'masalah' => 'required',
                'bobot' => 'required',
                'penanganan' => 'required',
            ];
        }

        $validatedData=$request->validate($rules);

        BasisPermasalahan::where('id', $basisPermasalahan->id)->update($validatedData);

        return redirect('/basisPermasalahan')->with('success', 'Basis permasalahan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BasisPermasalahan $basisPermasalahan)
    {
        BasisPermasalahan::destroy($basisPermasalahan->id);
        return redirect('/basisPermasalahan')->with('success', 'Basis permasalahan berhasil dihapus!');
    
    }
}
