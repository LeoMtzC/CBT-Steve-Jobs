@extends('layouts.alumno.admin')

@section('titulo', 'Generar / Informe')

@section('contenido')

    <!-- Generar informe -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Informe</h6>
        </div>
        <div class="card-body">
            <p>
                El informe es un documento que...
            </p>
            <br>
            <p>
                Una vez que generes tu informe recuerda que...
            </p>
            <br>
            <p>
                Si los datos mostrados no son correctos, asegúrate de haber llenado correctamente tus datos personales en la sección <b>'Mis datos'</b>.
            </p>
            <br>
            @if ($semestreAlumno == 2 || $semestreAlumno == 3 || $semestreAlumno == 4)  <!-- Semestre 2, 3, 4 → Informe ejecución-->
                <div class="text-left">
                    <a href="{{ route('Descargar', ['archivo' => 'INFORME_EJECUCION.pdf', 'nombre' => 'Informe de Prácticas de Ejecución.pdf'])}}" 
                    type="button" class="btn btn-alumno" id="genInforme"><i class="fas fa-file-download"></i> Generar</a>
                </div>
                    @if($semestreAlumno == 5) <!-- Semestre 5 → Informe servicio-->
                    <div class="text-left"> 
                        <a href="{{ route('Descargar', ['archivo' => 'INFORME_SERVICIO.pdf', 'nombre' => 'Informe de Servicio Social.pdf'])}}" 
                        type="button" class="btn btn-alumno" id="genInforme"><i class="fas fa-file-download"></i> Generar</a>
                    </div>                              
                            @if($semestreAlumno == 6)   <!-- Semestre 6 → Informe estadías-->
                            <div class="text-left">
                                <a href="{{ route('Descargar', ['archivo' => 'INFORME_ESTADIAS.pdf', 'nombre' => 'Informe de Estadías Profesionales.pdf'])}}" 
                                type="button" class="btn btn-alumno" id="genInforme"><i class="fas fa-file-download"></i> Generar</a>
                            </div>                                                            
                            @endif
                    @endif
            @else   <!-- Semestre 1 → Informe observación-->
                <div class="text-left">
                    <a href="{{ route('Descargar', ['archivo' => 'INFORME_OBSERVACION.pdf', 'nombre' => 'Informe de Prácticas de Observación.pdf'])}}" 
                    type="button" class="btn btn-alumno" id="genInforme"><i class="fas fa-file-download"></i> Generar</a>
                </div>
            @endif
        </div>
    </div>

@endsection