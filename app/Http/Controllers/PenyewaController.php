<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PenyewaController extends Controller
{
    public function dashboard(){

       //$request->Session()->flush();
        //dd(Auth::user());
    return view('penyewa.dashboard');
    }
}
