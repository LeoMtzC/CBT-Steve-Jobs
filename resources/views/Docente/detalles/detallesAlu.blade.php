@extends('layouts.docente.admin')

@section('titulo', 'Consulta de historial por alumnos')

@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-docente">Datos del alumno</h6>
    </div>
    <div class="card-body">
        <!-- Datos -->
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="matrAluDetall">Matrícula</label>
                    <input type="text" class="form-control" id="matrAluDetall" placeholder="Matrícula" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="nomAluDetall">Nombre</label>
                    <input type="text" class="form-control" id="nomAluDetall" placeholder="Nombre completo" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="semesAluDetall">Semestre</label>
                    <input type="text" class="form-control" id="semesAluDetall" placeholder="Semestre" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="grupoAluDetall">Grupo</label>
                    <input type="text" class="form-control" id="grupoAluDetall" placeholder="Grupo" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="carrAluDetall">Carrera</label>
                    <input type="text" class="form-control" id="carrAluDetall" placeholder="Carrera" disabled>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Carta de término -->
<div class="card shadow mb-4">
    <div class="card-body">
        <h3>Carta de término</h3>
        <p>A continuación puede editar los datos con los que la carta de término del alumno será generada</p>
        <hr>
        <form id="formCartaTer">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nomERDetall">Nombre del establecimiento</label>
                    <input type="text" class="form-control" id="nomERDetall" name="nomERDetall"
                        placeholder="Nombre del lugar">
                </div>
                <div class="form-group col-md-4">
                    <label for="dirERDetall">Dirección</label>
                    <input type="text" class="form-control" id="dirERDetall" name="dirERDetall"
                        placeholder="Dirección completa">
                </div>
                <div class="form-group col-md-4">
                    <label for="telERDetall">Teléfono</label>
                    <input type="text" class="form-control" id="telERDetall" name="telERDetall" placeholder="Teléfono">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="respERDetall">Nombre del responsable</label>
                    <input type="text" class="form-control" id="respERDetall" name="respERDetall" placeholder="Nombre">
                </div>
                <div class="form-group col-md-4">
                    <label for="fechIniERDetall">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fechIniERDetall" name="fechIniERDetall" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="fechTerERDetall">Fecha de termino</label>
                    <input type="date" class="form-control" id="fechTerERDetall" name="fechTerERDetall" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="horasERDetall">Horas</label>
                    <input type="text" class="form-control" id="horasERDetall" name="horasERDetall" placeholder="Horas">
                </div>
            </div>
            <div class="text-right">
                <button type="submit" id="btnGenCT" class="btn btn-docente">Generar C. Termino</button>
            </div>
        </form>
        <hr>
        <div class="form-row align-bottom align-items-end">
            <div class="form-group col-md-4">
                <label for="DocsERDetall">Documentos entregados</label>
                <select id="DocsERDetall" class="form-control">
                    <option selected>Seleccione una opción...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-alumno">Consultar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <!-- Script dataTables -->
    <script src="{{asset('libs//datatables/dataTables_logica.js')}}"></script>
    <!-- Funciones -->
    <script src="{{asset('libs//scripts/functionsDocente.js')}}"></script>
    <!-- Constantes -->
    <script src="{{asset('libs//scripts/constantes.js')}}"></script>
    <!-- Validaciones -->
    <script src="{{asset('libs//scripts/validacionesDocente.js')}}"></script>
@endsection