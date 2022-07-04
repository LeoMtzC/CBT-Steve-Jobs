@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de autorización')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Generar carta de presentación -->
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
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <p>
                Para iniciar las prácticas profesionales de ejecución del semestre, es importante contar con un permiso escrito por parte de tu tutor <i>en puño y letra</i>, por tal motivo te solicitamos imprimir este documento y <b>transcribirlo en una hoja en blanco con tinta negra</b> para posteriormente subirlo escaneado a la plataforma.
            </p>
            @elseif($semestreAlumno == 5)
            <p>
                Para iniciar tu servicio social, es importante contar con un permiso escrito por parte de tu tutor <i>en puño y letra</i>, por tal motivo te solicitamos imprimir este documento y <b>transcribirlo en una hoja en blanco con tinta negra</b> para posteriormente subirlo escaneado a la plataforma.
            </p>
            @elseif($semestreAlumno == 6)
            <p>
                Para iniciar las prácticas profesionales estadías, es importante contar con un permiso escrito por parte de tu tutor <i>en puño y letra</i>, por tal motivo te solicitamos imprimir este documento y <b>transcribirlo en una hoja en blanco con tinta negra</b> para posteriormente subirlo escaneado a la plataforma.
            </p>
            @endif
            <br>
            <p>
                <b>Nota: Recuerda que debe firmar el tutor que te inscribió al CBT, debiendo coincidir con el INE.</b>
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <div class="text-left">
                <a type="button" href="{{ route('GCartaAutPE') }}" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 5)
            <div class="text-left">
                <a href="{{ route('GCartaAutSS') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 6)
            <div class="text-left">
                <a href="{{ route('GCartaAutEP') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @endif
        </div>
    </div>

@endsection