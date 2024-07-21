<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        $data=[
            'title' => 'Login'
        ];
        return view('auth.login',$data);
    }


    public function authenticate(Request $request)
    { 
        $credentials = $request->validate([
            'email' =>'required|email:dns',
            'password' =>'required|min:8',
        ]);
   
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard.index'));
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('login.index'));
    }
}
