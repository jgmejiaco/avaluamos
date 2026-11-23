<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Avaluamos - @yield('title')</title>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{asset('img/logo_avaluamos.png')}}" type="image/x-icon">

        {{-- Bootstrap 5.3.2 --}}
        <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.5.3.2.min.css')}}">

        {{-- FontAwesome --}}
        <link rel="stylesheet" href="{{asset('font-awesome-4.5.0/css/font-awesome.min.css')}}">

        {{-- Select2 --}}
        <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">

        {{-- DataTables --}}
        <link href="{{asset('dataTable2.3.1/css/1.13.7dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('dataTable2.3.1/css/2.4.2buttons.bootstrap5.min.css')}}" rel="stylesheet">

        {{-- Sweetalert2 --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.min.css')}}">

        {{-- Estilos propios --}}
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- jQuery (antes de cualquier plugin) --}}
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>

        @yield('css')
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                @if(Request()->path() == '/' || Request()->path() == "login")
                    @include('layouts.topbar_login')
                @elseif(Request()->path() == "recuperar")
                    @include('layouts.topbar_login')
                @else
                    @include('layouts.topbar')
                @endif

                <div class="flex-center position-ref full-height">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')

        {{-- Bootstrap 5.3.2 (bundle incluye Popper) --}}
        <script src="{{asset('bootstrap/bootstrap5.3.2.bundle.min.js')}}"></script>

        {{-- Select2 --}}
        <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}"></script>

        {{-- DataTables Core --}}
        <script src="{{ asset('dataTable2.3.1/js/1.13.7jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dataTable2.3.1/js/1.13.7dataTables.bootstrap5.min.js') }}"></script>

        {{-- DataTables Buttons --}}
        <script src="{{ asset('dataTable2.3.1/js/2.4.2dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('dataTable2.3.1/js/3.10.1jszip.min.js') }}"></script>
        <script src="{{ asset('dataTable2.3.1/js/0.1.53pdfmake.min.js') }}"></script>
        <script src="{{ asset('dataTable2.3.1/js/0.1.53vfs_fonts.js') }}"></script>
        <script src="{{ asset('dataTable2.3.1/js/2.4.2buttons.html5.min.js') }}"></script>
        <script src="{{ asset('js/datatables-defaults.js') }}"></script>
        <script>
            $.extend(true, $.fn.dataTable.defaults, {
                language: { url: @json(asset('dataTable2.3.1/language/es-Es.json')) }
            });
        </script>

        {{-- Sweetalert2 --}}
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

        <script>
            $(document).ajaxError(function (_event, jqxhr) {
                if (jqxhr.status === 401 && jqxhr.responseJSON && jqxhr.responseJSON.sesion_expirada) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'La sesión se cierra',
                        text: 'La vigencia de la sesión terminó.',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                    }).then(function () {
                        window.location.href = @json(route('inicio'));
                    });
                }
            });

            @if(session('sesion_iniciada') && session('api_jwt_exp'))
            (function () {
                var espera = ({{ (int) session('api_jwt_exp') }} * 1000) - Date.now();

                if (espera < 0) {
                    espera = 0;
                }

                setTimeout(function () {
                    Swal.fire({
                        icon: 'warning',
                        title: 'La sesión se cierra',
                        text: 'La vigencia de la sesión terminó.',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                    }).then(function () {
                        window.location.href = @json(route('inicio'));
                    });
                }, espera);
            })();
            @endif
        </script>

        @yield('scripts')

        @include('sweetalert::alert')
    </body>
</html>
