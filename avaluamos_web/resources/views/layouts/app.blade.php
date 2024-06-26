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

        {{-- ========================================= --}}

        <!-- Bootstrap 5.2.3-->
        <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}" >

        <!-- Bootstrap CSS 5.3.2 -->
        {{-- <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.5.3.2.min.css')}}" > --}}

        {{-- ========================================= --}}

        <!--  Js -->
        {{-- <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script> --}}
        <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
        
        {{-- ========================================= --}}

        {{-- SELECT2 --}}
        {{-- <link rel="stylesheet" href="{{asset('vendor/select2-4.1.0/dist/css/select2.min.css')}}"> --}}

        {{-- ========================================= --}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('font-awesome-4.5.0/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- ========================================= --}}

        <!-- Google Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=PT+Sans:300,400,700,900" rel="stylesheet" type="text/css"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet" type="text/css"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}

        {{-- ========================================= --}}

        {{-- Sweetalert2 --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.min.css')}}">
    </head>

    {{-- =========================================================================== --}}
    {{-- =========================================================================== --}}

    <body>
        <div class="container-fluid">
            <div class="row">
                {{-- ===================================== --}}
                @if(Request()->path() == '/' || Request()->path() == "login")
                    @include('layouts.topbar_login')
                @elseif(Request()->path() == "recuperar")
                    @include('layouts.topbar_login')
                @else
                    @include('layouts.topbar')
                @endif

                {{-- ===================================== --}}

                <div class="flex-center position-ref full-height">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')

        {{-- ======================================================== --}}
        {{-- ======================================================== --}}

        @yield('scripts')

        <!-- BOOTSTRAP Bundle JS 5.3.2 -->
        {{-- <script src="{{asset('bootstrap/bootstrap5.3.2.bundle.min.js')}}"></script> --}}
        {{-- <script src="{{asset('bootstrap/popper-2.11.8.min.js')}}"></script> --}}
        {{-- <script src="{{asset('bootstrap/bootstrap-5.3.3.min.js')}}"></script> --}}

        <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('bootstrap/1.12.9_popper.min.js')}}"></script>
        <script src="{{asset('bootstrap/4.0.0_bootstrap.min.js')}}"></script>

        <!-- SELECT2 -->
        {{-- <script src="{{asset('vendor/select2-4.1.0/dist/js/select2.min.js')}}"></script> --}}

        {{-- Sweetalert --}}
        <script src="{{asset('js/sweetalert2.all.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>
        
        <!-- SCRIPTS -->
        @include('sweetalert::alert')
    </body>
</html>