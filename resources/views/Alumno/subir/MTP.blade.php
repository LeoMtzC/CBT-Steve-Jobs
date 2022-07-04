@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Memorias de Trabajo Profesional')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir MTP -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2)
            <h6 class="m-0 font-weight-bold text-alumno">Avance 1 | MTP</h6>
            @elseif($semestreAlumno == 3)
            <h6 class="m-0 font-weight-bold text-alumno">Avance 2 | MTP</h6>
            @elseif($semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Avance 3 | MTP</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Avance 4 | MTP</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Memorias de Trabajo Profesional | Completo</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tus Memorias de Trabajo Profesional una vez que hayan sido aprobadas.
            </p>
            <br>
            <form action="/subir-MTP" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialAv1->first() && $semestreAlumno == 2)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="{{ $datosHistorialAv1[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="{{ $datosHistorialAv1[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirMTP">{{ $datosHistorialAv1[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialAv1[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialAv2->first() && $semestreAlumno == 3)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="{{ $datosHistorialAv2[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="{{ $datosHistorialAv2[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirMTP">{{ $datosHistorialAv2[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialAv2[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialAv3->first() && $semestreAlumno == 4)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="{{ $datosHistorialAv3[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="{{ $datosHistorialAv3[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirMTP">{{ $datosHistorialAv3[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialAv3[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialAv4->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="{{ $datosHistorialAv4[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="{{ $datosHistorialAv4[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirMTP">{{ $datosHistorialAv4[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialAv4[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @elseif($datosHistorialMTP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="{{ $datosHistorialMTP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="{{ $datosHistorialMTP[0] -> url }}" lang="es">
                    <label class="custom-file-label" for="subirMTP">{{ $datosHistorialMTP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialMTP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                </div>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idMTP" name="idMTP"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirMTP" name="subirMTP"
                        value="" lang="es">
                    <label class="custom-file-label" for="subirMTP">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirMTP"><i class="fas fa-file-upload"></i> Subir</button>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection