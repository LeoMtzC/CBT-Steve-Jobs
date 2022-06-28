<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoHomeController extends Controller
{
    public function show()
    {
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.home.index', ['semestreAlumno' => $semestre]);
    }
}
