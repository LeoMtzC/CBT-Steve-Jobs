@extends('layouts.docente.admin')

@section('titulo', 'Registro de grupos')

@section('contenido')

<!-- Datos personales -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDatos" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDatos">
        <h6 class="m-0 font-weight-bold text-success">Datos de grupo</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDatos">
        <div class="card-body">
            <form id="formRegGrup">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="claveGrup">Clave</label>
                        <input type="text" class="form-control" id="claveGrup" name="claveGrup" placeholder="Clave">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="semesGrup">Semestre</label>
                        <input type="text" class="form-control" id="semesGrup" name="semesGrup" placeholder="Semestre">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="aulaGrup">Aula</label>
                        <input type="text" class="form-control" id="aulaGrup" name="aulaGrup" placeholder="Aula">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="carreraGrup">Carrera</label>
                        <select id="carreraGrup" name="carreraGrup" class="form-control">
                            <option value="" selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estadoGrup">Estado</label>
                        <select id="estadoGrup" name="estadoGrup" class="form-control">
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
                    <button id="btnRegGrupo" type="submit" class="btn btn-success">Registrar</button>
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
                    <button class="btn btn-success" id="limpiarButtonGrup"" type="button" data-dismiss="modal">Limpiar</button>
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