@extends('layouts.app')
@section('title', 'Login Administrador')

{{-- =============================================================== --}}

@section('content')
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
@stop

{{-- =============================================================== --}}

@section('scripts')
    <script>

        $( document ).ready(function() {

            // $("#username").trigger('focus');
        });

    </script>
@endsection
