<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('libs/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.css')}}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="min-vh-100 text-center m-0 d-flex flex-column justify-content-center">
                    <div class="error mx-auto" data-text="🦅">🦅</div>
                    <p class="lead text-gray-800 mb-5">¡Vaya!</p>
                    <p class="text-gray-500 mb-0">Parece que no tienes permiso para ver esto...</p>
                    <a href="/login">&larr; Volver</a>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.partials.footer')
        <!-- End of Footer -->
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('libs/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Scripts custom generales -->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.js')}}"></script>

</body>

</html>