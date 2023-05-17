<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    Public function register()
    {
        return view('auth.register');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email'     =>['required'],
            'password'  =>['required']
        ]);
        //cek user apakah ada di tabel user
        if (Auth::attempt($credentials)) {
            //Cek apakah user sudah aktif
            if(Auth::User()->status !='active'){
                Session()->flash('status', 'Failed');
                Session()->flash('message', 'Akun kamu belum aktif');
                return redirect('/login');
            }
            
            //$request->session()->regenerate();
           if(Auth::user()->rule_id == 1){
            return redirect('/admin');
           }

           if(Auth::user()->rule_id == 2){
            return redirect('/penyewa');
           }
            
        }
            Session()->flash('status', 'Failed');
            Session()->flash('message', 'Email atau password kamu salah!!');
            return redirect('/login');

    }

    Public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         return redirect('/login');
    }
    

}