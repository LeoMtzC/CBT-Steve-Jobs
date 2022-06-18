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
            <a class="collapse-item" href="{{route('GCartaAcep')}}">Carta de aceptación</a>
            <!-- <a class="collapse-item" href="{{route('GCartaTer')}}">Carta de termino</a>  Se removió, solo el docente puede generar-->
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
            <a class="collapse-item" href="{{route('SCartaPres')}}">Carta de presentación</a>
            <a class="collapse-item" href="{{route('SCartaAcep')}}">Carta de aceptación</a>
            <a class="collapse-item" href="{{route('SConstaTer')}}">Constancia de término</a>
            <a class="collapse-item" href="{{route('SInforme')}}">Informe</a>
            <a class="collapse-item" href="{{route('SBitacoras')}}">Bitácoras</a>
            <a class="collapse-item" href="{{route('SMTP')}}">MTP</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">