@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de termino')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Generar carta de termino -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Carta de termino</h6>
        </div>
        <div class="card-body">
            <p>
                La carta de termino respalda el cumplimiento de tus actividades...
            </p>
            <br>
            <p>
                Una vez que generes tu carta de termino recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <button type="button" class="btn btn-alumno" id="genCartaTer"><i class="fas fa-file-download"></i> Generar</button>
            </div>
        </div>
    </div>

@endsection