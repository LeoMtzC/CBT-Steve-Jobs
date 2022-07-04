@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Constancia de término')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir constancia de termino -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Constancia de término | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Constancia de término | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Constancia de término | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu constancia de término una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form action="/subir-constancia-termino" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first() && ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4))
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idConsTer" name="idConsTer"
                        value="{{ $datosHistorialPE[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartTer" 
                        value="{{ $datosHistorialPE[0] -> url }}" name="subirConsTer" lang="es">
                    <label class="custom-file-label" for="subirCartTer">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartTer"><i class="fas fa-file-upload"></i> Subir</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialSS->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idConsTer" name="idConsTer"
                        value="{{ $datosHistorialSS[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartTer" 
                        value="{{ $datosHistorialSS[0] -> url }}" name="subirConsTer" lang="es">
                    <label class="custom-file-label" for="subirCartTer">{{ $datosHistorialSS[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartTer"><i class="fas fa-file-upload"></i> Subir</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialSS[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialEP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idConsTer" name="idConsTer"
                        value="{{ $datosHistorialEP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartTer" 
                        value="{{ $datosHistorialEP[0] -> url }}" name="subirConsTer" lang="es">
                    <label class="custom-file-label" for="subirCartTer">{{ $datosHistorialEP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartTer"><i class="fas fa-file-upload"></i> Subir</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialEP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idConsTer" name="idConsTer"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartTer" 
                        value="" name="subirConsTer" lang="es">
                    <label class="custom-file-label" for="subirCartTer">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartTer"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection