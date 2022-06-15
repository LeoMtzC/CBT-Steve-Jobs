@extends('layouts.docente.admin')

@section('titulo', 'Consulta de historial por grupos')

@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-docente">Servicio social</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Carrera</th>
                        <th>Aula</th>
                        <th>Semestre</th>
                        <th>Autori 1</th>
                        <th>1° Practica</th>
                        <th>Autori 2</th>
                        <th>2° Practica</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="fas fa-exclamation-triangle"></i></i></td>
                    </tr>
                    <tr>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                    </tr>
                    <tr>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                    </tr>
                    <tr>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                    </tr>
                    <tr>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td>dato</td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                        <td><i class="far fa-check-circle"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div id="btnsSSHistGrup" hidden class="text-right">
            <a id="btnSSDetHistGrup" href="{{route('ServSoc_Alumnos')}}" class="btn btn-alumno btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Ver  detalles</span>
            </a>
            <button id="btnSSHRepGrup" class="btn btn-docente btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-history"></i>
                </span>
                <span class="text">Generar reporte</span>
            </a>
        </button>
    </div>
</div>

<!-- Modal detalles -->
<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles  del grupo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                contenido.
            </div>
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