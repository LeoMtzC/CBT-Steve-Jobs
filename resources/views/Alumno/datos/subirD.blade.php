@extends('layouts.alumno.admin')

@section('titulo', 'Subir documentos')

@section('contenido')

@include('layouts.partials.messages')

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
            <form action="/subir-ine" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosArchivos->first())
                <input type="hidden" class="form-control" id="idINE" name="idINE"
                    value="{{ $datosArchivos[0] -> id }}">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" 
                        class="custom-file-input" id="subirINE" name="subirINE" lang="es">
                    <label class="custom-file-label" for="subirINE">{{ $datosArchivos[0] -> ine }}</label>
                </div>
                <div class="mt-3">
                @if($datosArchivos[0] -> ine != 'Seleccionar archivo')
                <button type="submit" class="btn btn-alumno" id="btnSubirINE"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosArchivos[0] -> ine])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirINE"><i class="fas fa-eye"></i> Ver</a>
                @else
                <button type="submit" class="btn btn-alumno" id="btnSubirINE"><i class="fas fa-file-upload"></i> Subir</button>
                @endif
                </div>
                @else
                <input type="hidden" class="form-control" id="idER" name="idER"
                    value="">
                <div class="custom-file">
                    <input type="file" accept="application/pdf"
                    class="custom-file-input" id="subirINE" name="subirINE" lang="es">
                    <label class="custom-file-label" for="subirINE">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirINE"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
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
            <form action="/subir-acta" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosArchivos->first())
                <input type="hidden" class="form-control" id="idActaNac" name="idActaNac"
                    value="{{ $datosArchivos[0] -> id }}">
                <div class="custom-file">
                    <input type="file" value="{{ $datosArchivos[0] -> acta_nac }}" accept="application/pdf" class="custom-file-input"
                        id="subirActNac" name="subirActNac" lang="es">
                    <label class="custom-file-label" for="subirActNac">{{ $datosArchivos[0] -> acta_nac }}</label>
                </div>
                <div class="mt-3">
                @if($datosArchivos[0] -> acta_nac != 'Seleccionar archivo')
                <button type="submit" class="btn btn-alumno" id="btnsubirActNac"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosArchivos[0] -> acta_nac])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirActa"><i class="fas fa-eye"></i> Ver</a>
                @else
                <button type="submit" class="btn btn-alumno" id="btnsubirActNac"><i class="fas fa-file-upload"></i> Subir</button>
                @endif
                </div>
                @else
                <input type="hidden" class="form-control" id="idActaNac" name="idActaNac"
                    value="">
                <div class="custom-file">
                    <input type="file" accept="application/pdf" class="custom-file-input" 
                        id="subirActNac" name="subirActNac" lang="es">
                    <label class="custom-file-label" for="subirActNac">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnsubirActNac"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection