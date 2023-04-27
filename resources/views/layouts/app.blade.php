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
        @yield('css')
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{asset('imagenes/logo_avaluamos.png')}}" type="image/x-icon">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:300,400,700,900" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome-4.5.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/404.css') }}">

        {{-- Sweetalert2 --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.min.css')}}">

        <!--  Js -->
        <script src="{{ asset('js/modernizr.custom.js') }}"></script>
        <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    </head>

    {{-- ============================================================================================================= --}}
    {{-- ============================================================================================================= --}}

    <body>
        <div class="container-fluid p-0">
            <div class="row">
                @include('layouts.topbar');

                <div class="flex-center position-ref full-height">
                    <div class="content">

                        @yield('content')

                        {{-- Inicia footer --}}
                        {{-- <footer class="footer text-center" id="footer">
                            <a href="http://www.avaluamos.org" target="_blank" class=""><img src="{{ asset('imagenes/logo-negro.png') }}" height="30" width="80" class=""></a> Avaluamos Todos los derechos reservados.
                        </footer> --}}
                        {{-- Final footer --}}
                    </div>
                </div>

                @include('layouts.footer');
            </div>
        </div>

        {{-- ======================================================== --}}
        {{-- ======================================================== --}}

        @yield('scripts')

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <!-- SCRIPTS -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/homeslider.j') }}s"></script>
        <script src="{{ asset('js/jquery.grid-a-licious.js') }}"></script>
        <script src="{{ asset('js/404.js') }}"></script>

        {{-- Scripts Login Entrenador  --}}
        {{-- <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
        <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script> --}}

        {{-- Sweetalert --}}
        <script src="{{asset('js/sweetalert2.all.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @include('sweetalert::alert')
    </body>
</html>