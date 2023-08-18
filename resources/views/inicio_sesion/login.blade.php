@extends('layouts.app')
@section('title', 'Login')

{{-- =============================================================== --}}

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
@stop

{{-- =============================================================== --}}

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="text-center text-uppercase">Bienvenid@</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12" style="height: 30px;">&nbsp;</div>
    </div>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{route('login.store')}}" autocomplete="off">
                @csrf
                    <span class="login100-form-title p-b-26">Bienvenido Administrador</span>

                    <div class="wrap-input100 validate-input" data-validate="Usuario es requerido">
                        <input class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario">
                        <span class="focus-input100" data-placeholder="Usuario"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Clave es requerida">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="clave" id="clave" placeholder="Clave">
                        <span class="focus-input100" data-placeholder="Clave"></span>
                    </div>

                    {{-- <div class="text-right">
                        <span class="txt1">
                            <a class="txt2" href="{{route('reset_password')}}">
                                Forgot Password
                            </a>
                        </span>
                    </div> --}}

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">Iniciar Sesión</button>
                        </div>
                    </div>

                    <div class="validate-input mt-5" style="margin-top: 4rem" data-validate="">
                        {{-- <a href="{{route('recovery_password')}}">Password Recovery</a> --}}
                    </div>

                    <div class="text-left p-t-50">
                        <span class="txt1">
                            <a class="txt2 text-white btn btn-primary" href="/">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Retroceder
                            </a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xs-4 col-xs-offset-3 col-sm-4 col-sm-offset-3 col-md-3 col-md-offset-3">
            <div class="panel panel-primary text-uppercase text-center">
                <div class="panel-body">
                    <a href="{{route('login_administrador')}}" style="color: #337AB7"><b>Administrador</b></a>
                </div>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-3 text-uppercase text-center">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <a href="{{route('login_colaborador')}}" style="color: #337AB7"><b>Colaborador@</b></a>
                    <a href="" style="color: #337AB7"><b>Colaborador@</b></a>
                </div>
            </div>
        </div>
    </div> --}}
@stop

{{-- =============================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function() {
            // $("#username").trigger('focus');
        });
    </script>
@stop
