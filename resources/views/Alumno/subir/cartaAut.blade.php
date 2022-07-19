@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Carta de autorización')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir carta de autorización -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de autorización | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de autorización | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Carta de autorización | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu carta de autorización una vez que haya sido firmada y sellada por la institución y los responsables.
            </p>
            <br>
            <form action="/subir-carta-autorizacion" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first() && ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4))
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaAut" name="idCartaAut"
                        value="{{ $datosHistorialPE[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAut" 
                        value="{{ $datosHistorialPE[0] -> url }}" name="subirCartAut" lang="es">
                    <label class="custom-file-label" for="subirCartAut">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAut"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirActa"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialPE[0] -> fecha_exp)) }}</b></p>
                @elseif($datosHistorialSS->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaAut" name="idCartaAut"
                        value="{{ $datosHistorialSS[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAut" 
                        value="{{ $datosHistorialSS[0] -> url }}" name="subirCartAut" lang="es">
                    <label class="custom-file-label" for="subirCartAut">{{ $datosHistorialSS[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAut"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialSS[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirActa"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialSS[0] -> fecha_exp)) }}</b></p>
                @elseif($datosHistorialEP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaAut" name="idCartaAut"
                        value="{{ $datosHistorialEP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAut" 
                        value="{{ $datosHistorialEP[0] -> url }}" name="subirCartAut" lang="es">
                    <label class="custom-file-label" for="subirCartAut">{{ $datosHistorialEP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAut"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialEP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirActa"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialEP[0] -> fecha_exp)) }}</b></p>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idCartaAut" name="idCartaAut"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirCartAut" name="subirCartAut" lang="es">
                    <label class="custom-file-label" for="subirCartAut">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirCartAut"><i class="fas fa-file-upload"></i> Subir</button>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>Nunca</b> </p>
                @endif
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection