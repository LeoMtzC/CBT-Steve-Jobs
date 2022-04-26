@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Informe')

@section('contenido')

    <!-- Subir informe -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informe</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu informe una vez que haya sido aprobado.
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