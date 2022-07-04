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

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 1)
        ->get();
        
        return view('Alumno.subir.permiso', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE
        ]);
    }

    public function showSGuiaObs()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 2)
        ->get();
        
        return view('Alumno.subir.guiaObs', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE
        ]);
    }

    public function showSCartaAut()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 3)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 4)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 5)
        ->get();
        
        return view('Alumno.subir.cartaAut', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }


    public function showSCartaPres()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 6)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 7)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 8)
        ->get();
        
        return view('Alumno.subir.cartaPres', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }

    public function showSCartaAcep()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 9)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 10)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 11)
        ->get();
        
        return view('Alumno.subir.cartaAcep', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }

    public function showSConstaTer()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 12)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 13)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 14)
        ->get();
        
        return view('Alumno.subir.consTer', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }

    public function showSInforme()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 15)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 16)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 17)
        ->get();
        
        return view('Alumno.subir.informe', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }

    public function showSBitacora()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialPE = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 18)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialSS = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 19)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialEP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 20)
        ->get();
        
        return view('Alumno.subir.bitacoras', [
            'semestreAlumno' => $semestre,
            'datosHistorialPE' => $datosHistorialPE,
            'datosHistorialSS' => $datosHistorialSS,
            'datosHistorialEP' => $datosHistorialEP
        ]);
    }

    public function showSMTP()
    {
        //Query para obtener el semestre del alumno logeado
        $semestre = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->semestre;

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialAv1 = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 21)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialAv2 = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 22)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialAv3 = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 23)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialAv4 = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 24)
        ->get();

        //Query para obtener el historial de documentos del alumno logeado
        $datosHistorialMTP = DB::table('hist_ac_lab')->join('alumnos', function($join){
            $join->on('hist_ac_lab.id_alumno','=','alumnos.id')
            ->where('hist_ac_lab.id_alumno','=',
                DB::table('alumnos')->join('users', function($join){
                    $join->on('alumnos.id_usuario','=','users.id')
                    ->where('alumnos.id_usuario','=',Auth::user()->id);
                })->first()->id
            );
        })->where('id_docu', 25)
        ->get();
        
        return view('Alumno.subir.MTP', [
            'semestreAlumno' => $semestre,
            'datosHistorialAv1' => $datosHistorialAv1,
            'datosHistorialAv2' => $datosHistorialAv2,
            'datosHistorialAv3' => $datosHistorialAv3,
            'datosHistorialAv4' => $datosHistorialAv4,
            'datosHistorialMTP' => $datosHistorialMTP
        ]);
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
        $anioActualmasUno = Carbon::now()->addYear()->year();
        //Si la fecha actual está entre la fecha 1 de Enero y
        //1 de Junio de cualquier año, entonces el ciclo escolar es
        //el (año actual menos 1 año) - (año actual), si no se cumple
        //esta condición, entonces el ciclo escolar es
        //(año actual) - (año actual)
        $startDate1 = \Carbon\Carbon::createFromFormat('m-d','01-08');
        $endDate1 = \Carbon\Carbon::createFromFormat('m-d','31-12');
        $startDate2 = \Carbon\Carbon::createFromFormat('m-d','01-01');
        $endDate2 = \Carbon\Carbon::createFromFormat('m-d','31-07');
        $check1 = \Carbon\Carbon::now()->between($startDate1,$endDate1);
        $check2 = \Carbon\Carbon::now()->between($startDate2,$endDate2);
        if($check1){
            $cicloEscolar = (string)"$anioActual - $anioActualmasUno";
        }elseif($check2){
            $cicloEscolar = (string)"$anioActualmenosUno - $anioActual";
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

        if ($request->hasFile('subirINE')) {
            $nombre ='INE_TUTOR_'.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirINE')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
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
        return redirect()->back()->with('error','Algo salió mal');        
    }

    public function subirActa(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        if ($request->hasFile('subirActNac')) {
            $nombre ='ACTA_NAC_'.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirActNac')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
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
        return redirect()->back()->with('error','Algo salió mal');        
    }

    public function subirPermiso(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();
        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 1){
            $id_documento = 1;
            $nombre_documento = 'FIRMADO_';
        }

        if ($request->hasFile('subirPermiso')) {
            $nombre ='PERMISO_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirPermiso')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idPermiso){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idPermiso)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Permiso actualizado correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Permiso guardado correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');        
    }

    public function subirGuiaObs(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();
        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 1){
            $id_documento = 2;
            $nombre_documento = 'OBS_';
        }

        if ($request->hasFile('subirGuiaObs')) {
            $nombre ='GUIA_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirGuiaObs')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idGuiaObs){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idGuiaObs)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Guía de observación actualizada correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Guía de observación guardada correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');        
    }

    public function subirCartaAut(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();
        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 3;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 4;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 5;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirCartAut')) {
            $nombre ='CARTA_AUT_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirCartAut')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idCartaAut){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idCartaAut)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Carta de autorización actualizada correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Carta de autorización guardada correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');        
    }

    public function subirCartaPres(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 6;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 7;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 8;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirCartPres')) {
            $nombre ='CARTA_PRES_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirCartPres')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idCartaPres){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idCartaPres)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Carta de presentación actualizada correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Carta de presentación guardada correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }

    public function subirCartaAcep(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 9;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 10;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 11;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirCartAcep')) {
            $nombre ='CARTA_ACEP_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirCartAcep')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idCartAcep){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idCartAcep)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Carta de aceptación actualizada correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Carta de aceptación guardada correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }

    public function subirConsTer(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 12;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 13;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 14;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirConsTer')) {
            $nombre ='CONS_TER_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirConsTer')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);
            //Si es una actualización se obtiene el ID
            if($request->idConsTer){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idConsTer)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Constancia de termino actualizada correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Constancia de termino guardada correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }

    public function subirInforme(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 15;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 16;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 17;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirInforme')) {
            $nombre ='INFORME_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirInforme')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);

            //Si es una actualización se obtiene el ID
            if($request->idInforme){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idInforme)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Informe actualizado correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Informe guardado correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }

    public function subirBitacoras(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2 || $datosAlumno[0] -> semestre == 3 || $datosAlumno[0] -> semestre == 4){
            $id_documento = 18;
            $nombre_documento = 'PRAC_EJEC_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 19;
            $nombre_documento = 'SERVICIO_SOC_';
        }else{
            $id_documento = 20;
            $nombre_documento = 'ESTADIAS_';
        }

        if ($request->hasFile('subirBitacoras')) {
            $nombre ='BITACORAS_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirBitacoras')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);

            //Si es una actualización se obtiene el ID
            if($request->idBitacoras){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idBitacoras)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','Informe actualizado correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','Informe guardado correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }

    public function subirMTP(Request $request){
        //Query para obtener todos los datos del alumno
        $datosAlumno = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->get();

        //Query para obtener el id del alumno logeado
        $id_alu = DB::table('alumnos')->join('users', function($join){
            $join->on('alumnos.id_usuario','=','users.id')
            ->where('alumnos.id_usuario','=',Auth::user()->id);
        })
        ->first()->id;

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

        //Obtener fecha actual
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_mx');
        $fechaActual  = now();

        if($datosAlumno[0] -> semestre == 2){
            $id_documento = 21;
            $nombre_documento = 'AVANCE_1_';
        }elseif($datosAlumno[0] -> semestre == 3){
            $id_documento = 22;
            $nombre_documento = 'AVANCE_2_';
        }elseif($datosAlumno[0] -> semestre == 4){
            $id_documento = 23;
            $nombre_documento = 'AVANCE_3_';
        }elseif($datosAlumno[0] -> semestre == 5){
            $id_documento = 24;
            $nombre_documento = 'AVANCE_4_';
        }elseif($datosAlumno[0] -> semestre == 6){
            $id_documento = 25;
            $nombre_documento = 'FINAL_';
        }

        if ($request->hasFile('subirMTP')) {
            $nombre ='MTP_'.$nombre_documento.$datosAlumno[0]->matricula.'.'.'pdf';
            $ruta = $request->file('subirMTP')
                ->storeAs('DOCUMENTOS_ALUMNOS/'.$datosAlumno[0]->matricula, $nombre);

            //Si es una actualización se obtiene el ID
            if($request->idMTP){
                DB::table('hist_ac_lab')
                    ->where('id', $request->idMTP)
                    ->update(
                        [
                            'id_alumno' => $id_alu,
                            'id_docu' => $id_documento,
                            'url' => $ruta,
                            'id_escenario' => $datosEscenario[0]->id,
                            'fecha_ini' => $datosEscenario[0]->fecha_ini,
                            'fecha_term' => $datosEscenario[0]->fecha_term,
                            'fecha_exp' => $fechaActual
                        ]
                    );
                return redirect()->back()->with('success','MTP actualizado correctamente');
            }
            //Si es una creación se obtiene el autoincrement ID del insert
            $id = DB::table('hist_ac_lab')->insertGetId([
                'id_alumno' => $id_alu,
                'id_docu' => $id_documento,
                'url' => $ruta,
                'id_escenario' => $datosEscenario[0]->id,
                'fecha_ini' => $datosEscenario[0]->fecha_ini,
                'fecha_term' => $datosEscenario[0]->fecha_term,
                'fecha_exp' => $fechaActual
            ]);
            return redirect()->back()->with('success','MTP guardado correctamente');
        }
        return redirect()->back()->with('error','Algo salió mal');
    }
}