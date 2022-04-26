@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Carta de termino')

@section('contenido')

    <!-- Subir carta de termino -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Carta de termino</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu carta de termino una vez que haya sido firmada y sellada por la institución y los responsables.
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