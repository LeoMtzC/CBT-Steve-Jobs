@extends('layouts.docente.admin')

@section('titulo', 'Consulta de alumnos')

@section('contenido')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Alumnos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre completo</th>
                        <th>Carrera</th>
                        <th>Semestre</th>
                        <th>Grupo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>MAT_123456</td>
                        <td>José Pérez López</td>
                        <td>Software</td>
                        <td>3</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>MAT_123456</td>
                        <td>Raúl Chávez Rosas</td>
                        <td>Software</td>
                        <td>4</td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td>MAT_123456</td>
                        <td>María Vázques Díaz</td>
                        <td>Diseño</td>
                        <td>5</td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td>MAT_123456</td>
                        <td>Diana Paz Contreras</td>
                        <td>Diseño</td>
                        <td>6</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>MAT_123456</td>
                        <td>Mauricio Guerrero Rodríguez</td>
                        <td>Diseño</td>
                        <td>2</td>
                        <td>B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Datos personales -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDatos" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDatos">
        <h6 class="m-0 font-weight-bold text-success">Datos del alumno</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDatos">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomAluConsul">Nombre</label>
                        <input type="text" class="form-control" id="nomAluConsul" placeholder="Nombre" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatAluConsul">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatAluConsul" placeholder="Apellido Paterno" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatAluConsul">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAluConsul" placeholder="Apellido Materno" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matrAluConsul">Matrícula</label>
                        <input type="text" class="form-control" id="matrAluConsul" placeholder="Matrícula" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="curpAluConsul">CURP</label>
                        <input type="text" class="form-control" id="curpAluConsul" placeholder="CURP" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nssAluConsul">Número de seguridad social</label>
                        <input type="text" class="form-control" id="nssAluConsul" placeholder="NSS" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fecNacAluConsul">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecNacAluConsul" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mailAluConsul">CURP</label>
                        <input type="mail" class="form-control" id="mailAluConsul" placeholder="correo" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telAluConsul">Número de seguridad social</label>
                        <input type="phone" class="form-control" id="telAluConsul" placeholder="Teléfono" disabled>
                    </div>
                </div>

                <hr>
                    
                <div class="text-right">
                    <button id="btnHist" href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                        data-target="#modalHistorial" disabled>
                        <span class="icon text-white-50">
                            <i class="fas fa-history"></i>
                        </span>
                        <span class="text">Ver Historial</span>
                    </button>

                    <button id="btnDatos" href="#" class="btn btn-success btn-icon-split" data-toggle="modal"
                        data-target="#modalDatos" disabled>
                        <span class="icon text-white-50">
                            <i class="fas fa-address-card"></i>
                        </span>
                        <span class="text">Datos Generales</span>
                    </button>

                    <button id="btnDatosT" href="#" class="btn btn-info btn-icon-split" data-toggle="modal"
                        data-target="#modalDatosTutor" disabled>
                        <span class="icon text-white-50">
                            <i class="fas fa-user-tie"></i>
                        </span>
                        <span class="text">Datos del tutor</span>
                    </button>
                </div>
            </form>
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
            <div class="modal-body">Cuerpo del historial</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Datos -->
<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del alumno</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Datos de alumno seleccionado.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Datos Tutor -->
<div class="modal fade" id="modalDatosTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del tutor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Datos del tutor del alumno seleccionado.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection