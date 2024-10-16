<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MEDILaica <sup>v1</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Other items -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fichas médicas:</h6>
                <a class="collapse-item" href="{{ url('/personas') }}">Pacientes</a>
                <a class="collapse-item" href="{{ route('alergias.index') }}">Alergias</a>
                <a class="collapse-item" href="{{ route('vacunas.index') }}">Vacunas</a>
                <a class="collapse-item" href="{{ route('contactos.index') }}">Contactos</a>
                <a class="collapse-item" href="{{ route('cie10.index') }}">C. de Enfermedades</a>

                <h6 class="collapse-header">Gestión de roles:</h6>
                <!-- Enlace para la creación de roles -->
                <a class="collapse-item" href="{{ route('roles.create') }}">Crear Rol</a>
                <!-- Enlace para la asignación de roles -->
                <a class="collapse-item" href="{{ route('roles.assign' , $user->id) }}">Asignar Roles</a>
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
