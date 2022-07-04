@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Informe')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Generar informe -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Informe | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Informe | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Informe | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                El informe es un documento que...
            </p>
            <br>
            <p>
                Una vez que generes tu informe recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <a href="{{ route('GInformeTodo') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
        </div>
    </div>

@endsection