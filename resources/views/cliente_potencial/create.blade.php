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

        {!! Form::open(['method' => 'POST', 'route' => ['cliente_potencial.store'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_cliente_potencial']) !!}
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
                value: "-1", // Valor de la opción
                text: "Seleccionar..." // Texto visible de la opción
            });

            seleccionar.attr("selected", true);
            select.prepend(seleccionar);

            // ==============================================

            $('#div_red_social').hide();
            $('#div_nombre_refiere').hide();
            $('#div_empresa_refiere').hide();

            $("#id_referido_por").on('change',function(){
                let referido_por = $('#id_referido_por').val();
                console.log(referido_por);

                if (referido_por == 1) { // EMPRESA = 1
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').show('slow');
                } else if (referido_por == 2) { // REDES SOCIALES = 2
                    $('#div_red_social').show('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else if (referido_por == 3) { // REFERIDOS = 3
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').show('slow');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else if (referido_por == 4) { // WEB AVALUAMOS = 4
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else { // SIN SELECCIONAR = -1
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#id_referido_por').attr('required');
                }
            });

            // ==============================================

            $('#dirigido_a').on('change', function () {
                let id_dirigido_a = $('#dirigido_a').val();
                console.log(id_dirigido_a);

                if (id_dirigido_a == "-1") {
                    $('#tipo_documento').val('');
                    $('#documento_dirigido_a').val('');
                } else {
                    $.ajax({
                        url: "{{route('consultar_empresa')}}",
                        type: "POST",
                        dataType: "JSON",
                        data:{
                            '_token': "{{ csrf_token() }}",
                            'id_dirigido_a': id_dirigido_a
                        },
                        success: function(respuesta) {
                            console.log(respuesta);
                            console.log(respuesta.id_tipo_documento);
                            console.log(respuesta.decripcion_documento);
                            console.log(respuesta.numero_documento);
                            
                            $('#tipo_documento').val(respuesta.id_tipo_documento);
                            $('#documento_dirigido_a').val(respuesta.numero_documento);
                        }
                    });
                }
            });
        });
    </script>
@endsection
