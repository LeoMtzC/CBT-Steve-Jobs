@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Carta de aceptación')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir carta de aceptación -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de aceptación | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu carta de aceptación una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form action="/subir-carta-aceptacion" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first() && ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4))
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartAcep" name="idCartAcep"
                        value="{{ $datosHistorialPE[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAcep"
                        value="{{ $datosHistorialPE[0] -> url }}" name="subirCartAcep" lang="es">
                    <label class="custom-file-label" for="subirCartAcep">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialSS->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartAcep" name="idCartAcep"
                        value="{{ $datosHistorialSS[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAcep"
                        value="{{ $datosHistorialSS[0] -> url }}" name="subirCartAcep" lang="es">
                    <label class="custom-file-label" for="subirCartAcep">{{ $datosHistorialSS[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialSS[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialEP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartAcep" name="idCartAcep"
                        value="{{ $datosHistorialEP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAcep"
                        value="{{ $datosHistorialEP[0] -> url }}" name="subirCartAcep" lang="es">
                    <label class="custom-file-label" for="subirCartAcep">{{ $datosHistorialEP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialEP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartAcep" name="idCartAcep"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAcep"
                        value="" name="subirCartAcep" lang="es">
                    <label class="custom-file-label" for="subirCartAcep">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection