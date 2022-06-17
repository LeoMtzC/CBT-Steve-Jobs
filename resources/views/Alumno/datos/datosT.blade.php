@extends('layouts.alumno.admin')

@section('titulo', 'Datos del tutor')

@section('contenido')

    <!-- Datos del tutor -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-alumno">Tutor</h6>
        </div>
        <div class="card-body">
            <form id="formDatosTutor">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomTut">Nombre</label>
                        <input type="text" class="form-control" id="nomTut" placeholder="Nombre del tutor"
                            name="nomTut" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatTut">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatTut" placeholder="Apellido Paterno"
                            name="apPatTut" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatTut">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatTut" placeholder="Apellido Materno"
                            name="apMatTut" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpTut">CURP</label>
                        <input type="text" class="form-control" id="curpTut" placeholder="CURP"
                            name="curpTut" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailTut">Correo eléctronico</label>
                        <input type="email" class="form-control" id="emailTut" placeholder="Correo eléctrónico"
                            name="emailTut" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telTut">Teléfono fijo</label>
                        <input type="tel" class="form-control" id="telTut" placeholder="Teléfono"
                            name="telTut" required>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="celTut">Teléfono celular</label>
                        <input type="tel" class="form-control" id="celTut" placeholder="Celular"
                            name="celTut" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parentTut">Parentesco</label>
                        <select id="parentTut" class="form-control" name="parentTut" required>
                            <option selected value="">Seleccione una opción...</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Abuelo">Abuelo</option>
                            <option value="Abuela">Abuela</option>
                            <option value="Tío">Tío</option>
                            <option value="Tía">Tía</option>
                            <option value="Padrino">Padrino</option>
                            <option value="Madrina">Madrina</option>
                            <option value="Hermano">Hermano</option>
                            <option value="Hermana">Hermana</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-alumno" id="btnActualuarDatosTutor">Actualizar</button>
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