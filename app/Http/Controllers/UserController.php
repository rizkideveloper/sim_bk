<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[
            'title' => 'Data Pengguna',
            'user' => User::all()
        ];
        return view('user.index', $data);
    }

    public function profile()
    {
        $data=[
            'title' => 'My Profile',
            'user' => User::all(),
            'user_role' => Role::where('id',auth()->user()->role_id )->first()
        ];
        return view('user.profile', $data);
    }

    public function editPassword(Request $request)
    {

        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $id_user = auth()->user()->id;
        $password_user = User::where('id', $id_user)->first();
        
        if (password_verify($request->password_lama, $password_user->password)) {

            if ($request->password_baru === $request->password_lama) {
                return redirect(route('profile'))->with('changePasswordError', 'Change Password Failed!');
            }

            $pass_baru = password_hash($request->password_baru,PASSWORD_DEFAULT);
            User::where('id',$id_user)->update(['password' => $pass_baru ]);

            return redirect(route('profile'))->with('changePasswordSuccess', 'Change Password Success');
        }

        return redirect(route('profile'))->with('changePasswordError', 'Change Password Failed!');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data=[
            'title' => 'Form Tambah',
            'role' => DB::table('role')->get()
        ];
        return view('user.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required',
            'password' => 'required|min:8',
            'password_confirm' => 'required|min:8|same:password',
        ]);

        

        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'role_id' => $request->role,
            'password' => $request->password,
        ]);

        return redirect('/user')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=[
            'title' => 'Form Edit',
            'role' => DB::table('role')->get(),
            'user' => User::find($id)
        ];
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = User::find($id);
        if ($request->email === $user_id->email || $request->nip === $user_id->nip ) {
            $rules = [
                'nip' => 'required',
                'nama' => 'required',
                'email' => 'required|email:dns',
                'role' => 'required',
            ];
        }else {
            $rules = [
                'nip' => 'required|unique:users',
                'nama' => 'required',
                'email' => 'required|email:dns|unique:users',
                'role' => 'required',
            ];
        }

        $request->validate($rules);

        User::where('id', $id)->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'role_id' => $request->role,
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/user')->with('success', 'Data user berhasil dihapus!');
    }
}
