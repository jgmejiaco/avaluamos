@extends('layouts.app')
@section('title', 'Crear Cliente')

@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Crear Cliente Potencial</h1>
            </div>
        </div>

        {{-- ====================================================== --}}
        
        <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('cliente_potencial.index')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        
        {{-- ====================================================== --}}

        {!! Form::open(['method' => 'POST', 'route' => ['cliente_potencial.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_cliente_potencial']) !!}
            @csrf
            @include('cliente_potencial.fields_cliente_potencial')
        {!! Form::close() !!}

    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function()
        {
            // INICIO DataTable LIST USER'S
           
            // CIERRE DataTable LISTA CLIENTES
        });
    </script>
@endsection