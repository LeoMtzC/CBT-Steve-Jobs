<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
{
    //DATOS
    public function showDatosP()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.datos.datosP', ['semestreAlumno' => $semestre]);
    }

    public function showDatosT()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.datos.datosT', ['semestreAlumno' => $semestre]);
    }

    public function showEscenarioR()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.datos.escenarioR', ['semestreAlumno' => $semestre]);
    }

    public function showSubirDocs()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.datos.subirD', ['semestreAlumno' => $semestre]);
    }

    //GENERAR
    public function showGBitacora()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.bitacora', ['semestreAlumno' => $semestre]);
    }

    public function descargarArchivo($archivo, $nombre)
    {
        $filePath = public_path("pdf/$archivo");
        $headers = ['Content-Type: application/pdf'];
        $fileName = $nombre;

        return response()->download($filePath, $fileName, $headers);
    }

    public function showGCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaAcep', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaAut', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaPres', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaTer()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaTer', ['semestreAlumno' => $semestre]);
    }

    public function showGInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.informe', ['semestreAlumno' => $semestre]);
    }

    public function showGPermiso()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.permiso', ['semestreAlumno' => $semestre]);
    }

    //SUBIR
    public function showSPermiso()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.permiso', ['semestreAlumno' => $semestre]);
    }

    public function showSGuiaObs()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.guiaObs', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaAut', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaPres', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaAcep', ['semestreAlumno' => $semestre]);
    }

    public function showSConstaTer()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.consTer', ['semestreAlumno' => $semestre]);
    }

    public function showSInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.informe', ['semestreAlumno' => $semestre]);
    }

    public function showSBitacora()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.bitacoras', ['semestreAlumno' => $semestre]);
    }

    public function showSMTP()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id','=','users.id')
            ->where('alumnos.id','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.MTP', ['semestreAlumno' => $semestre]);
    }
}
