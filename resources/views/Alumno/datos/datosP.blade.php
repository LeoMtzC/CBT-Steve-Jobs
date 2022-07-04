@extends('layouts.alumno.admin')

@section('titulo', 'Mis datos')

@section('contenido')

@include('layouts.partials.messages')

<!-- Datos personales -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDatos" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDatos">
        <h6 class="m-0 font-weight-bold text-alumno">Datos personales</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDatos">
        <div class="card-body">
            <form action="/datos-alumno" method="POST" id="formDatosPerAlu">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomAlu">Nombre</label>
                        <input type="text" class="form-control" id="nomAlu" placeholder="Nombre" name="nomAlu" required
                            readonly value="{{ $datosAlumno[0] -> nombre }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatAlu">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatAlu" placeholder="Apellido Paterno"
                            name="apPatAlu" required readonly value="{{ $datosAlumno[0] -> apPat }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatAlu">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAlu" placeholder="Apellido Materno"
                            name="apMatAlu" required readonly value="{{ $datosAlumno[0] -> apMat }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matrAlu">Matrícula</label>
                        <input type="text" class="form-control" id="matrAlu" placeholder="Matrícula" name="matrAlu"
                            required readonly value="{{ $datosAlumno[0] -> matricula }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="semesAlu">Semestre</label>
                        <input type="text" class="form-control" id="semesAlu" placeholder="Semestre" name="semesAlu"
                            required readonly value="{{ $datosAlumno[0] -> semestre }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="genAlu">Generación</label>
                        <input type="text" class="form-control" id="genAlu" placeholder="Generación" name="genAlu"
                            required readonly value="{{ $datosAlumno[0] -> generacion }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carrAlu">Carrera</label>
                        <input type="text" class="form-control" id="carrAlu" placeholder="Carrera" name="carrAlu"
                            required readonly value="{{ $carrera }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpAlu">CURP</label>
                        <input type="text" class="form-control" id="curpAlu" placeholder="CURP" name="curpAlu" required
                            value="{{ $datosAlumno[0] -> curp }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailAlu">Correo eléctronico</label>
                        <input type="email" class="form-control" id="emailAlu" placeholder="Correo eléctrónico"
                            name="emailAlu" required value="{{ $datosAlumno[0] -> correo }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telAlu">Teléfono</label>
                        <input type="tel" class="form-control" id="telAlu" placeholder="Teléfono" name="telAlu" required
                            value="{{ $datosAlumno[0] -> telefono }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fechNacAlu">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechNacAlu" placeholder="" name="fechNacAlu"
                            required readonly value="{{ $datosAlumno[0] -> fecha_nac }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nssAlu">Numero de seguro social</label>
                        <input type="text" class="form-control" id="nssAlu" placeholder="NSS" name="nssAlu" required
                            value="{{ $datosAlumno[0] -> nss }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parentTut">Seguro médico</label>
                        <select id="segMedAlu" class="form-control" name="segMedAlu" required>
                            @if($datosAlumno[0] -> seguro_med == 's')
                            <option value="">Seleccione una opción...</option>
                            <option selected value="s">Activo</option>
                            <option value="n">No activo</option>
                            @elseif($datosAlumno[0] -> seguro_med == 'n')
                            <option value="">Seleccione una opción...</option>
                            <option value="s">Activo</option>
                            <option selected value="n">No activo</option>
                            @else
                            <option selected value="">Seleccione una opción...</option>
                            <option value="s">Activo</option>
                            <option value="n">No activo</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-alumno" id="btnActualuarDatosPer">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Datos domicilio -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDomicilio" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDomicilio">
        <h6 class="m-0 font-weight-bold text-alumno">Datos domiciliarios</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDomicilio">
        <div class="card-body">
            <form action="/datos-alumno-domicilio" method="POST" id="formDatosDomAlu">
                @csrf
                @if($datosDomicilio->first())
                <input type="hidden" class="form-control" id="idDomicilio" name="idDomicilio"
                    value="{{ $datosDomicilio[0] -> id }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="estadoAlu">Estado</label>
                        <select id="estadoAlu" class="form-control" name="estadoAlu" required>
                        <?php $estadoActual = $estados->where('id', $datosDomicilio[0]->id_estado)->pluck('nombre')->toArray(); ?>
                            <option value='{{ $datosDomicilio[0] -> id_estado }}' selected>{{$estadoActual[0]}}</option>
                            @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="municipioAlu">Municipio</label>
                        <select id="municipioAlu" class="form-control" name="municipioAlu" required>
                            <?php $actualMunicipio = $municipios->where('id', $datosDomicilio[0]->id_muni)->pluck('nombre')->toArray(); ?>
                            <option value='{{ $datosDomicilio[0] -> id_muni  }}' selected>{{$actualMunicipio[0]}}</option>
                            @foreach ($municipios as $municipio)
                            <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="calleAlu">Calle</label>
                        <input type="text" class="form-control" id="calleAlu" placeholder="Calle" name="calleAlu"
                            value="{{ $datosDomicilio[0] -> calle }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coloniaAlu">Colonia o localidad</label>
                        <input type="text" class="form-control" id="coloniaAlu" placeholder="Colonia o localidad"
                            name="coloniaAlu" value="{{ $datosDomicilio[0] -> colonia }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpAlu">Código postal</label>
                        <input type="text" class="form-control" id="cpAlu" placeholder="C.P." name="cpAlu"
                            value="{{ $datosDomicilio[0] -> cp }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="numExAlu">Número exterior</label>
                        <input type="text" class="form-control" id="numExAlu" placeholder="No. Ext." name="numExAlu"
                            value="{{ $datosDomicilio[0] -> no_ext }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="numInAlu">Número interior</label>
                        <input type="text" class="form-control" id="numInAlu" placeholder="Opcional." name="numInAlu"
                            value="{{ $datosDomicilio[0] -> no_int }}">
                    </div>
                </div>
                @else
                <input type="hidden" class="form-control" id="idDomicilio" name="idDomicilio"
                    value="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="estadoAlu">Estado</label>
                        <select id="estadoAlu" class="form-control" name="estadoAlu" required>
                            <option value='' selected>Selecciona una opción</option>
                            @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="municipioAlu">Municipio</label>
                        <select id="municipioAlu" class="form-control" name="municipioAlu" required>
                            <option value='' selected>Selecciona una opción</option>
                            @foreach ($municipios as $municipio)
                            <option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="calleAlu">Calle</label>
                        <input type="text" class="form-control" id="calleAlu" placeholder="Calle" name="calleAlu"
                            value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coloniaAlu">Colonia o localidad</label>
                        <input type="text" class="form-control" id="coloniaAlu" placeholder="Colonia o localidad"
                            name="coloniaAlu" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpAlu">Código postal</label>
                        <input type="text" class="form-control" id="cpAlu" placeholder="C.P." name="cpAlu"
                            value="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="numExAlu">Número exterior</label>
                        <input type="text" class="form-control" id="numExAlu" placeholder="No. Ext." name="numExAlu"
                            value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="numInAlu">Número interior</label>
                        <input type="text" class="form-control" id="numInAlu" placeholder="Opcional." name="numInAlu"
                            value="">
                    </div>
                </div>
                @endif
                <div class="text-right">
                    <button type="submit" class="btn btn-alumno" id="btnActualuarDatosDom">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- funciones generales -->
<script src="{{asset('libs//scripts/functionsAlumno.js')}}"></script>
<!-- Constantes -->
<script src="{{asset('libs//scripts/constantes.js')}}"></script>
<!-- Validaciones -->
<script src="{{asset('libs//scripts/validacionesAlumno.js')}}"></script>
<!-- Municipios y estados para select 
<script src="{{asset('libs//scripts/municipios.js')}}"></script>
<script src="{{asset('libs//scripts/select_estados.js')}}"></script>
-->
@endsection