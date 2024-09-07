<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    function index(){
        echo 'halaman index guru';
    }

    function guru(){
        echo 'Pak Rahman';
    }

    function mapel(){
        echo 'Pemrograman Web';
    }
}
