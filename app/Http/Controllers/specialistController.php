<?php

namespace App\Http\Controllers;

use App\reservation;
use App\specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class specialistController extends Controller
{
    public function showSpecialistView()
    {

        return view('specialist');
    }
}
