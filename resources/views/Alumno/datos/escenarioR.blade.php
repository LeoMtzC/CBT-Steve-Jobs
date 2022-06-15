@extends('layouts.alumno.admin')

@section('titulo', 'Escenario real')

@section('contenido')

    <!-- Datos del escenario real -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Datos</h6>
        </div>
        <div class="card-body">
            <form id="formDatosEscReal">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomER">Nombre del establecimiento</label>
                        <input type="text" class="form-control" id="nomER" placeholder="Nombre del lugar"
                            name="nomER" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dirER">Dirección</label>
                        <input type="text" class="form-control" id="dirER" placeholder="Dirección completa"
                            name="dirER" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telER">Teléfono</label>
                        <input type="text" class="form-control" id="telER" placeholder="Teléfono"
                            name="telER" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="respER">Nombre del responsable</label>
                        <input type="text" class="form-control" id="respER" placeholder="Nombre"
                            name="respER" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatER">Apellido paterno</label>
                        <input type="email" class="form-control" id="apPatER" placeholder="Apellido paterno"
                            name="apPatER" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatER">Apellido materno</label>
                        <input type="tel" class="form-control" id="apMatER" placeholder="Apellido materno"
                            name="apMatER" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fechIniER">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechIniER" placeholder=""
                            name="fechIniER" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechTerER">Fecha de termino</label>
                        <input type="date" class="form-control" id="fechTerER" placeholder=""
                            name="fechTerER" required>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="btnActualuarDatosEscReal">Actualizar</button>
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