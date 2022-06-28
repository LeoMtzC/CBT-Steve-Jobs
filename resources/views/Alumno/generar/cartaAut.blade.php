@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de autorización')

@section('contenido')

    <!-- Generar carta de presentación -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Carta de autorización</h6>
        </div>
        <div class="card-body">
            <p>
                Para iniciar las prácticas profesionales del semestre, es importante contar con un permiso escrito por parte de tu tutor <i>en puño y letra</i>, por tal motivo te solicitamos imprimir este documento y <b>transcribirlo en una hoja en blanco con tinta negra</b> para posteriormente subirlo a la plataforma.
            </p>
            <br>
            <p>
                <b>Nota: Recuerda que debe firmar el tutor que te inscribió al CBT, debiendo coincidir con el INE.</b>
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            <div class="text-left">
                <button type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</button>
            </div>
        </div>
    </div>

@endsection