<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-alumno sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('homeAlumno')}}">
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
            @if ($semestreAlumno == 1) <!-- Semestre 1 -->
            @else <!-- Semestre 2,3,4,5,6-->
            <a class="collapse-item" href="{{route('EscenarioR')}}">Escenario real</a>
            @endif
        </div>
    </div>
</li>

@if ($semestreAlumno == 1)
    @include('layouts.alumno.sidebarOpc1') <!-- Semestre 1 -->
@else
    @include('layouts.alumno.sidebarOpc2') <!-- Semestre 2,3,4,5,6-->
@endif



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->