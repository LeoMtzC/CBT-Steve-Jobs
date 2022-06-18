@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Guía de observación')

@section('contenido')

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
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirGuiaObs" lang="es">
                    <label class="custom-file-label" for="subirGuiaObs">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirGuiaObs"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection