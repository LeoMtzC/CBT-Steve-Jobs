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

    <link rel="icon" href="../../../img/icono.png">
</head>

<body class="bg-gradient-alumno">

    <div class="container h-100">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-md-center align-items-center vh-100">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                    </div>
                                    <form action="/login" method="POST" class="user" id="formLogin">
                                    @csrf
                                    @include('layouts.partials.messages')
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="matricula" name="email" autocomplete="username" required focused
                                                placeholder="Matrícula" pattern="[0-9]+" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" required
                                                placeholder="Contraseña" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <div id="captchaImagenCodigo" class="preview">
                                                <canvas id="CapCode" class="capcode" style="width:100%; height:100%"></canvas>
                                            </div>
                                            <input type="text" class="form-control form-control-user" 
                                                id="usuarioCaptcha" placeholder="Ingrese el código de seguridad"
                                                aria-label="Captcha" aria-describedby="basic-addon2" required />  
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-alumno refresh" type="button" id="refreshCaptcha" onclick='crearCaptcha();'><i class="fas fa-redo "></i></button>
                                            </div>
                                        </div>
                                        <span id="msjErrorCaptcha" class="caperror"></span>
                                        <hr>
                                        <button type="submit" id="btnLogin"
                                            class="btn btn-docente btn-user btn-block">
                                                Entrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.partials.footer')
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('libs/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.js')}}"></script>

    <!-- Bootbox -->
    <script src="{{asset('libs/sbadmin/js/bootbox.all.min.js')}}"></script>

    <!-- Scripts para login-->
    <script src="{{asset('libs//scripts/functionsLogin.js')}}"></script>
    <script src="{{asset('libs//scripts/constantes.js')}}"></script>

</body>

</html>