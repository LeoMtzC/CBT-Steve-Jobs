@extends('layouts.docente.admin')

@section('titulo')
    <?php
    date_default_timezone_set('America/Mexico_City');
    $Hour = date('G');
    if ( $Hour >= 5 && $Hour <= 11 ) {
        echo "Buenos días";
    } else if ( $Hour >= 12 && $Hour <= 18 ) {
        echo "Buenas tardes";
    } else if ( $Hour >= 19 || $Hour <= 4 ) {
        echo "Buenas noches";
    }
    ?>
@endsection

@section('contenido')

<div class="row">
    <!-- Fecha -->
    <div class="col-xl-12 col-md-6 mb-4 justify-content-end d-flex">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Hoy es</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                date_default_timezone_set('America/Mexico_City');
                                setlocale(LC_ALL,'spanish');
                                echo utf8_encode(strftime("%A %d de %B del %Y"));
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-row">
    <div class="row">
        <div class="col-lg-5">
            <!-- Default Card Example -->
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <p class="h5">
                        Bienvenido/a, ha ingresado como administrador, por lo que desde esta página usted podrá registrar y consultar grupos o alumnos.
                    </p>
                    <br>
                    <p class="h5">
                        Antes de registrar alumnos es necesario dar de alta los grupos, esto evitara problemas durante el proceso de registro.
                    </p>
                    <br>
                    <p class="h5">
                        Puede consultar las diferentes secciones de seguimiento para estar al tanto de los documentos y avances proporcionados por los alumnos.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <!-- Dropdown Card Example -->
            <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_organizing.svg" alt="imagen docente">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection