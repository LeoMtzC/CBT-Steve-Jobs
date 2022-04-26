@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Memorias de Trabajo Profesional')

@section('contenido')

    <!-- Subir MTP -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">MTP</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tus Memorias de Trabajo Profesional una vez que hayan sido aprobadas.
            </p>
            <br>
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirActNac" lang="es">
                    <label class="custom-file-label" for="subirActNac">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

@endsection