@extends('layouts.alumno.admin')

@section('titulo', 'Mis datos')

@section('contenido')

<!-- Datos personales -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDatos" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDatos">
        <h6 class="m-0 font-weight-bold text-primary">Datos personales</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDatos">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomAlu">Nombre</label>
                        <input type="text" class="form-control" id="nomAlu" placeholder="Nombre" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apPatAlu">Apellido paterno</label>
                        <input type="text" class="form-control" id="apPatAlu" placeholder="Apellido Paterno" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="apMatAlu">Apellido materno</label>
                        <input type="text" class="form-control" id="apMatAlu" placeholder="Apellido Materno" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="matrAlu">Matrícula</label>
                        <input type="text" class="form-control" id="matrAlu" placeholder="Matrícula" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="semesAlu">Semestre</label>
                        <input type="text" class="form-control" id="semesAlu" placeholder="Semestre" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="carrAlu">Carrera</label>
                        <input type="text" class="form-control" id="carrAlu" placeholder="Carrera" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="curpAlu">CURP</label>
                        <input type="text" class="form-control" id="curpAlu" placeholder="CURP">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailAlu">Correo eléctronico</label>
                        <input type="email" class="form-control" id="emailAlu" placeholder="Correo eléctrónico">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telAlu">Teléfono</label>
                        <input type="tel" class="form-control" id="telAlu" placeholder="Teléfono">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fechNacAlu">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fechNacAlu" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nssAlu">Numero de seguro social</label>
                        <input type="text" class="form-control" id="nssAlu" placeholder="NSS">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="segMedAlu">Seguro médico</label>
                        <input type="text" class="form-control" id="segMedAlu" placeholder="Seguro médico">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Datos domicilio -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardDomicilio" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardDomicilio">
        <h6 class="m-0 font-weight-bold text-primary">Datos domiciliarios</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardDomicilio">
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="estadoAlu">Estado</label>
                        <select id="estadoAlu" class="form-control">
                            <option selected>Estado...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="municipioAlu">Municipio</label>
                        <select id="municipioAlu" class="form-control">
                            <option selected>Municipio...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="calleAlu">Calle</label>
                        <input type="text" class="form-control" id="calleAlu" placeholder="Calle">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="coloniaAlu">Colonia</label>
                        <input type="text" class="form-control" id="coloniaAlu" placeholder="Colonia">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpAlu">Código postal</label>
                        <input type="text" class="form-control" id="cpAlu" placeholder="C.P.">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="numExAlu">Número exterior</label>
                        <input type="text" class="form-control" id="numExAlu" placeholder="No. Ext.">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="numInAlu">Correo eléctronico</label>
                        <input type="text" class="form-control" id="numInAlu" placeholder="No. Int.">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection