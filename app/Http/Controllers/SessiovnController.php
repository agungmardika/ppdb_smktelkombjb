<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessiovnController extends Controller
{
    function index(){
        return view('session.login');
    }

    function login(Request $request){

        $infologin = 
        [
            'penulis' => $request->penulis,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            # if berhasil
            return view('dashboard.index');
        } else {
            # else gagal
            return view('session.login');
        }
        
    }
}
