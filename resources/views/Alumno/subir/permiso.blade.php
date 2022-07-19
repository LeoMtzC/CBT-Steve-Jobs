@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Permiso')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir Permiso -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Permiso</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu permiso una vez que haya sido firmado.
            </p>
            <br>
            <form action="/subir-permiso" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first())
                <input type="hidden" class="form-control" id="idPermiso" name="idPermiso"
                        value="{{ $datosHistorialPE[0] -> id }}">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirPermiso" name="subirPermiso"
                        value="{{ $datosHistorialPE[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirPermiso">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirPermiso"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialPE[0] -> fecha_exp)) }}</b></p>
                </div>
                @else
                <input type="hidden" class="form-control" id="idPermiso" name="idPermiso"
                        value="">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirPermiso" name="subirPermiso"
                        value="" lang="es">
                    <label class="custom-file-label" for="subirPermiso">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirPermiso"><i class="fas fa-file-upload"></i> Subir</button>
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