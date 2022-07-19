@extends('layouts.alumno.admin')

@section('titulo', 'Subir / Bitácoras')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Subir Bitácoras -->
    <div class="card shadow mb-4">  
        <div class="card-header py-3">
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <h6 class="m-0 font-weight-bold text-alumno">Bitácoras | Prácticas profesionales de ejecución</h6>
            @elseif($semestreAlumno == 5)
            <h6 class="m-0 font-weight-bold text-alumno">Bitácoras | Servicio Social</h6>
            @elseif($semestreAlumno == 6)
            <h6 class="m-0 font-weight-bold text-alumno">Bitácoras | Prácticas profesionales Estadías</h6>
            @endif
        </div>
        <div class="card-body">
            <p>
                Sube un archivo <b>PDF</b> de tu Bitácoras una vez que haya sido aprobado.
            </p>
            <br>
            <form action="/subir-bitacoras" method="POST" enctype="multipart/form-data">
                @csrf
                @if($datosHistorialPE->first() && ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4))
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idBitacoras" name="idBitacoras"
                        value="{{ $datosHistorialPE[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirBitacoras" name="subirBitacoras"
                        value="{{ $datosHistorialPE[0] -> url }} lang="es">
                    <label class="custom-file-label" for="subirBitacoras">{{ $datosHistorialPE[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirBitacoras"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialPE[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialPE[0] -> fecha_exp)) }}</b></p>
                </div>
                @elseif($datosHistorialSS->first() && $semestreAlumno == 5)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idBitacoras" name="idBitacoras"
                        value="{{ $datosHistorialSS[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirBitacoras" name="subirBitacoras"
                        value="{{ $datosHistorialSS[0] -> url }} lang="es">
                    <label class="custom-file-label" for="subirBitacoras">{{ $datosHistorialSS[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirBitacoras"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialSS[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialSS[0] -> fecha_exp)) }}</b></p>
                </div>
                @elseif($datosHistorialEP->first() && $semestreAlumno == 6)
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idBitacoras" name="idBitacoras"
                        value="{{ $datosHistorialEP[0] -> id }}">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirBitacoras" name="subirBitacoras"
                        value="{{ $datosHistorialEP[0] -> url }} lang="es">
                    <label class="custom-file-label" for="subirBitacoras">{{ $datosHistorialEP[0] -> url }}</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirBitacoras"><i class="fas fa-file-upload"></i> Actualizar</button>
                <a href="{{ route('VerPDF', ['ruta' => $datosHistorialEP[0] -> url])}}" target="_blank"
                    type="button" class="btn btn-alumno" id="btnSubirCartAcep"><i class="fas fa-eye"></i> Ver</a>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>{{ date( "d/m/Y", strtotime($datosHistorialEP[0] -> fecha_exp)) }}</b></p>
                </div>
                @else
                <div class="custom-file">
                    <input type="hidden" class="form-control" id="idBitacoras" name="idBitacoras"
                        value="">
                    <input type="file" accept="application/pdf" class="custom-file-input" id="subirBitacoras" name="subirBitacoras"
                        value="" lang="es">
                    <label class="custom-file-label" for="subirBitacoras">Seleccionar Archivo</label>
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-alumno" id="btnSubirBitacoras"><i class="fas fa-file-upload"></i> Subir</button>
                <p style="text-align: right;"></i>Modificado por última vez el: <b>Nunca</b> </p>
                </div>
                @endif
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
@endsection