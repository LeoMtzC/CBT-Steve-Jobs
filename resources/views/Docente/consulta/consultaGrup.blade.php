@extends('layouts.docente.admin')

@section('titulo', 'Consulta de grupos')

@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Datos generales</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Aula</th>
                        <th>Semestre</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456</td>
                        <td>Aula 2</td>
                        <td>2</td>
                        <td>Software</td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>Aula 6</td>
                        <td>3</td>
                        <td>Ventas</td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>Laboratorio de computación</td>
                        <td>4</td>
                        <td>Software</td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>Aula 7</td>
                        <td>5</td>
                        <td>Diseño</td>
                    </tr>
                    <tr>
                        <td>123456</td>
                        <td>Aula 9</td>
                        <td>6</td>
                        <td>Diseño</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div id="btnsHistGrup" hidden class="text-right">
            <button id="btnModifGrup" href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                data-target="#modalModif">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Modificar</span>
            </button>
            <a id="btnHistGrup" href="{{route('ConsultaAlumno')}}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-history"></i>
                </span>
                <span class="text">Ver Historial</span>
            </a>
        </div>
    </div>
</div>

<!-- Modal Modificar -->
<div class="modal fade" id="modalModif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar grupo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group>
                        <label for="claveGrupMod">Clave</label>
                        <input type="text" class="form-control" id="claveGrupMod" placeholder="Clave">
                    </div>
                    <div class="form-group">
                        <label for="gradoGrupMod">Grado</label>
                        <input type="text" class="form-control" id="gradoGrupMod" placeholder="Grado">
                    </div>
                    <div class="form-group">
                        <label for="aulaGrupMod">Aula</label>
                        <input type="text" class="form-control" id="aulaGrupMod" placeholder="Aula">
                    </div>
                    <div class="form-group">
                        <label for="carreraGrupMod">Carrera</label>
                        <select id="carreraGrupMod" class="form-control">
                            <option selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadoGrupMod">Estado</label>
                        <select id="estadoGrupMod" class="form-control">
                            <option selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Historial -->
<div class="modal fade" id="modalHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Historial del grupo.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<!-- Custom scripts -->
<script src="{{asset('libs//datatables/dataTables_logica.js')}}"></script>
@endsection