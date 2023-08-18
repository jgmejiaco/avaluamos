@extends('layouts.app')
@section('title', 'Create')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/chosen/chosen.min.css')}}">
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center text-uppercase">Crear Nuevo Usuario</h2>
        </div>
    </div>

    {{-- ==================================================== --}}
    
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{route('administrador.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div>
    </div>
    
    {{-- ==================================================== --}}

    {!! Form::open(['method' => 'POST', 'route' => ['administrador.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_nuevo_usuario']) !!}
    @csrf

        @include('administrador.fields')

    {!! Form::close() !!}
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function()
        {
            window.$(".select2").prepend(new Option("Seleccione ...", "-1"));
            // window.$(".select2").append(new Option("Select Contact...", "-1"));

            // $('.select2').select2({
            //     'placeholder':'Seleccionar...'
            // });

            // $('.select2').select2().trigger('chosen:updated');

            // $("#nombres").trigger('focus');
            // $("#id_tipo_documento").trigger('focus');
            // $("#numero_documento").trigger('focus');
        });
    </script>
@endsection
