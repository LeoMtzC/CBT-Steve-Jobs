<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-docente sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeDocente')}}">
    <div class="sidebar-brand-icon">
        <img class="img-fluid" style="width: 75%; height: auto;"
                            src="img/halcones.png" alt="imagen docente">
    </div>
    <!-- <div class="sidebar-brand-text mx-3">CBT<br><sup> Steve Jobs</sup></div> -->
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('homeDocente')}}">
        <i class="fas fa-home"></i>
        <span>Inicio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Estudiantes
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAlumnos"
        aria-expanded="true" aria-controls="collapseAlumnos">
        <i class="fas fa-clipboard-list"></i>
        <span>Alumnos</span>
    </a>
    <div id="collapseAlumnos" class="collapse" aria-labelledby="headingDatosP" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="{{route('RegistroAlumno')}}">Registrar</a>
            <a class="collapse-item" href="{{route('ConsultaAlumno')}}">Consultar</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGrupos"
        aria-expanded="true" aria-controls="collapseGrupos">
        <i class="fas fa-user-friends"></i>
        <span>Grupos</span>
    </a>
    <div id="collapseGrupos" class="collapse" aria-labelledby="headingDatosP" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="{{route('RegistroGrupo')}}">Registrar</a>
            <a class="collapse-item" href="{{route('ConsultaGrupo')}}">Consultar</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Seguimiento
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('PractObs_Grupos')}}">
        <i class="fas fa-file-alt"></i>
        <span>Prácticas de observación</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('PractEjec_Grupos')}}">
        <i class="fas fa-file-alt"></i>
        <span>Prácticas de ejecución</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('ServSoc_Grupos')}}">
        <i class="fas fa-file-alt"></i>
        <span>Servicio social</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{route('Estadias_Grupos')}}">
        <i class="fas fa-file-alt"></i>
        <span>Estadía</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->