@extends('layouts.alumno.admin')

@section('titulo', 'Escenario real')

@section('contenido')

@include('layouts.partials.messages')

    <!-- Datos del escenario real -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Datos</h6>
        </div>
        <div class="card-body">
            <form action="/escenario-real" method="POST" id="formDatosEscReal">
                @csrf
                @if($datosEscenario->first())
                <input type="hidden" class="form-control" id="idER" name="idER"
                    value="{{ $datosEscenario[0] -> id }}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomER">Nombre del establecimiento</label>
                        <input type="text" class="form-control" id="nomER" placeholder="Nombre del lugar"
                            name="nomER" value="{{ $datosEscenario[0] -> nombreEsc }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dirER">Dirección</label>
                        <textarea  type="text" class="form-control" id="dirER" rows="1" cols="50" placeholder="Dirección completa"
                            name="dirER" required>{{ $datosEscenario[0] -> direccion }}</textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telER">Teléfono</label>
                        <input type="text" class="form-control" id="telER" placeholder="Teléfono"
                            name="telER" value="{{ $datosEscenario[0] -> telefono }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="respER">Nombre del responsable</label>
                        <input type="text" class="form-control" id="respER" placeholder="Nombre"
                            name="respER" value="{{ $datosEscenario[0] -> nombreResp }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatER">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatER" placeholder="Apellido paterno"
                            name="apPatER" value="{{ $datosEscenario[0] -> apPatResp }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatER">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatER" placeholder="Apellido materno"
                            name="apMatER" value="{{ $datosEscenario[0] -> apMatResp }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cargoER">Cargo</label>
                        <input type="text" class="form-control" id="cargoER" placeholder="Cargo del responsable"
                            name="cargoER" value="{{ $datosEscenario[0] -> cargoResp }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechIniER">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechIniER" placeholder=""
                            name="fechIniER" value="{{ $datosEscenario[0] -> fecha_ini }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechTerER">Fecha de termino</label>
                        <input type="date" class="form-control" id="fechTerER" placeholder=""
                            name="fechTerER" value="{{ $datosEscenario[0] -> fecha_term }}" required>
                    </div>
                </div>
                @else
                <input type="hidden" class="form-control" id="idER" name="idER"
                    value="">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomER">Nombre del establecimiento</label>
                        <input type="text" class="form-control" id="nomER" placeholder="Nombre del lugar"
                            name="nomER" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dirER">Dirección</label>
                        <textarea  type="text" class="form-control" id="dirER" rows="1" cols="50" placeholder="Dirección completa"
                            name="dirER" required></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telER">Teléfono</label>
                        <input type="text" class="form-control" id="telER" placeholder="Teléfono"
                            name="telER" value="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="respER">Nombre del responsable</label>
                        <input type="text" class="form-control" id="respER" placeholder="Nombre"
                            name="respER" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatER">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatER" placeholder="Apellido paterno"
                            name="apPatER" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatER">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatER" placeholder="Apellido materno"
                            name="apMatER" value="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cargoER">Cargo</label>
                        <input type="text" class="form-control" id="cargoER" placeholder="Cargo del responsable"
                            name="cargoER" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechIniER">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechIniER" placeholder=""
                            name="fechIniER" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechTerER">Fecha de termino</label>
                        <input type="date" class="form-control" id="fechTerER" placeholder=""
                            name="fechTerER" value="" required>
                    </div>
                </div>
                @endif
                <div class="text-right">
                    <button type="submit" class="btn btn-alumno" id="btnActualuarDatosEscReal">Actualizar</button>
                </div>
            </form>
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
@endsection