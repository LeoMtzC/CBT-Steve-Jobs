<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
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
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Asignación de carreras de acuerdo al ID de carrera
        if($datosAlumno[0] -> id_carrera == 1 ){
            $carrera =  "Técnico en informática";
        }else{
            $carrera =  "Técnico en expresión gráfica digital";
        }

        //Query para obtener los datos domiciliarios del alumno
        $datosDomicilio = DB::table('alumnos')->join('domicilios', function($join){
            $join->on('alumnos.id_domicilio','=','domicilios.id')
            ->where('alumnos.id_domicilio','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener los estados y municipios
        $estados  = DB::table('estados')->get();
        $municipios  = DB::table('municipios')->get();
        
        
        return view('Alumno.datos.datosP', [
            'semestreAlumno' => $semestre,
            'datosAlumno' => $datosAlumno,
            'datosDomicilio' => $datosDomicilio,
            'carrera' => $carrera,
            'estados' => $estados,
            'municipios' => $municipios
        ]);
    }

    public function showDatosT()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener los datos del tutor del alumno logeado
        $datosTutor = DB::table('alumnos')->join('datos_tutores', function($join){
            $join->on('alumnos.id_tutor','=','datos_tutores.id')
            ->where('alumnos.id_tutor','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener los parentezcos
        $parentescos  = DB::table('parentescos')->get();
        
        return view('Alumno.datos.datosT', [
                'semestreAlumno' => $semestre,
                'datosTutor' => $datosTutor,
                'parentescos' => $parentescos,
            ]
        );
    }

    public function showEscenarioR()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener los datos del escenario del alumno logeado
        $datosEscenario = DB::table('alumnos')->join('escenarios', function($join){
            $join->on('alumnos.id_escenario','=','escenarios.id')
            ->where('alumnos.id_escenario','=',Auth::user()->id);
        })
        ->get();
      
        return view('Alumno.datos.escenarioR', [
            'semestreAlumno' => $semestre,
            'datosEscenario' => $datosEscenario,
            ]
        );
    }

    public function showSubirDocs()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.datos.subirD', ['semestreAlumno' => $semestre]);
    }

    //GENERAR
    public function showGBitacora()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.bitacora', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaAcep', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaAut', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaPres', ['semestreAlumno' => $semestre]);
    }

    public function showGCartaTer()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.cartaTer', ['semestreAlumno' => $semestre]);
    }

    public function showGInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.informe', ['semestreAlumno' => $semestre]);
    }

    public function showGPermiso()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.generar.permiso', ['semestreAlumno' => $semestre]);
    }

    //SUBIR
    public function showSPermiso()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.permiso', ['semestreAlumno' => $semestre]);
    }

    public function showSGuiaObs()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.guiaObs', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaAut', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaPres', ['semestreAlumno' => $semestre]);
    }

    public function showSCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.cartaAcep', ['semestreAlumno' => $semestre]);
    }

    public function showSConstaTer()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.consTer', ['semestreAlumno' => $semestre]);
    }

    public function showSInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.informe', ['semestreAlumno' => $semestre]);
    }

    public function showSBitacora()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.bitacoras', ['semestreAlumno' => $semestre]);
    }

    public function showSMTP()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;
        
        return view('Alumno.subir.MTP', ['semestreAlumno' => $semestre]);
    }


    //Función para descargar un archivo
    public function descargarArchivo($archivo, $nombre)
    {
        $filePath = public_path("pdf/$archivo");
        $headers = ['Content-Type: application/pdf'];
        $fileName = $nombre;

        return response()->download($filePath, $fileName, $headers);
    }

    //Función para actualizar datos personales alumno
    public function actualizarDatosPersonales(Request $request)
    {
        DB::table('alumnos')
            ->where('id_usuario', Auth::user()->id)
            ->updateOrInsert(
                ['nombre' => $request->nomAlu, 'matricula' => $request->matrAlu,],
                [ 'curp' => $request->curpAlu,
                  'correo' => $request->emailAlu,
                  'telefono' => $request->telAlu,
                  'fecha_nac' => $request->fechNacAlu,
                  'nss' => $request->nssAlu,
                  'seguro_med' => $request->segMedAlu,
                ]
        );
        return redirect()->back()->with('success','Datos actualizados correctamente');
    }

    //Función para actualizar datos domiciliarios alumno
    public function actualizarDatosDomicilio(Request $request)
    {
        DB::table('domicilios')
            ->where('id', $request->idDomicilio)
            ->updateOrInsert(
                ['id' => $request->idDomicilio, 'colonia' => $request->coloniaAlu,],
                [ 'id_estado' => $request->estadoAlu,
                  'id_muni' => $request->municipioAlu,
                  'calle' => $request->calleAlu,
                  'colonia' => $request->coloniaAlu,
                  'cp' => $request->cpAlu,
                  'no_ext' => $request->numExAlu,
                  'no_int' => $request->numInAlu,
                ]
        );
        return redirect()->back()->with('success','Datos actualizados correctamente');
    }

    //Función para actualizar datos domiciliarios alumno
    public function actualizarDatosTutor(Request $request)
    {
        DB::table('datos_tutores')
            ->where('id', $request->idTutor)
            ->updateOrInsert(
                ['id' => $request->idTutor, 'curp' => $request->curpTut,],
                [ 'nombre' => $request->nomTut,
                  'apPat' => $request->apPatTut,
                  'apMat' => $request->apMatTut,
                  'correo' => $request->emailTut,
                  'curp' => $request->curpTut,
                  'telf_movil' => $request->celTut,
                  'telf_fijo' => $request->telTut,
                  'id_parentesco' => $request->parentTut,
                ]
        );
        return redirect()->back()->with('success','Datos actualizados correctamente');
    }

    //Función para actualizar datos del escenario real del alumno
    public function actualizarDatosEscenario(Request $request)
    {
        DB::table('escenarios')
            ->where('id', $request->idER)
            ->updateOrInsert(
                ['id' => $request->idER, 'nombreResp' => $request->respER,],
                [ 'nombreEsc' => $request->nomER,
                  'direccion' => $request->dirER,
                  'telefono' => $request->telER,
                  'nombreResp' => $request->respER,
                  'apPatResp' => $request->apPatER,
                  'apMatResp' => $request->apMatER,
                  'fecha_ini' => $request->fechIniER,
                  'fecha_term' => $request->fechTerER
                ]
        );
        return redirect()->back()->with('success','Datos actualizados correctamente');
    }
}