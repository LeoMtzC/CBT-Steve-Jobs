@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Carta de aceptación')

@section('contenido')

    <!-- Subir carta de aceptación -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu carta de aceptación una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAut" lang="es">
                    <label class="custom-file-label" for="subirCartAut">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAut"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection