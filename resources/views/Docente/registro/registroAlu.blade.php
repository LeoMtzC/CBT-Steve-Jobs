@extends('layouts.docente.admin')

@section('titulo', 'Registro de alumnos')

@section('contenido')

<!-- Datos personales -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDatos" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDatos">
        <h6 class="m-0 font-weight-bold text-docente">Datos generales</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDatos">
        <div class="card-body">
            <form id="formRegAlu">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomAlu">Nombre</label>
                        <input type="text" class="form-control" id="nomAlu" name="nomAlu" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatAlu">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatAlu" name="apPatAlu" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatAlu">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAlu" name="apMatAlu" placeholder="Apellido Materno">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matrAlu">Matrícula</label>
                        <input type="text" class="form-control" id="matrAlu" name="matrAlu" placeholder="Matrícula">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="semesAlu">Semestre</label>
                        <input type="text" class="form-control" id="semesAlu" name="semesAlu" placeholder="Semestre">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carreraAlu">Carrera</label>
                        <select id="carreraAlu" name="carreraAlu" class="form-control">
                            <option value="" selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="grupoAlu">Grupo</label>
                        <select id="grupoAlu" name="grupoAlu" class="form-control">
                            <option value="" selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="text-right">
                    <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#confirmModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash-alt"></i>
                        </span>
                        <span class="text">Limpiar</span>
                    </a>
                    <button id="btnRegAlu" type="submit" class="btn btn-docente">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Limpiar Modal-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Limpiar datos?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">El formulario quedará en blanco ¿continuar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-docente" id="limpiarButtonAlu"" type="button" data-dismiss="modal">Limpiar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Funciones -->
    <script src="{{asset('libs//scripts/functionsDocente.js')}}"></script>
    <!-- Constantes -->
    <script src="{{asset('libs//scripts/constantes.js')}}"></script>
    <!-- Validaciones -->
    <script src="{{asset('libs//scripts/validacionesDocente.js')}}"></script>
@endsection