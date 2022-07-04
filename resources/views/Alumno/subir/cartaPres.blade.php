@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Carta de presentación')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir carta de autorización -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de presentación | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu carta de presentación una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form action="/subir-carta-presentacion" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first() && ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4))
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaPres" name="idCartaPres"
                        value="{{ $datosHistorialPE[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartPres"
                        value="{{ $datosHistorialPE[0] -> url }}" name="subirCartPres" lang="es">
                    <label class="custom-file-label" for="subirCartPres">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialSS->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaPres" name="idCartaPres"
                        value="{{ $datosHistorialSS[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartPres"
                        value="{{ $datosHistorialSS[0] -> url }}" name="subirCartPres" lang="es">
                    <label class="custom-file-label" for="subirCartPres">{{ $datosHistorialSS[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialSS[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialEP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaPres" name="idCartaPres"
                        value="{{ $datosHistorialEP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartPres"
                        value="{{ $datosHistorialEP[0] -> url }}" name="subirCartPres" lang="es">
                    <label class="custom-file-label" for="subirCartPres">{{ $datosHistorialEP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialEP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaPres" name="idCartaPres"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartPres"
                        value="" name="subirCartPres" lang="es">
                    <label class="custom-file-label" for="subirCartPres">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartPres"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection