<?php

namespace App\Http\Controllers;

class AlumnoHomeController extends Controller
{
    public function show()
    {
        return view('Alumno.home.index');
    }
}
