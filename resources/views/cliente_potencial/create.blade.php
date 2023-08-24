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
            // $('.select2').select2({
            //     placeholder: 'Seleccionar...',
            //     allowClear: true,
            //     disabled: false
            // });
            
            let select = $('.select2');

            let seleccionar = $("<option>", {
                value: "seleccionar", // Valor de la opción
                text: "Seleccionar..." // Texto visible de la opción
            });

            seleccionar.attr("selected", true);
            select.prepend(seleccionar);

            // ==============================================

            $('#div_red_social').hide();
            $('#div_nombre_refiere').hide();
            $('#div_empresa_refiere').hide();

            $("#referido_por").on('change',function(){
                let referido_por = $('#referido_por').val();
                console.log(referido_por);

                if (referido_por == 1) { // EMPRESA = 1
                    $('#div_red_social').hide('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#div_empresa_refiere').show('slow');
                } else if (referido_por == 2) { // REDES SOCIALES = 2
                    $('#div_red_social').show('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#div_empresa_refiere').hide('slow');
                } else if (referido_por == 3) { // REFERIDOS = 3
                    $('#div_red_social').hide('slow');
                    $('#div_nombre_refiere').show('slow');
                    $('#div_empresa_refiere').hide('slow');
                } else if (referido_por == 4) { // WEB AVALUAMOS = 4
                    $('#div_red_social').hide('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#div_empresa_refiere').hide('slow');
                } else { // SIN SELECCIONAR = -1
                    $('#div_red_social').hide('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#div_empresa_refiere').hide('slow');
                }
            });

            // ==============================================
            
            // INICIO DataTable LIST USER'S
           
            // CIERRE DataTable LISTA CLIENTES
        });
    </script>
@endsection
