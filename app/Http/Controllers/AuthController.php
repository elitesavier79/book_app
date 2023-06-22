<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        //cek user apakah ada di tabel user
        if (Auth::attempt($credentials)) {
            //Cek apakah user sudah aktif
            if (Auth::User()->status != 'active') {
                
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session()->flash('status', 'Failed');
                Session()->flash('message', 'Akun kamu belum aktif');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->rule_id == 1) {
                return redirect('/admin');
            }

            if (Auth::user()->rule_id == 2) {
                return redirect('/penyewa');
            }

        }
        Session()->flash('status', 'Failed');
        Session()->flash('message', 'Email atau password kamu salah!!');
        return redirect('/login');

    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required|max:255',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session()->flash('status', 'Success');
        Session()->flash('message', 'Selamat anda telah berhasil register. Silakan tunggu 1X24 jam untuk mengaktif account');
        return redirect('/register');
        //dd($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
