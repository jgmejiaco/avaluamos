@extends('layouts.app')
@section('title', 'Actualizar Contraseña')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
@stop

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center text-uppercase">Recuperar Contraseña</h2>
        </div>
    </div>

    <div class="container-fluid mt-5 d-flex justify-content-center align-items-center">
        <form class="" method="post" action="" autocomplete="off">
            @csrf
            <div class="mb-4">
                <!-- <label class="">Cédula</label> -->
                <input class="w-100 form-control" type="password" name="act_clave" id="act_clave" placeholder="Contraseña">
            </div>

            <div class="mb-4">
                <!-- <label class="">Correo</label> -->
                <input class="w-100 form-control" type="password" name="rep_clave" id="rep_clave" placeholder="Repetir Contraseña">
            </div>

            <div class="mt-5 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script>
        $( document ).ready(function() {
            // $("#username").trigger('focus');
        });
    </script>
@stop
