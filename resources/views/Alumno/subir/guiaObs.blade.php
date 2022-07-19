@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Guía de observación')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir Guía de observación -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Guía de observación</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu guía de observación una vez que haya sido completada.
            </p>
            <br>
            <form action="/subir-guia-observacion" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first())
                <input type="hidden" class="form-control" id="idGuiaObs" name="idGuiaObs"
                    value="{{ $datosHistorialPE[0] -> id }}">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirGuiaObs" name="subirGuiaObs"
                        value="{{ $datosHistorialPE[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirGuiaObs">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirGuiaObs"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialPE[0] -> fecha_exp)) }}</b></p>
                </div>
                @else
                <input type="hidden" class="form-control" id="idGuiaObs" name="idGuiaObs"
                        value="">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirGuiaObs" name="subirGuiaObs"
                        value="" lang="es">
                    <label class="custom-file-label" for="subirGuiaObs">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirGuiaObs"><i class="fas fa-file-upload"></i> Subir</button>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>Nunca</b> </p>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection