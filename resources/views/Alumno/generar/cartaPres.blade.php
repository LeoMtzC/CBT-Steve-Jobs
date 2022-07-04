@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de presentación')

@section('contenido')

@include('layouts.partials.messages')


    <!-- Generar carta de presentación -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                La carta de presentación es un documento importante...
            </p>
            <br>
            <p>
                Una vez que generes tu carta de presentación recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <div class="text-left">
                <a type="button" href="{{ route('GCartaPresPE') }}" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 5)
            <div class="text-left">
                <a href="{{ route('GCartaPresSS') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 6)
            <div class="text-left">
                <a href="{{ route('GCartaPresEP') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @endif
        </div>
    </div>

@endsection