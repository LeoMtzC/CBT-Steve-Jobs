<?php

namespace App\Http\Controllers;

class AlumnoHomeController extends Controller
{
    public function index()
    {
        return view('Alumno.home.index');
    }
}
