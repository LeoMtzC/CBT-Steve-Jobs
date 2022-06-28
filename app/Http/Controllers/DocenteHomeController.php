<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteHomeController extends Controller
{
    public function show()
    {
        return view('Docente.home.index');
    }
}
