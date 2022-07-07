@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Bitácora')

@section('contenido')

@include('layouts.partials.messages')


    <!-- Generar bitácora -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Bitácoras</h6>
        </div>
        <div class="card-body">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <p>
                Durante el desarrollo de tus prácticas de ejecución debes llevar a cabo un registro de todas las actividades realizadas en el escenario real <b>evidencias (fotos)</b>, las horas y días de asistencia, para ello debes generar tu formato de bitácora.
            </p>
            @elseif($semestreAlumno == 5)
            <p>
                Durante el desarrollo de tu servicio social debes llevar a cabo un registro de todas las actividades realizadas en el escenario real <b>evidencias (fotos)</b>, las horas y días de asistencia, para ello debes generar tu formato de bitácora.
            </p>
            @elseif($semestreAlumno == 6)
            <p>
                Durante el desarrollo de tus estadías debes llevar a cabo un registro de todas las actividades realizadas en el escenario real <b>evidencias (fotos)</b>, las horas y días de asistencia, para ello debes generar tu formato de bitácora.
            </p>
            @endif
            <br>
            <p>
                Una vez que lo generes asegúrate de que tus datos sean correctos y llénalo cuidadosamente. Una vez que esté completo asegúrate de que los responsables lo revisen y firmen para que posteriormente puedas subirlo al portal en <b>formato PDF</b>.
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, revisa y actualiza tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <a href="{{ route('GBitacoraTodos') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
        </div>
    </div>

@endsection