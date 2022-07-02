<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Facades\File;

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
        $datosDomicilio = DB::table('domicilios')->join('alumnos', function($join){
            $join->on('domicilios.id','=','alumnos.id_domicilio')
            ->where('domicilios.id','=',
            DB::table('alumnos')->join('users', function($join){
                $join->on('alumnos.id_usuario','=','users.id')
                ->where('alumnos.id_usuario','=',Auth::user()->id);
            })->first()->id_domicilio
        );// Se utiliza un subquery para obtener el id_domicilio del usuario logeado
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
            ->where('alumnos.id_tutor','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_tutor
            ); // Se utiliza un subquery para obtener el id_tutor del usuario logeado
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
            ->where('alumnos.id_escenario','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_escenario
            );// Se utiliza un subquery para obtener el id_escenario del usuario logeado
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

        //Query para obtener los datos de los archivos del alumno logeado
        $datosArchivos = DB::table('alumnos')->join('docs_alumnos', function($join){
            $join->on('alumnos.id_docs','=','docs_alumnos.id')
            ->where('alumnos.id_docs','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_docs
            ); // Se utiliza un subquery para obtener el id_docs del usuario logeado
        })
        ->get();


        
        return view('Alumno.datos.subirD', ['semestreAlumno' => $semestre, 'datosArchivos' => $datosArchivos]);
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
            //->where('id_usuario', Auth::user()->id)
            ->updateOrInsert(
                ['nombre' => $request->nomAlu, 'matricula' => $request->matrAlu,],
                [ 'curp' => $request->curpAlu,
                  'correo' => $request->emailAlu,
                  'telefono' => $request->telAlu,
                  'fecha_nac' => $request->fechNacAlu,
                  'nss' => $request->nssAlu,
                  'seguro_med' => $request->segMedAlu
                ]
        );
        return redirect()->back()->with('success','Datos actualizados correctamente');
    }

    //Función para actualizar datos domiciliarios alumno
    public function actualizarDatosDomicilio(Request $request)
    {
        //Si es una actualización se obtiene el ID
        if($request->idDomicilio){
            DB::table('domicilios')
                ->where('id', $request->idDomicilio)
                ->update(
                    [
                        'id_estado' => $request->estadoAlu,
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
        //Si es una creación se obtiene el autoincrement ID del insert
        $id = DB::table('domicilios')->insertGetId([
            'id_estado' => $request->estadoAlu,
            'id_muni' => $request->municipioAlu,
            'calle' => $request->calleAlu,
            'colonia' => $request->coloniaAlu,
            'cp' => $request->cpAlu,
            'no_ext' => $request->numExAlu,
            'no_int' => $request->numInAlu
        ]);
        //Se actualiza la tabla alumnos con el id del insert
        DB::table('alumnos')
        ->where('id_usuario', Auth::user()->id)
        ->update(
            [
                'id_domicilio' => $id,
            ]
        );
        return redirect()->back()->with('success','Datos guardados correctamente');
    }

    //Función para actualizar datos domiciliarios alumno
    public function actualizarDatosTutor(Request $request)
    {
        //Si es una actualización se obtiene el ID
        if($request->idTutor){
            DB::table('datos_tutores')
            ->where('id', $request->idTutor)
            ->update(
                [
                    'nombre' => $request->nomTut,
                    'apPat' => $request->apPatTut,
                    'apMat' => $request->apMatTut,
                    'correo' => $request->emailTut,
                    'curp' => $request->curpTut,
                    'telf_movil' => $request->celTut,
                    'telf_fijo' => $request->telTut,
                    'id_parentesco' => $request->parentTut
                ]
            );
            return redirect()->back()->with('success','Datos actualizados correctamente');
        }
        //Si es una creación se obtiene el autoincrement ID del insert
        $id = DB::table('datos_tutores')->insertGetId([
            'nombre' => $request->nomTut,
            'apPat' => $request->apPatTut,
            'apMat' => $request->apMatTut,
            'correo' => $request->emailTut,
            'curp' => $request->curpTut,
            'telf_movil' => $request->celTut,
            'telf_fijo' => $request->telTut,
            'id_parentesco' => $request->parentTut
        ]);
        //Se actualiza la tabla alumnos con el id del insert
        DB::table('alumnos')
        ->where('id_usuario', Auth::user()->id)
        ->update(
            [
                'id_tutor' => $id,
            ]
        );
        return redirect()->back()->with('success','Datos guardados correctamente');        
    }

    //Función para actualizar datos del escenario real del alumno
    public function actualizarDatosEscenario(Request $request)
    {
        //Si es una actualización se obtiene el ID
        if($request->idER){
            DB::table('escenarios')
            ->where('id', $request->idER)
            ->update(
                [
                    'nombreEsc' => $request->nomER,
                    'direccion' => $request->dirER,
                    'telefono' => $request->telER,
                    'nombreResp' => $request->respER,
                    'apPatResp' => $request->apPatER,
                    'apMatResp' => $request->apMatER,
                    'cargoResp' => $request->cargoER,
                    'fecha_ini' => $request->fechIniER,
                    'fecha_term' => $request->fechTerER
                ]
            );
            return redirect()->back()->with('success','Datos actualizados correctamente');
        }
        //Si es una creación se obtiene el autoincrement ID del insert
        $id = DB::table('escenarios')->insertGetId([
            'nombreEsc' => $request->nomER,
            'direccion' => $request->dirER,
            'telefono' => $request->telER,
            'nombreResp' => $request->respER,
            'apPatResp' => $request->apPatER,
            'apMatResp' => $request->apMatER,
            'cargoResp' => $request->cargoER,
            'fecha_ini' => $request->fechIniER,
            'fecha_term' => $request->fechTerER
        ]);
        //Se actualiza la tabla alumnos con el id del insert
        DB::table('alumnos')
        ->where('id_usuario', Auth::user()->id)
        ->update(
            [
                'id_escenario' => $id,
            ]
        );
        return redirect()->back()->with('success','Datos guardados correctamente');        
    }

    public function GenerarCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $numSemestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        switch($numSemestre){
            case 2 :
                $semestre = 'segundo';
            break;
            case 3 :
                $semestre = 'tercer';
            break;
            case 4 :
                $semestre = 'cuarto';
            break;
            case 5 :
                $semestre = 'quinto';
            break;
            case 6 :
                $semestre = 'sexto';
            break;
        }

        //Obtener la fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fecha  = now();
        $mes    = $fecha->monthName;
        $anio   = $fecha->year;
        $dia    = $fecha->dayName;
        $diaNumero = $fecha->day;
        $fechaActual = $dia." ".$diaNumero." de ".$mes." de ".$anio;
        //$fechaActual = Carbon::now()->locale('es_MX')->isoFormat('d \d\e MMMM \d\e\l Y');

        //Query para obtener los datos del tutor del alumno logeado
        $datosTutor = DB::table('alumnos')->join('datos_tutores', function($join){
            $join->on('alumnos.id_tutor','=','datos_tutores.id')
            ->where('alumnos.id_tutor','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_tutor
            ); // Se utiliza un subquery para obtener el id_tutor del usuario logeado
        })
        ->get();

        //Si no hay datos de tutor, cortamos el flujo y regresamos un mensaje de error
        if(!$datosTutor->first()){
            return redirect()->back()->with('error','Datos faltantes para generar documento. ¿Actualizaste los datos de tu tutor?');
        }

        //Query para obtener los datos del grupo del alumno logeado
        $datosGrupo = DB::table('alumnos')->join('grupos', function($join){
            $join->on('alumnos.id_grupo','=','grupos.id')
            ->where('alumnos.id_grupo','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_grupo
            ); // Se utiliza un subquery para obtener el id_grupo del usuario logeado
        })
        ->get();

        //Query para obtener los datos del escenario del alumno logeado
        $datosEscenario = DB::table('alumnos')->join('escenarios', function($join){
            $join->on('alumnos.id_escenario','=','escenarios.id')
            ->where('alumnos.id_escenario','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_escenario
            ); // Se utiliza un subquery para obtener el id_grupo del usuario logeado
        })
        ->get();

        //Si no hay datos de escenario, cortamos el flujo y regresamos un mensaje de error
        if(!$datosEscenario->first()){
            return redirect()->back()->with('error','Datos faltantes para generar documento. ¿Actualizaste los datos de tu escenario real?');
        }

        //formato fecha inicial del escenario
        $fechaIni = $datosEscenario[0]->fecha_ini;
        $fechaIni = str_replace("/", "-", $fechaIni); 
        $newfechaIni = date("d-m-Y", strtotime($fechaIni)); 
        $fechaInicial = strftime("%d de %B de %Y", strtotime($newfechaIni));

        //formato fecha de termino del escenario
        $fechaTerm = $datosEscenario[0]->fecha_term;
        $fechaTerm = str_replace("/", "-", $fechaTerm); 
        $newfechaTerm = date("d-m-Y", strtotime($fechaTerm)); 
        $fechaTermino = strftime("%d de %B de %Y", strtotime($newfechaTerm));

        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //determinando el ciclo escolar
        $anioActual = Carbon::now()->year;
        $anioActualmenosUno = Carbon::now()->subYear()->year();
        //Si la fecha actual está entre la fecha 1 de Enero y
        //1 de Junio de cualquier año, entonces el ciclo escolar es
        //el (año actual menos 1 año) - (año actual), si no se cumple
        //esta condición, entonces el ciclo escolar es
        //(año actual) - (año actual)
        $startDate = \Carbon\Carbon::createFromFormat('m-d','01-01');
        $endDate = \Carbon\Carbon::createFromFormat('m-d','06-01');
        $check = \Carbon\Carbon::now()->between($startDate,$endDate);
        if($check){
            $cicloEscolar = (string)"$anioActualmenosUno - $anioActual";
        }else{
            $cicloEscolar = (string)"$anioActual - $anioActual";
        }

        //Asignación de carreras de acuerdo al ID de carrera
        if($datosAlumno[0] -> id_carrera == 1 ){
            $carrera =  "Técnico en Informática";
        }else{
            $carrera =  "Técnico en Expresión Gráfica Digital";
        }

        switch($numSemestre){
            case 2 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_AUT/FORMATO_CARTA_AUT_PE.docx"));
            break;
            case 3 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_AUT/FORMATO_CARTA_AUT_PE.docx"));
            break;
            case 4 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_AUT/FORMATO_CARTA_AUT_PE.docx"));
            break;
            case 5 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_AUT/FORMATO_CARTA_AUT_SS.docx"));
            break;
            case 6 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_AUT/FORMATO_CARTA_AUT_EP.docx"));
            break;
        }

        $plantilla->setValue('fechaActual', $fechaActual);
        $plantilla->setValue('nombreTutor', $datosTutor[0]->nombre);
        $plantilla->setValue('apPatTutor', $datosTutor[0]->apPat);
        $plantilla->setValue('apMatTutor', $datosTutor[0]->apMat);
        $plantilla->setValue('nombreAlumno', $datosAlumno[0]->nombre);
        $plantilla->setValue('apPatAlumno', $datosAlumno[0]->apPat);
        $plantilla->setValue('apMatAlumno', $datosAlumno[0]->apMat);
        $plantilla->setValue('semestreAlumno', $semestre);
        $plantilla->setValue('carreraAlumno', $carrera);
        $plantilla->setValue('grupoAlumno', $datosGrupo[0]->grupo);
        $plantilla->setValue('cicloEscolar', $cicloEscolar);
        $plantilla->setValue('fechaInicial', $fechaInicial);
        $plantilla->setValue('fechaTermino', $fechaTermino);

        try{
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $plantilla->saveAs($tempFile);
            $header = ["Content-Type: application/octet-stream",];
            return response()->download($tempFile, $datosAlumno[0]->matricula.' | Carta de autorización.docx', $header)->deleteFileAfterSend($shouldDelete = true);
        }catch (Exception $e){
            //handle exception
            return redirect()->back()->with('error',$e);
        }

        /*$pdf = PDF::loadView('formatos.carta_aut_PE', [
            'semestreAlumno' => $semestre,
            'nombreTutor' => $fechaActual,
            'datosTutor' => $datosTutor,
            'datosGrupo' => $datosGrupo,
            'datosEscenario' => $datosEscenario,
            'datosAlumno' => $datosAlumno,
            'carrera' => $carrera,
            'fechaInicial' => $fechaInicial,
            'fechaTermino' => $fechaTermino,
            'cicloEscolar' => $cicloEscolar,
        ]);
        //c
        return $pdf->download($datosAlumno[0]->matricula.' | Carta de autorización | Practicas de ejecución.pdf');

        /*return view('formatos.carta_aut_PE', [
            'semestreAlumno' => $semestre,
            'fechaActual' => $fechaActual,
            'datosTutor' => $datosTutor,
            'datosGrupo' => $datosGrupo,
            'datosEscenario' => $datosEscenario,
            'datosAlumno' => $datosAlumno,
            'carrera' => $carrera,
            'fechaInicial' => $fechaInicial,
            'fechaTermino' => $fechaTermino,
            'cicloEscolar' => $cicloEscolar,
        ]);*/
    }

    public function GenerarCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $numSemestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        switch($numSemestre){
            case 2 :
                $semestre = 'segundo';
            break;
            case 3 :
                $semestre = 'tercer';
            break;
            case 4 :
                $semestre = 'cuarto';
            break;
            case 5 :
                $semestre = 'quinto';
            break;
            case 6 :
                $semestre = 'sexto';
            break;
        }

        //Obtener la fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fecha  = now();
        $mes    = $fecha->monthName;
        $anio   = $fecha->year;
        $dia    = $fecha->dayName;
        $diaNumero = $fecha->day;
        $fechaActual = $diaNumero." de ".$mes." de ".$anio;
        //$fechaActual = Carbon::now()->locale('es_MX')->isoFormat('d \d\e MMMM \d\e\l Y');

        //Query para obtener los datos del escenario del alumno logeado
        $datosEscenario = DB::table('alumnos')->join('escenarios', function($join){
            $join->on('alumnos.id_escenario','=','escenarios.id')
            ->where('alumnos.id_escenario','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_escenario
            ); // Se utiliza un subquery para obtener el id_grupo del usuario logeado
        })
        ->get();

        //Si no hay datos de escenario, cortamos el flujo y regresamos un mensaje de error
        if(!$datosEscenario->first()){
            return redirect()->back()->with('error','Datos faltantes para generar documento. ¿Actualizaste los datos de tu escenario real?');
        }

        //formato fecha inicial del escenario
        $fechaIni = $datosEscenario[0]->fecha_ini;
        $fechaIni = str_replace("/", "-", $fechaIni); 
        $newfechaIni = date("d-m-Y", strtotime($fechaIni)); 
        $fechaInicial = strftime("%d de %B de %Y", strtotime($newfechaIni));

        //formato fecha de termino del escenario
        $fechaTerm = $datosEscenario[0]->fecha_term;
        $fechaTerm = str_replace("/", "-", $fechaTerm); 
        $newfechaTerm = date("d-m-Y", strtotime($fechaTerm)); 
        $fechaTermino = strftime("%d de %B de %Y", strtotime($newfechaTerm));

        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Asignación de carreras de acuerdo al ID de carrera
        if($datosAlumno[0] -> id_carrera == 1 ){
            $carrera =  "Técnico en Informática";
        }else{
            $carrera =  "Técnico en Expresión Gráfica Digital";
        }

        switch($numSemestre){
            case 2 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_PRES/FORMATO_CARTA_PRES_PE.docx"));
            break;
            case 3 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_PRES/FORMATO_CARTA_PRES_PE.docx"));
            break;
            case 4 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_PRES/FORMATO_CARTA_PRES_PE.docx"));
            break;
            case 5 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_PRES/FORMATO_CARTA_PRES_SS.docx"));
            break;
            case 6 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_PRES/FORMATO_CARTA_PRES_EP.docx"));
            break;
        }

        $plantilla->setValue('fechaActual', $fechaActual);
        $plantilla->setValue('nombreResponsable', mb_strtoupper($datosEscenario[0]->nombreResp));
        $plantilla->setValue('apPatResponsable', mb_strtoupper($datosEscenario[0]->apPatResp));
        $plantilla->setValue('apMatResponsable', mb_strtoupper($datosEscenario[0]->apMatResp));
        $plantilla->setValue('cargoResponsable', mb_strtoupper($datosEscenario[0]->cargoResp));
        $plantilla->setValue('nombreEscenario', mb_strtoupper($datosEscenario[0]->nombreEsc));
        $plantilla->setValue('apPatAlumno', mb_strtoupper($datosAlumno[0]->apPat));
        $plantilla->setValue('apMatAlumno', mb_strtoupper($datosAlumno[0]->apMat));
        $plantilla->setValue('nombreAlumno', mb_strtoupper($datosAlumno[0]->nombre));
        $plantilla->setValue('semestreAlumno', $semestre);
        $plantilla->setValue('carreraAlumno', $carrera);
        $plantilla->setValue('fechaInicial', $fechaInicial);
        $plantilla->setValue('fechaTermino', $fechaTermino);

        try{
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $plantilla->saveAs($tempFile);
            $header = ["Content-Type: application/octet-stream",];
            return response()->download($tempFile, $datosAlumno[0]->matricula.' | Carta de presentación.docx', $header)->deleteFileAfterSend($shouldDelete = true);
        }catch (Exception $e){
            //handle exception
            return redirect()->back()->with('error',$e);
        }
    }

    public function GenerarCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $numSemestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        switch($numSemestre){
            case 2 :
                $semestre = 'segundo';
            break;
            case 3 :
                $semestre = 'tercer';
            break;
            case 4 :
                $semestre = 'cuarto';
            break;
            case 5 :
                $semestre = 'quinto';
            break;
            case 6 :
                $semestre = 'sexto';
            break;
        }

        //Obtener la fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fecha  = now();
        $mes    = $fecha->monthName;
        $anio   = $fecha->year;
        $dia    = $fecha->dayName;
        $diaNumero = $fecha->day;
        $fechaActual = $diaNumero." de ".$mes." de ".$anio;
        //$fechaActual = Carbon::now()->locale('es_MX')->isoFormat('d \d\e MMMM \d\e\l Y');

        //Query para obtener los datos del escenario del alumno logeado
        $datosEscenario = DB::table('alumnos')->join('escenarios', function($join){
            $join->on('alumnos.id_escenario','=','escenarios.id')
            ->where('alumnos.id_escenario','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_escenario
            ); // Se utiliza un subquery para obtener el id_grupo del usuario logeado
        })
        ->get();

        //Si no hay datos de escenario, cortamos el flujo y regresamos un mensaje de error
        if(!$datosEscenario->first()){
            return redirect()->back()->with('error','Datos faltantes para generar documento. ¿Actualizaste los datos de tu escenario real?');
        }

        //formato fecha inicial del escenario
        $fechaIni = $datosEscenario[0]->fecha_ini;
        $fechaIni = str_replace("/", "-", $fechaIni); 
        $newfechaIni = date("d-m-Y", strtotime($fechaIni)); 
        $fechaInicial = strftime("%d de %B de %Y", strtotime($newfechaIni));

        //formato fecha de termino del escenario
        $fechaTerm = $datosEscenario[0]->fecha_term;
        $fechaTerm = str_replace("/", "-", $fechaTerm); 
        $newfechaTerm = date("d-m-Y", strtotime($fechaTerm)); 
        $fechaTermino = strftime("%d de %B de %Y", strtotime($newfechaTerm));

        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Asignación de carreras de acuerdo al ID de carrera
        if($datosAlumno[0] -> id_carrera == 1 ){
            $carrera =  "Técnico en Informática";
        }else{
            $carrera =  "Técnico en Expresión Gráfica Digital";
        }

        switch($numSemestre){
            case 2 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_ACEP/FORMATO_CARTA_ACEP_PE.docx"));
            break;
            case 3 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_ACEP/FORMATO_CARTA_ACEP_PE.docx"));
            break;
            case 4 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_ACEP/FORMATO_CARTA_ACEP_PE.docx"));
            break;
            case 5 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_ACEP/FORMATO_CARTA_ACEP_SS.docx"));
            break;
            case 6 :
                $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/CARTA_ACEP/FORMATO_CARTA_ACEP_EP.docx"));
            break;
        }

        $plantilla->setValue('fechaActual', $fechaActual);
        $plantilla->setValue('nombreResponsable', mb_strtoupper($datosEscenario[0]->nombreResp));
        $plantilla->setValue('apPatResponsable', mb_strtoupper($datosEscenario[0]->apPatResp));
        $plantilla->setValue('apMatResponsable', mb_strtoupper($datosEscenario[0]->apMatResp));
        $plantilla->setValue('cargoResponsable', mb_strtoupper($datosEscenario[0]->cargoResp));
        $plantilla->setValue('nombreEscenario', mb_strtoupper($datosEscenario[0]->nombreEsc));
        $plantilla->setValue('apPatAlumno', mb_strtoupper($datosAlumno[0]->apPat));
        $plantilla->setValue('apMatAlumno', mb_strtoupper($datosAlumno[0]->apMat));
        $plantilla->setValue('nombreAlumno', mb_strtoupper($datosAlumno[0]->nombre));
        $plantilla->setValue('semestreAlumno', $semestre);
        $plantilla->setValue('carreraAlumno', $carrera);
        $plantilla->setValue('fechaInicial', $fechaInicial);
        $plantilla->setValue('fechaTermino', $fechaTermino);

        try{
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $plantilla->saveAs($tempFile);
            $header = ["Content-Type: application/octet-stream",];
            return response()->download($tempFile, $datosAlumno[0]->matricula.' | Carta de aceptación.docx', $header)->deleteFileAfterSend($shouldDelete = true);
        }catch (Exception $e){
            //handle exception
            return redirect()->back()->with('error',$e);
        }
    }

    public function GenerarInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $numSemestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        $practicas = 'PRÁCTICAS DE EJECUCIÓN DE COMPETENCIAS';

        switch($numSemestre){
            case 5 :
                $practicas = 'SERVICIO SOCIAL';
            break;
            case 6 :
                $practicas = 'PRÁCTICAS PROFESIONALES ESTADÍAS';
            break;
        }

        //Obtener la fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fecha  = now();
        $mes    = $fecha->monthName;
        $anio   = $fecha->year;
        $dia    = $fecha->dayName;
        $diaNumero = $fecha->day;
        $fechaActual = $diaNumero." de ".$mes." de ".$anio;
        //$fechaActual = Carbon::now()->locale('es_MX')->isoFormat('d \d\e MMMM \d\e\l Y');

        //Query para obtener los datos del escenario del alumno logeado
        $datosEscenario = DB::table('alumnos')->join('escenarios', function($join){
            $join->on('alumnos.id_escenario','=','escenarios.id')
            ->where('alumnos.id_escenario','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id_escenario
            ); // Se utiliza un subquery para obtener el id_grupo del usuario logeado
        })
        ->get();

        //Si no hay datos de escenario, cortamos el flujo y regresamos un mensaje de error
        if(!$datosEscenario->first()){
            return redirect()->back()->with('error','Datos faltantes para generar documento. ¿Actualizaste los datos de tu escenario real?');
        }

        //formato fecha inicial del escenario
        $fechaIni = $datosEscenario[0]->fecha_ini;
        $fechaIni = str_replace("/", "-", $fechaIni); 
        $newfechaIni = date("d-m-Y", strtotime($fechaIni)); 
        $fechaInicial = strftime("%d de %B de %Y", strtotime($newfechaIni));

        //formato fecha de termino del escenario
        $fechaTerm = $datosEscenario[0]->fecha_term;
        $fechaTerm = str_replace("/", "-", $fechaTerm); 
        $newfechaTerm = date("d-m-Y", strtotime($fechaTerm)); 
        $fechaTermino = strftime("%d de %B de %Y", strtotime($newfechaTerm));

        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/INFORME/FORMATO_INFORME.docx"));

        $plantilla->setValue('apPatAlumno', mb_strtoupper($datosAlumno[0]->apPat));
        $plantilla->setValue('apMatAlumno', mb_strtoupper($datosAlumno[0]->apMat));
        $plantilla->setValue('nombreAlumno', mb_strtoupper($datosAlumno[0]->nombre));

        try{
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $plantilla->saveAs($tempFile);
            $header = ["Content-Type: application/octet-stream",];
            return response()->download($tempFile, $datosAlumno[0]->matricula.' | Informe.docx', $header)->deleteFileAfterSend($shouldDelete = true);
        }catch (Exception $e){
            //handle exception
            return redirect()->back()->with('error',$e);
        }
    }

    public function GenerarBitacoras()
    {
        //Query para obtener el semestre del alumno logeado
        $numSemestre = DB::table('alumnos')->join('users', function($join){
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
            $carrera = 'Técnico en Informática';
        }else{
            $carrera = 'Técnico en Expresión Gráfica Digital';
        }

        $plantilla = new \PhpOffice\PhpWord\TemplateProcessor(public_path("templates/BITACORAS/FORMATO_BITACORA.docx"));

        $plantilla->setValue('apPatAlumno', mb_strtoupper($datosAlumno[0]->apPat));
        $plantilla->setValue('apMatAlumno', mb_strtoupper($datosAlumno[0]->apMat));
        $plantilla->setValue('nombreAlumno', mb_strtoupper($datosAlumno[0]->nombre));
        $plantilla->setValue('carreraAlumno', mb_strtoupper($carrera));

        try{
            $tempFile = tempnam(sys_get_temp_dir(),'PHPWord');
            $plantilla->saveAs($tempFile);
            $header = ["Content-Type: application/octet-stream",];
            return response()->download($tempFile, $datosAlumno[0]->matricula.' | Informe.docx', $header)->deleteFileAfterSend($shouldDelete = true);
        }catch (Exception $e){
            //handle exception
            return redirect()->back()->with('error',$e);
        }
    }

    public function subirINE(Request $request){
        
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();


        $archivo = $request->all();

        error_log($request);

        if ($request->hasFile('subirINE')) {
            $nombre ='INE_TUTOR_'.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirINE')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
        }

        //Si es una actualización se obtiene el ID
        if($request->idINE){
            DB::table('docs_alumnos')
                ->where('id', $request->idINE)
                ->update(
                    [
                        'ine' => $ruta
                    ]
                );
            return redirect()->back()->with('success','INE del tutor actualizada correctamente');
        }
        //Si es una creación se obtiene el autoincrement ID del insert
        $id = DB::table('docs_alumnos')->insertGetId([
            'ine' => $ruta
        ]);
        //Se actualiza la tabla alumnos con el id del insert
        DB::table('alumnos')
        ->where('id_usuario', Auth::user()->id)
        ->update(
            [
                'id_docs' => $id,
            ]
        );
        return redirect()->back()->with('success','INE del tutor guardada correctamente');
    }

    public function subirActa(Request $request){
        
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();


        $archivo = $request->all();

        error_log($request);

        if ($request->hasFile('subirActNac')) {
            $nombre ='ACTA_NAC_'.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirActNac')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
        }

        //Si es una actualización se obtiene el ID
        if($request->idActaNac){
            DB::table('docs_alumnos')
                ->where('id', $request->idActaNac)
                ->update(
                    [
                        'acta_nac' => $ruta
                    ]
                );
            return redirect()->back()->with('success','Acta de nacimiento actualizada correctamente');
        }
        //Si es una creación se obtiene el autoincrement ID del insert
        $id = DB::table('docs_alumnos')->insertGetId([
            'acta_nac' => $ruta
        ]);
        //Se actualiza la tabla alumnos con el id del insert
        DB::table('alumnos')
        ->where('id_usuario', Auth::user()->id)
        ->update(
            [
                'id_docs' => $id,
            ]
        );
        return redirect()->back()->with('success','Acta de nacimiento guardada correctamente');
    }

    /*
    public function store(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        if($request->hasFile("subirINE")){
            $archivo = $request->file("subirINE");
            $nombre = 'INE_'.$datosAlumno[0]->matricula.'.'.$archivo->guessExtension();
            $ruta = public_path('INE\\'.$nombre);
            
            $existe = File::exists($ruta);

            if($existe){
                File::delete($ruta);
                if($archivo->guessExtension()=='pdf'){
                    copy($archivo, $ruta);
                    //Si es una actualización se obtiene el ID
                    if($request->idINE){
                        DB::table('docs_alumnos')
                            ->where('id', $request->idINE)
                            ->update(
                                [
                                    'ine' => $ruta
                                ]
                            );
                        return redirect()->back()->with('success','INE del tutor actualizada correctamente');
                    }
                }
            }else{
                if($archivo->guessExtension()=='pdf'){
                    copy($archivo, $ruta);
                    $id = DB::table('docs_alumnos')->insertGetId([
                        'ine' => $ruta
                    ]);
                    //Se actualiza la tabla alumnos con el id del insert
                    DB::table('alumnos')
                    ->where('id_usuario', Auth::user()->id)
                    ->update(
                        [
                            'id_docs' => $id,
                        ]
                    );
                    return redirect()->back()->with('success','INE del tutor guardada correctamente');
                }                
            }


            
            
            /*
            if (! File::exists($ruta)) {
                File::makeDirectory($ruta,0777,true);
                if($archivo->guessExtension()=='pdf'){      //Si el archivo no existe, se crea
                    //Si es una creación se obtiene el autoincrement ID del insert
                    $id = DB::table('docs_alumnos')->insertGetId([
                        'ine' => $ruta
                    ]);
                    //Se actualiza la tabla alumnos con el id del insert
                    DB::table('alumnos')
                    ->where('id_usuario', Auth::user()->id)
                    ->update(
                        [
                            'id_docs' => $id,
                        ]
                    );
                    return redirect()->back()->with('success','INE del tutor guardada correctamente');
                }
            }elseif (File::exists($ruta)) {         //Si el archivo si existe, se elimina y se crea nuevamente (actualiza)
                File::delete($ruta);
                File::makeDirectory($ruta);
                copy($archivo, $ruta);
                //Si es una actualización se obtiene el ID
                if($request->idINE){
                    DB::table('docs_alumnos')
                        ->where('id', $request->idDomicilio)
                        ->update(
                            [
                                'ine' => $ruta
                            ]
                        );
                    return redirect()->back()->with('success','INE del tutor actualizada correctamente');
                }
            }
        }else{
            return redirect()->back()->with('error','Algo salió mal');
        }
    }*/
}