<header class="topbar m-0 p-0">
    <nav class="navbar navbar-expand-lg w-100 m-0 p-0" style="background-color: #21277b !important" data-bs-theme="dark">
        <div class="row p-0 w-100 text-lg-center align-items-lg-center">
            <div class="logo-container col-4 col-md-2">
                <a class="w-100 text-center" href="/home">
                    <img src="{{asset('imagenes/logo-blanco-noBg.png')}}" alt="Logo" width="100" height="80" class="text-center">
                </a>
            </div>
            {{-- ========================================== --}}
            <div class="menu-container col-4 col-md-8">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- <div class="collapse navbar-collapse d-lg-flex justify-content-lg-center" id="navbarNavDropdown"> --}}
                <div class="collapse d-lg-flex justify-content-lg-center" id="navbarNavDropdown">
                    @php
                        $idUsuario = $permiso->id_usuario;
                        $idRol = $permiso->id_rol;
                        $modUsuario = $permiso->mod_usuario;
                        $modClientes = $permiso->mod_clientes;
                        $modCalendario = $permiso->mod_calendario;
                        $modVisitas = $permiso->mod_visitas;
                        $modAvaluo = $permiso->mod_avaluo;
                        $modInformes = $permiso->mod_informes;
                    @endphp

                    {{-- =================================== --}}

                    <ul class="navbar-nav">
                        {{-- AVALUADOR --}}
                        @if ($idUsuario && ($idRol == 2))
                            @if ($modUsuario == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR USUARIOS</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/permisos">Permisos</a></li>
                                        <li><a class="dropdown-item" href="/administrador">Usuarios</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modClientes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR CLIENTES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dirigido_empresa">Empresas</a></li>
                                        <li><a class="dropdown-item" href="/cliente_potencial">Clientes</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modCalendario == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/calendario">CALENDARIO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modVisitas == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/visita">VISITAS</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modAvaluo == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/avaluos">AVALÚO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modInformes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">INFORMES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/cotizador">Informe Clientes</a></li>
                                        <li><a class="dropdown-item" href="/visita">Informe 2</a></li>
                                    </ul>
                                </li>
                            @endif
                        {{-- VISITADOR --}}
                        @elseif($idUsuario && ($idRol == 3))
                            @if ($modUsuario == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR USUARIOS</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/permisos">Permisos</a></li>
                                        <li><a class="dropdown-item" href="/administrador">Usuarios</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modClientes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR CLIENTES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dirigido_empresa">Empresas</a></li>
                                        <li><a class="dropdown-item" href="/cliente_potencial">Clientes</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modCalendario == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/calendario">CALENDARIO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modVisitas == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/visita">VISITAS</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modAvaluo == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/avaluos">AVALÚO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modInformes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">INFORMES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/cotizador">Informe Clientes</a></li>
                                        <li><a class="dropdown-item" href="/visita">Informe 2</a></li>
                                    </ul>
                                </li>
                            @endif
                        {{-- EMPLEADO --}}
                        @elseif($idUsuario && ($idRol == 4))
                            @if ($modUsuario == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR USUARIOS</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/permisos">Permisos</a></li>
                                        <li><a class="dropdown-item" href="/administrador">Usuarios</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modClientes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR CLIENTES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/dirigido_empresa">Empresas</a></li>
                                        <li><a class="dropdown-item" href="/cliente_potencial">Clientes</a></li>
                                    </ul>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modCalendario == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/calendario">CALENDARIO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modVisitas == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/visita">VISITAS</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modAvaluo == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/avaluos">AVALÚO</a>
                                </li>
                            @endif
                            {{-- ==================== --}}
                            @if ($modInformes == 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">INFORMES</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/cotizador">Informe Clientes</a></li>
                                        <li><a class="dropdown-item" href="/visita">Informe 2</a></li>
                                    </ul>
                                </li>
                            @endif
                        {{-- ADMINISTRADOR --}}
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR USUARIOS</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/permisos">Permisos</a></li>
                                    <li><a class="dropdown-item" href="/administrador">Usuarios</a></li>
                                    {{-- <li><a class="dropdown-item" href="/informe">Informe Avaluo</a></li> --}}
                                </ul>
                            </li>
                            {{-- ==================== --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">GESTOR CLIENTES</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dirigido_empresa">Empresas</a></li>
                                    <li><a class="dropdown-item" href="/cliente_potencial">Clientes</a></li>
                                </ul>
                            </li>
                            {{-- ==================== --}}
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/calendario">CALENDARIO</a>
                            </li>
                            {{-- ==================== --}}
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/visita">VISITAS</a>
                            </li>
                            {{-- ==================== --}}
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/avaluos">AVALÚO</a>
                            </li>
                            {{-- ==================== --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">INFORMES</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/cotizador">Informe Clientes</a></li>
                                    <li><a class="dropdown-item" href="/visita">Informe 2</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            {{-- ========================================== --}}
            <div class="logout_container col-4 col-md-2">
                <a href="{{route('logout')}}" title="SALIR" class="">
                    <i class="fa fa-sign-out fa-3x" aria-hidden="false"></i>
                </a>
            </div>
        </div>
      </nav>
</header>
