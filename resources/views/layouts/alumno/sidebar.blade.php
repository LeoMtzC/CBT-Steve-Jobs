<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeAlumno')}}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-graduation-cap"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CBT<br><sup> Steve Jobs</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('homeAlumno')}}">
        <i class="fas fa-home"></i>
        <span>Inicio</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Datos
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDatosP"
        aria-expanded="true" aria-controls="collapseDatosP">
        <i class="fas fa-user"></i>
        <span>Mis datos</span>
    </a>
    <div id="collapseDatosP" class="collapse" aria-labelledby="headingDatosP" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Información personal:</h6>
            <a class="collapse-item" href="{{route('DatosPAlumno')}}">Datos personales</a>
            <a class="collapse-item" href="{{route('DatosTAlumno')}}">Datos del tutor</a>
            <a class="collapse-item" href="{{route('subirDocsAlu')}}">Subir documentos</a>
            <a class="collapse-item" href="{{route('EscenarioR')}}">Escenario real</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Generar
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGenerar"
        aria-expanded="true" aria-controls="collapseGenerar">
        <i class="fas fa-file-download"></i>
        <span>Documentos</span>
    </a>
    <div id="collapseGenerar" class="collapse" aria-labelledby="headingGenerar" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Generar documentos:</h6>
            <a class="collapse-item" href="{{route('GCartaAut')}}">Carta de autorización</a>
            <a class="collapse-item" href="{{route('GCartaPres')}}">Carta de presentación</a>
            <a class="collapse-item" href="{{route('GCartaTer')}}">Carta de termino</a>
            <a class="collapse-item" href="{{route('GInforme')}}">Informe</a>
            <a class="collapse-item" href="{{route('GBitacora')}}">Bitácora</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Subir
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-file-upload"></i>
        <span>Documentos</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subir documentos:</h6>
            <a class="collapse-item" href="{{route('SCartaAut')}}">Carta de autorización</a>
            <a class="collapse-item" href="{{route('SCartaTer')}}">Carta de termino</a>
            <a class="collapse-item" href="{{route('SInforme')}}">Informe</a>
            <a class="collapse-item" href="{{route('SMTP')}}">MTP</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->