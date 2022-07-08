@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Carta de presentación')

@section('contenido')

@include('layouts.partials.messages')


    <!-- Generar carta de presentación -->
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
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <p>
                Para iniciar las prácticas de ejecución, se requiere de la Carta de Presentación que es un documento que emite la institución para presentarte formalmente como estudiante de la carrera técnica en el escenario real. Por tal motivo, llena cuidadosamente los datos que se te solicitan a continuación, revisa que no haya errores, imprímela y acude a Vinculación Escolar para recuperar la firma y sello.
            </p>
            @elseif($semestreAlumno == 5)
            <p>
                Para iniciar el servicio social, se requiere de la Carta de Presentación que es un documento que emite la institución para presentarte formalmente como estudiante de la carrera técnica en el escenario real. Por tal motivo, llena cuidadosamente los datos que se te solicitan a continuación, revisa que no haya errores, imprímela y acude a Vinculación Escolar para recuperar la firma y sello.
            </p>
            @elseif($semestreAlumno == 6)
            <p>
                Para iniciar las estadías, se requiere de la Carta de Presentación que es un documento que emite la institución para presentarte formalmente como estudiante de la carrera técnica en el escenario real. Por tal motivo, llena cuidadosamente los datos que se te solicitan a continuación, revisa que no haya errores, imprímela y acude a Vinculación Escolar para recuperar la firma y sello.
            </p>
            @endif
            <br>
            <p>
                Finalmente <b>escanea el documento en formato PDF</b> y súbela en el apartado correspondiente cerciorándote que sea el archivo correcto.
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, revisa y actualiza tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            @if($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)
            <div class="text-left">
                <a type="button" href="{{ route('GCartaPresPE') }}" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 5)
            <div class="text-left">
                <a href="{{ route('GCartaPresSS') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @elseif($semestreAlumno == 6)
            <div class="text-left">
                <a href="{{ route('GCartaPresEP') }}" type="button" class="btn btn-alumno" id="genCartaAut"><i class="fas fa-file-download"></i> Generar</a>
            </div>
            @endif
        </div>
    </div>

@endsection