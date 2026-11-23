<header class="topbar m-0 p-0">
    <nav class="navbar navbar-expand-lg w-100 m-0 p-0" style="background-color: #21277b !important" data-bs-theme="dark">
        <div class="row p-0 w-100 text-lg-center align-items-lg-center">
            <div class="logo-container col-4 col-md-2">
                <a class="w-100 text-center" href="/home">
                    <img src="{{asset('img/logo-blanco-noBg.png')}}" alt="Logo" width="100" height="80" class="text-center">
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
                                        <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
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
                                        <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
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
                                        <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
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
                                    <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a></li>
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
            <div class="logout_container col-4 col-md-2 d-flex justify-content-end align-items-center pe-3">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" title="Usuario" class="nav-link dropdown-toggle text-white py-0" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-fw menu-user-icon"></i>
                        </a>

                        @if(session('sesion_iniciada') && isset($usuarioLogueado) && $usuarioLogueado)
                            <ul class="dropdown-menu dropdown-menu-end menu-usuario-dropdown" data-bs-theme="light">
                                <li class="dropdown-item menu-usuario-info">
                                    <span class="menu-usuario-rol">
                                        <i class="fa fa-user fa-fw"></i> {{ $usuarioLogueado->nombre_rol }}
                                    </span>
                                    <h6 class="menu-usuario-nombre mb-0 mt-1">{{ $usuarioLogueado->nombre_completo }}</h6>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item menu-usuario-logout">
                                        <i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        @else
                            <ul class="dropdown-menu dropdown-menu-end menu-usuario-dropdown" data-bs-theme="light">
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item menu-usuario-logout">
                                        <i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
      </nav>
</header>

<style>
    .logout_container .menu-user-icon {
        font-size: 1.75rem;
        line-height: 1;
        vertical-align: middle;
    }

    .logout_container .menu-usuario-dropdown {
        background-color: #fff !important;
        --bs-dropdown-bg: #fff;
        --bs-dropdown-link-color: #212529;
        --bs-dropdown-link-hover-bg: #f1f3f5;
        --bs-dropdown-link-hover-color: #212529;
        --bs-dropdown-link-active-bg: #f1f3f5;
        --bs-dropdown-link-active-color: #212529;
    }

    .logout_container .menu-usuario-info,
    .logout_container .menu-usuario-info:hover,
    .logout_container .menu-usuario-info:focus,
    .logout_container .menu-usuario-info:active {
        background-color: #fff !important;
        color: #212529 !important;
        cursor: default;
    }

    .logout_container .menu-usuario-rol,
    .logout_container .menu-usuario-info:hover .menu-usuario-rol {
        color: #212529 !important;
    }

    .logout_container .menu-usuario-nombre,
    .logout_container .menu-usuario-info:hover .menu-usuario-nombre {
        color: #dc3545 !important;
    }

    .logout_container .menu-usuario-logout,
    .logout_container .menu-usuario-logout:hover,
    .logout_container .menu-usuario-logout:focus,
    .logout_container .menu-usuario-logout:active {
        background-color: #fff !important;
        color: #0d6efd !important;
        text-decoration: none;
    }

    .logout_container .menu-usuario-logout i,
    .logout_container .menu-usuario-logout:hover i {
        color: #212529 !important;
    }

    .logout_container .menu-usuario-logout:hover {
        background-color: #f1f3f5 !important;
    }
</style>
