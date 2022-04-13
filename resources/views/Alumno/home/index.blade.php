@extends('layouts.admin')

@section('titulo', 'Bienvenido')

@section('contenido')

<div class="row">
    <!-- Fecha -->
    <div class="col-xl-12 col-md-6 mb-4 justify-content-end d-flex">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Hoy es</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                date_default_timezone_set('America/Mexico_City');
                                setlocale(LC_ALL,'spanish');
                                echo utf8_encode(strftime("%A %d de %B del %Y"));
                                //echo date('l jS \of F Y');
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
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <p>
                        Recuerda mantener actualizados tus datos personales en la sección <b>'Mis datos'</b>.
                    </p>
                    <p>
                        Más texto bla bla bla...
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <!-- Dropdown Card Example -->
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_exams.svg" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection