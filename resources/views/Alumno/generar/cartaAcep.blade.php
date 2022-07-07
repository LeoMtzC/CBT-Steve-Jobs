@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de aceptación')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Generar carta de presentación -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                El escenario real debe remitir una contestación a la carta de presentación que generaste y entregaste en dicho escenario a través del documento denominado Carta de Aceptación, por lo tanto, para facilitar y agilizar el trámite a continuación llena cuidadosamente los siguientes datos para obtener tu documento.
            </p>
            <br>
            <p>
                Una vez generado acude con el titular de tu escenario real para que firme y en su caso selle tu documento, a continuación, <b>escanea el documento en formato PDF</b> y súbela en el apartado correspondiente cerciorándote que sea el archivo correcto.
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, revisa y actualiza tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <div class="text-left">
                <a type="button" href="{{ route('GCartaAcepPE') }}" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 5)
            <div class="text-left">
                <a href="{{ route('GCartaAcepSS') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 6)
            <div class="text-left">
                <a href="{{ route('GCartaAcepEP') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @endif
        </div>
    </div>

@endsection