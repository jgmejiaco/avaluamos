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
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}" >
        


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

    {{-- =========================================================================== --}}
    {{-- =========================================================================== --}}

    <body>
        <div class="container-fluid">
            <div class="row">
                @include('layouts.topbar')

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

        <!-- Bootstrap -->
        <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>

        <!-- SCRIPTS -->
        {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        <script src="{{ asset('js/homeslider.j') }}s"></script>
        <script src="{{ asset('js/jquery.grid-a-licious.js') }}"></script>
        <script src="{{ asset('js/404.js') }}"></script> --}}

        {{-- Sweetalert --}}
        {{-- <script src="{{asset('js/sweetalert2.all.js')}}"></script>
        <script src="{{asset('js/sweetalert2.min.js')}}"></script> --}}

        {{-- <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script> --}}

        {{-- @include('sweetalert::alert') --}}
    </body>
</html>