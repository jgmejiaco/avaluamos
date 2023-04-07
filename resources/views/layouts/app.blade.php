<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Avaluamos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            </style>
    </head>
    <body>
        @include('layouts.topbar');
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/inicio') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            {{-- ======================================================== --}}

            <div class="content">
                <div class="title m-b-md">
                    AVALUAMOS
                </div>

                <div id="main">
                    {{-- @include('layouts.sidebarmenu') --}}
                </div>

                <div class="links">
                    <a href="http://avaluamos.com.co" target="_blank">Administrador</a>
                    <a href="http://avaluamos.com.co" target="_blank">Cotización</a>
                    <a href="http://avaluamos.com.co" target="_blank">Visita Avalúo</a>
                    <a href="http://avaluamos.com.co" target="_blank"">Estado de Cuenta</a>
                    <a href="http://avaluamos.com.co" target="_blank"">Marketing</a>
                </div>

                {{-- Inicia footer --}}
                <footer class="footer text-center" id="footer">
                    <a href="http://www.avaluamos.org" target="_blank"><img src="{{ asset('') }}" height="40"></a> Avaluamos Todos los derechos reservados.
                </footer>
                {{-- Final footer --}}
            </div>
        </div>

        {{-- ======================================================== --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>