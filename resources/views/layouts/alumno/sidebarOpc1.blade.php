<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Generar
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGenerar1"
        aria-expanded="true" aria-controls="collapseGenerar1">
        <i class="fas fa-file-download"></i>
        <span>Documentos</span>
    </a>
    <div id="collapseGenerar1" class="collapse" aria-labelledby="headingGenerar" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Generar documentos:</h6>
            <a class="collapse-item" href="{{route('GPermiso')}}">Permiso</a>
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
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubir1"
        aria-expanded="true" aria-controls="collapseSubir1">
        <i class="fas fa-file-upload"></i>
        <span>Documentos</span>
    </a>
    <div id="collapseSubir1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Subir documentos:</h6>
            <a class="collapse-item" href="{{route('SPermiso')}}">Permiso firmado</a>
            <a class="collapse-item" href="{{route('SGuiaObs')}}">Guía de observación</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">