<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    public function show_ForgotPassword() 
    {
        $data=[
            'title' => 'Forgot Password'        ];
       return view('auth.forgot_password',$data); 
    }

    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns'
        ]);

        $user_email=User::where('email', $request->email)->first();
        if (!$user_email) {
            return back()->with('emailError', 'Reset password failed!');
        }

        $data=[
            'subject' => 'Reset Password',
            'title' => 'Tekan tombol reset password',
            'email' => $request->email
        ];
        Mail::to($request->email)->send(new SendEmail($data));

        return back()->with('send_ResetSuccess', 'Silahkan cek email anda!');

    }

    public function add_NewPassword($email)
    {
        
        $data=[
            'email' => $email
        ];
        return view('auth.add_NewPassword', $data);
    }

    public function update_NewPassword(Request $request, $email)
    {
        $request->validate([
            'password' => 'required|min:8',
            'konfirmasi_password' => 'required|same:password'
        ]);
        $password = password_hash($request->password,PASSWORD_DEFAULT);
        User::where('email', $email)->update([
            'password' => $password
        ]);

        return redirect('/')->with('resetSuccess', 'Password berhasil diubah!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect(route('login.index'));
    }
}
