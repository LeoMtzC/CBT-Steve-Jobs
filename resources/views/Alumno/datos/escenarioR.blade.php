@extends('layouts.alumno.admin')

@section('titulo', 'Escenario real')

@section('contenido')

    <!-- Datos del escenario real -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomER">Nombre del establecimiento</label>
                        <input type="text" class="form-control" id="nomER" placeholder="Nombre del lugar">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dirER">Dirección</label>
                        <input type="text" class="form-control" id="dirER" placeholder="Dirección completa">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telER">Teléfono</label>
                        <input type="text" class="form-control" id="telER" placeholder="Teléfono">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="respER">Nombre del responsable</label>
                        <input type="text" class="form-control" id="respER" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatER">Apellido paterno</label>
                        <input type="email" class="form-control" id="apPatER" placeholder="Apellido paterno">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatER">Apellido materno</label>
                        <input type="tel" class="form-control" id="apMatER" placeholder="Apellido materno">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fechIniER">Fecha de inicio</label>
                        <input type="date" class="form-control" id="fechIniER" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fechTerER">Fecha de termino</label>
                        <input type="date" class="form-control" id="fechTerER" placeholder="">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

@endsection