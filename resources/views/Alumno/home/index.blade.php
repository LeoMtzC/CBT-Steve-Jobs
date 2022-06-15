@extends('layouts.alumno.admin')

@section('titulo')
<?php
    //obtener el nombre del alumno para personalizar el saludo
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
        <div class="card border-left-alumno shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
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
        <div class="col-lg-7">
            <div class="card border-bottom-alumno shadow h-100 py-2">
                <div class="card-body">
                    <p>
                        Recuerda mantener actualizados tus datos personales en la sección <b>'Mis datos'</b>.
                    </p>
                    <p>
                        Te recomendamos las siguientes aplicaciones para poder escanear tus documentos y subirlos
                        adecuadamente:
                    </p>
                    <hr>
                    <p class="text-center">
                        <b>Microsoft Lens</b>
                    </p>
                    <p>
                        Te permite escanear cualquier documento con tu telefóno móvil mediante el uso de la cámara
                        para posteriormente guardar el archivo en diferentes formatos, PDF incluído.
                    </p>
                    <p>
                        Puedes descargarlo para dispositivos android o iOS con los siguientes botones:
                    </p>
                    <div class="row mt-3">
                        <div class="col-sm-12 text-center">
                            <button type="button" class="btn btn-alumno btn-icon center-block"
                                onclick="window.location.href='https://play.google.com/store/apps/details?id=com.microsoft.office.officelens&hl=es_MX&gl=US'"
                                style="
                                        width: 50px;
                                        height: 50px;
                                        padding: 6px 0px;
                                        border-radius: 30px;
                                        font-size: 20px;
                                        line-height: 1.33;">
                                <i class="fab fa-google-play"></i>
                            </button>
                            <button type="button" class="btn btn-alumno btn-icon center-block"
                                onclick="window.location.href='https://apps.apple.com/us/app/microsoft-lens-pdf-scanner/id975925059?itsct=apps_box_link&itscg=30200'"
                                style="
                                        width: 50px;
                                        height: 50px;
                                        padding: 6px 0px;
                                        border-radius: 30px;
                                        font-size: 20px;
                                        line-height: 1.33;">
                                <i class="fab fa-app-store"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 h-100">
            <!-- Dropdown Card Example -->
            <div class="card border-bottom-alumno shadow h-100 py-2">
                <div class="card-body">
                    <div>
                        <p>
                            ¿Necesitas ayuda para utilizar la aplicación? Mira el siguiente video:
                        </p>
                        <iframe class="mt-2" height="300" width="100%" src="https://www.youtube.com/embed/DfvMUH-IPTc"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection