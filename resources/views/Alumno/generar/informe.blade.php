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
                El informe es aquel documento en el describes las actividades realizadas en el escenario real, además de los aprendizajes obtenidos. Una vez que lo generes asegúrate de que tus datos sean correctos y llénalo cuidadosamente.
            </p>
            <br>
            <p>
            Enseguida, asegúrate de que los responsables lo revisen y firmen para que posteriormente puedas subirlo al portal <b>en formato PDF</b>.
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, revisa y actualiza tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <a href="{{ route('GInformeTodo') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
        </div>
    </div>

@endsection