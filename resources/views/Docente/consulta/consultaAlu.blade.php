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
<div class="card shadow mb-4" id="docVisualizer" hidden>
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
                        <input type="text" class="form-control" id="apPatAluConsul" placeholder="Apellido Paterno"
                            disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatAluConsul">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAluConsul" placeholder="Apellido Materno"
                            disabled>
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
            </form>

            <div class="text-right">
                <a id="btnHist" href="{{route('ConsultaHistAlu')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-history"></i>
                    </span>
                    <span class="text">Ver Historial</span>
                </a>

                <button id="btnDatos" href="#" class="btn btn-success btn-icon-split" data-toggle="modal"
                    data-target="#modalDatos">
                    <span class="icon text-white-50">
                        <i class="fas fa-address-card"></i>
                    </span>
                    <span class="text">Modificar datos</span>
                </button>

                <button id="btnDatosT" href="#" class="btn btn-info btn-icon-split" data-toggle="modal"
                    data-target="#modalDatosTutor">
                    <span class="icon text-white-50">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    <span class="text">Datos del tutor</span>
                </button>
            </div>

            <hr>

            <!-- Documentos visualizador -->
            <h3 for="DocsAlumno">Documentos entregados</h3>
            <select id="DocsAlumno" class="form-control">
                <option selected>Seleccione una opción...</option>
                <option>...</option>
            </select>
            <br>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="img/pdfPlaceholder.png" id="pdfPlaceHolder" alt="responsive image" width="100%"
                        height="100%">
                    <iframe id='frameDoc' src="https://katavalast.files.wordpress.com/2014/05/it-eso.pdf" hidden
                        width="100%" height="100%"></iframe>
                </div>
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
            <div class="modal-body">Cuerpo del historial</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modificar Datos del alumno -->
<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar datos del alumno</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formModAlu">
                    <div class="form-group">
                        <label for="claveGrup">Nombre</label>
                        <input type="text" class="form-control" id="nomAlu" name="nomAlu" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apPatAlu">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatAlu" name="apPatAlu" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <label for="apMatAlu">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAlu" name="apMatAlu" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <label for="matrAlu">Matrícula</label>
                        <input type="text" class="form-control" id="matrAlu" name="matrAlu" placeholder="Matrícula">
                    </div>
                    <div class="form-group">
                        <label for="semesAlu">Semestre</label>
                        <input type="text" class="form-control" id="semesAlu" name="semesAlu" placeholder="Semestre">
                    </div>
                    <div class="form-group">
                        <label for="carreraAlu">Carrera</label>
                        <select id="carreraAlu" name="carreraAlu" class="form-control">
                            <option value="" selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grupoAlu">Grupo</label>
                        <select id="grupoAlu" name="grupoAlu" class="form-control">
                            <option value="" selected>Seleccione una opción...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="btnModAlu" class="btn btn-success">Guardar cambios</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelModAlu" type="button" data-dismiss="modal">Cerrar</button>
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
            <div class="modal-body">
                <form>
                        <div class="form-group">
                            <label for="nomTutCA">Nombre completo</label>
                            <input type="text" readonly class="form-control" id="nomTutCA" placeholder="Nombre del tutor">
                        </div>
                        <div class="form-group">
                            <label for="curpTutCA">CURP</label>
                            <input type="text" readonly class="form-control" id="curpTutCA" placeholder="CURP">
                        </div>
                        <div class="form-group">
                            <label for="emailTutCA">Correo eléctronico</label>
                            <input type="email" readonly class="form-control" id="emailTutCA" placeholder="Correo eléctrónico">
                        </div>
                        <div class="form-group">
                            <label for="telTutCA">Teléfono fijo</label>
                            <input type="tel" readonly class="form-control" id="telTutCA" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="celTutCA">Teléfono celular</label>
                            <input type="tel" readonly class="form-control" id="celTutCA" placeholder="Celular">
                        </div>
                        <div class="form-group">
                            <label for="parentTutCA">Parentezco</label>
                            <select id="parentTutCA" readonly disabled class="form-control">
                                <option selected>Madre...</option>
                                <option>...</option>
                            </select>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
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