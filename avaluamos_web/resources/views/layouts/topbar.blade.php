<header class="topbar m-0 p-0">
    <nav class="navbar navbar-expand-lg w-100 m-0 p-0 text-white" style="background-color: #21277b !important" data-bs-theme="dark">
        <div class="container-fluid d-flex justify-content-between p-0 text-white">
            <div class="d-sm-none d-md-inline-flex">
                <a class="" href="/home">
                    <img src="{{asset('imagenes/logo-blanco-noBg.png')}}" alt="Logo" width="100" height="80" class="">
                </a>
            </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR USUARIOS</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/permisos">Permisos</a></li>
                                <li><a class="dropdown-item" href="/administrador">Usuarios</a></li>
                                {{-- <li><a class="dropdown-item" href="/informe">Informe Avaluo</a></li> --}}
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR CLIENTES</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dirigido_empresa">Empresas</a></li>
                                <li><a class="dropdown-item" href="/cliente_potencial">Clientes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/calendario">CALENDARIO</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">AVALUO</a>
                            <ul class="dropdown-menu">
                                {{-- <li><a class="dropdown-item" href="/cotizador">Cotización</a></li> --}}
                                <li><a class="dropdown-item" href="/visita">Visitas</a></li>
                                <li><a class="dropdown-item" href="/informe">Generar Avalúo</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">INFORMES</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/cotizador">Informe Clientes</a></li>
                                <li><a class="dropdown-item" href="/visita">Informe 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="">
                <a href="{{route('logout')}}" title="SALIR">
                    <i class="fa fa-sign-out fa-3x" aria-hidden="false"></i>
                </a>
            </div>
        </div>
      </nav>
</header>