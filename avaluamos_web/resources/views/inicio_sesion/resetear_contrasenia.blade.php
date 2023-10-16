@extends('layouts.app')
@section('title', 'Recuperar Contraseña')

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
        <form class="" method="post" action="{{route('validar_datos')}}" autocomplete="off">
            @csrf
            <div class="mb-4">
                <!-- <label class="label">Usuario</label> -->
                <input class="w-100 form-control" type="text" name="recu_user" id="recu_user" placeholder="Usuario">
            </div>

            <div class="mb-4">
                <!-- <label class="">Cédula</label> -->
                <input class="w-100 form-control" type="text" name="recu_ced" id="recu_ced" placeholder="Cédula">
            </div>

            <div class="mb-4">
                <!-- <label class="">Correo</label> -->
                <input class="w-100 form-control" type="email" name="recu_correo" id="recu_correo" placeholder="Correo">
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
