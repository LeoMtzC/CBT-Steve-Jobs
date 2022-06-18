@extends('layouts.docente.admin')

@section('titulo', 'Consulta de historial completo del alumno')

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
                    <label for="matrAluHist">Matrícula</label>
                    <input type="text" class="form-control" id="matrAluHist" placeholder="Matrícula" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="nomAluHist">Nombre</label>
                    <input type="text" class="form-control" id="nomAluHist" placeholder="Nombre completo" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="semesAluHist">Semestre</label>
                    <input type="text" class="form-control" id="semesAluHist" placeholder="Semestre" disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="curpAluHist">CURP</label>
                    <input type="text" class="form-control" id="curpAluHist" placeholder="curp" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="carrAluHist">Carrera</label>
                    <input type="text" class="form-control" id="carrAluHist" placeholder="Carrera" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="nssAluHist">Número de seguro social</label>
                    <input type="text" class="form-control" id="nssAluHist" placeholder="NSS" disabled>
                </div>
            </div>
        </form>
        <!-- Tabla -->
        <div class="table-responsive table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Semestre</th>
                        <th>Escenario</th>
                        <th>Tipo</th>
                        <th>inicio</th>
                        <th>Termino</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ciber Perla</td>
                        <td>Cibercafé</td>
                        <td>15/02/2021</td>
                        <td>16/05/2021</td>
                        <td>Estado</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>CBT Steve Jobs</td>
                        <td>Escuela</td>
                        <td>15/08/2021</td>
                        <td>16/11/2021</td>
                        <td>Estado</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lugar</td>
                        <td>Tipo</td>
                        <td>15/02/2021</td>
                        <td>16/05/2021</td>
                        <td>Estado</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Lugar</td>
                        <td>Tipo</td>
                        <td>15/02/2021</td>
                        <td>16/05/2021</td>
                        <td>Estado</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Lugar</td>
                        <td>Tipo</td>
                        <td>15/02/2021</td>
                        <td>16/05/2021</td>
                        <td>Estado</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div id="btnsDetallesAlu" hidden class="text-right">
            <a id="btnDetallesAlu" href="{{route('detallesAlu')}}" class="btn btn-alumno btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-info-circle"></i>
                </span>
                <span class="text">Ver detalles</span>
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <!-- Custom scripts -->
    <script src="{{asset('libs//datatables/dataTables_logica.js')}}"></script>
@endsection