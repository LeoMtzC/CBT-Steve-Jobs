@extends('layouts.alumno.admin')

@section('titulo', 'Datos del tutor')

@section('contenido')

    <!-- Datos del tutor -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tutor</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomTut">Nombre</label>
                        <input type="text" class="form-control" id="nomTut" placeholder="Nombre del tutor">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatTut">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatTut" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatTut">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatTut" placeholder="Apellido Materno">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpTut">CURP</label>
                        <input type="text" class="form-control" id="curpTut" placeholder="CURP">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailTut">Correo eléctronico</label>
                        <input type="email" class="form-control" id="emailTut" placeholder="Correo eléctrónico">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telTut">Teléfono fijo</label>
                        <input type="tel" class="form-control" id="telTut" placeholder="Teléfono">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="celTut">Teléfono celular</label>
                        <input type="tel" class="form-control" id="celTut" placeholder="Celular">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parentTut">Parentezco</label>
                        <select id="parentTut" class="form-control">
                            <option selected>Madre...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

@endsection