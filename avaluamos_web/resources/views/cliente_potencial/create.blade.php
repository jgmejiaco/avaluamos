@extends('layouts.app')

@section('title', 'Crear Cliente')
    
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Crear Cliente</h1>
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

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Crear Cliente">
                </div>
            </div>
        {!! Form::close() !!}

    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function()
        {
            $('.select2').select2({
                placeholder: 'Seleccionar...',
                allowClear: true,
                disabled: false
            });
            
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
                    $('#red_social').val('');

                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#nombre_quien_refiere').val('');

                    $('#div_empresa_refiere').show('slow');
                    $('#empresa_que_refiere').attr('required');

                } else if (referido_por == 2) { // REDES SOCIALES = 2
                    $('#div_red_social').show('slow');
                    $('#red_social').attr('required');

                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#nombre_quien_refiere').val('');

                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#empresa_que_refiere').val('');
                } else if (referido_por == 3) { // REFERIDOS = 3
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#red_social').val('');

                    $('#div_nombre_refiere').show('slow');
                    $('#nombre_quien_refiere').attr('required');

                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#empresa_que_refiere').val('');
                } else if (referido_por == 4) { // WEB AVALUAMOS = 4
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#red_social').val('');

                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#nombre_quien_refiere').val('');

                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#empresa_que_refiere').val('');
                } else { // SIN SELECCIONAR = -1
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#red_social').val('');

                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#nombre_quien_refiere').val('');

                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#empresa_que_refiere').val('');
                    
                    $('#id_referido_por').attr('required');
                }
            });

            // ==============================================

            $('#celular').blur(function () {
                let cliCelular = $('#celular').val();

                $.ajax({
                    url: "{{route('verificar_celular')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'cliCelular': cliCelular
                    },
                    success: function (respuesta) {
                        if (respuesta == "existe_cli_celular") {
                            Swal.fire(
                                'Cuidado!',
                                'Este número de celular ya existe!',
                                'warning'
                            )
                            $('#celular').val('');
                        }

                        if (respuesta == "error_exception") {
                            Swal.fire(
                                'Error!',
                                'No fue posible consultar el celular, intente nuevamente!',
                                'error'
                            )
                        }
                    }
                });
            })
        });
    </script>
@endsection
