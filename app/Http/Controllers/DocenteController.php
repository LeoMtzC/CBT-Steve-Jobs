<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    //REGISTRO:
    public function showRegistroAlumno()
    {
        return view('Docente.registro.registroAlu');
    }
    
    public function showRegistroGrupo()
    {
        return view('Docente.registro.registroGrup');
    }

    //CONSULTA:
    public function showConsultaAlumno()
    {
        return view('Docente.consulta.consultaAlu');
    }

    public function showConsultaGrupo()
    {
        return view('Docente.consulta.consultaGrup');
    }

    public function showConsultaHistAlu()
    {
        return view('Docente.historial.alumno.histAluComp');
    }

    public function showDetallesAlu()
    {
        return view('Docente.detalles.detallesAlu');
    }

    public function showPractObs_Grupos()
    {
        return view('Docente.historial.practObs.listGrup');
    }

    public function showPractObs_Alumnos()
    {
        return view('Docente.historial.practObs.listAlu');
    }

    public function showPractEjec_Grupos()
    {
        return view('Docente.historial.practEjec.listGrup');
    }

    public function showPractEjec_Alumnos()
    {
        return view('Docente.historial.practEjec.listAlu');
    }

    public function showServSoc_Grupos()
    {
        return view('Docente.historial.servSoc.listGrup');
    }

    public function showServSoc_Alumnos()
    {
        return view('Docente.historial.servSoc.listAlu');
    }

    public function showEstadias_Grupos()
    {
        return view('Docente.historial.estadias.listGrup');
    }

    public function showEstadias_Alumnos()
    {
        return view('Docente.historial.estadias.listAlu');
    }
}
