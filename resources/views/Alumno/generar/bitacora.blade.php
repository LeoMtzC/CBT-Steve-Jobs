@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Bitácora')

@section('contenido')

    <!-- Generar bitácora -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Bitácora</h6>
        </div>
        <div class="card-body">
            <p>
                La bitácora permite que...
            </p>
            <br>
            <p>
                Una vez que generes tu bitácora recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <button type="button" class="btn btn-primary" id="genBitacora"><i class="fas fa-file-download"></i> Generar</button>
            </div>
        </div>
    </div>

@endsection