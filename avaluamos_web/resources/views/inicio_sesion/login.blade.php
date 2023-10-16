@extends('layouts.app')
@section('title', 'Login')

{{-- =============================================================== --}}

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
@stop

{{-- =============================================================== --}}

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center text-uppercase">Bienvenid@</h2>
        </div>
    </div>

    <div class="container-fluid mt-5 d-flex justify-content-center align-items-center">
        <form class="" method="post" action="{{route('login.store')}}" autocomplete="off">
            @csrf
            <div class="mb-5">
                <h4>Ingrese Datos de Acceso</h4>
            </div>

            <div class="mb-4">
                {{-- <label class="">Usuario</label> --}}
                <input class="w-100 form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
            </div>

            <div class="">
                <span class="btn-show-pass">
                    <i class="zmdi zmdi-eye"></i>
                </span>
                {{-- <label class="">Contraseña</label> --}}
                <input class="w-100 form-control" type="password" name="clave" id="clave" placeholder="Clave">
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
            </div>

            <div class="mt-5 d-flex justify-content-end">
                <a class="" href="{{route('recuperar_clave')}}" style="color: blue">Olvidé mi Clave</a>
            </div>
        </form>
    </div>
@stop

{{-- =============================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function() {
            // $("#username").trigger('focus');
        });
    </script>
@stop
