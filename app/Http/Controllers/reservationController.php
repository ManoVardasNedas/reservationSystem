<?php

namespace App\Http\Controllers;

use App\specialist;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    public function show_res_create()
    {
        $specialists = specialist::all();
        return view('reservationCreate', compact('specialists'));
    }
}
