@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Constancia de término')

@section('contenido')

    <!-- Subir constancia de termino -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Constancia de término</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu constancia de término una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartTer" lang="es">
                    <label class="custom-file-label" for="subirCartTer">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="btnSubirCartTer"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection