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
            <p>
                Las bitácoras permite que...
            </p>
            <br>
            <p>
                Una vez que generes tus bitácoras recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <a href="{{ route('GBitacoraTodos') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
        </div>
    </div>

@endsection