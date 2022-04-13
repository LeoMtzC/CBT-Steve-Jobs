@extends('layouts.admin')

@section('titulo', 'Generar / Carta de autorización')

@section('contenido')

    <!-- Generar carta de presentación -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Carta de autorización</h6>
        </div>
        <div class="card-body">
            <p>
                La carta de autorización es un documento que...
            </p>
            <br>
            <p>
                Una vez que generes tu carta de autorización recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <button type="button" class="btn btn-primary" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</button>
            </div>
        </div>
    </div>

@endsection