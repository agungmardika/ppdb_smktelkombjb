<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateTimeController extends Controller
{
    public function showDateTime()
    {
        return view('datetime');
    }
}
