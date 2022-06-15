@extends('layouts.alumno.admin')

@section('titulo', 'Subir documentos')

@section('contenido')

    <!-- Subir INE -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">INE del tutor</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de la credencial para votar de tu tutor, en este deben poder observarse claramente ambas caras de la misma.
            </p>
            <br>
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirINE" lang="es">
                    <label class="custom-file-label" for="subirINE">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="btnSubirINE"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Subir Acta de nacimiento -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Acta de nacimiento</h6>
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu acta de nacimiento, todos los datos deben ser apreciables.
            </p>
            <br>
            <form>
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirActNac" lang="es">
                    <label class="custom-file-label" for="subirActNac">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary" id="btnsubirActNac"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection