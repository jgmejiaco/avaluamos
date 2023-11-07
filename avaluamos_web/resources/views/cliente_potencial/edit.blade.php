@extends('layouts.app')

@section('title', 'Editar Cliente')
    
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Editar Cliente</h1>
            </div>
        </div>

        {{-- ====================================================== --}}
        
        <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('cliente_potencial.index')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        
        {{-- ====================================================== --}}

        {!! Form::model($cliente, ['method' => 'PUT', 'route' => ['cliente_potencial.update',$cliente->id_cliente], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_editar_cliente']) !!}
            @csrf

            @include('cliente_potencial.fields_cliente_potencial')

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Editar Cliente">
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

            let idReferidoPor = $('#id_referido_por').val();
            console.log(idReferidoPor);
                 
            if (idReferidoPor == 1 || idReferidoPor == "1") { // EMPRESA
                $('#div_empresa_refiere').removeClass('ocultar');
                $('#div_red_social').addClass('ocultar');
                $('#div_nombre_refiere').addClass('ocultar');
            } else if (idReferidoPor == 2 || idReferidoPor == "2") { // REDES SOCIALES
                $('#div_red_social').removeClass('ocultar');
                $('#div_empresa_refiere').addClass('ocultar');
                $('#div_nombre_refiere').addClass('ocultar');
            } else if (idReferidoPor == 3 || idReferidoPor == "3") { // REFERIDOS
                $('#div_nombre_refiere').removeClass('ocultar');
                $('#div_red_social').addClass('ocultar');
                $('#div_empresa_refiere').addClass('ocultar');
            } else if (idReferidoPor == 4 || idReferidoPor == "4")  { // WEB AVALUAMOS
                $('#div_nombre_refiere').addClass('ocultar');
                $('#div_red_social').addClass('ocultar');
                $('#div_empresa_refiere').addClass('ocultar');
            } else {
                $('#div_nombre_refiere').addClass('ocultar');
                $('#div_red_social').addClass('ocultar');
                $('#div_empresa_refiere').addClass('ocultar');
            }
        });

        // ================================================================
        // ================================================================
        // ================================================================

        $('#id_referido_por').on('change', function () {
            let idReferidoPorChange = $('#id_referido_por').val();
            console.log(idReferidoPorChange);

            if (idReferidoPorChange == 1) { // EMPRESA
                $('#div_empresa_refiere').removeClass('ocultar');
                $('#empresa_que_refiere').attr('required');
                
                $('#div_red_social').addClass('ocultar');
                $('#id_red_social').removeAttr('required');
                $('#id_red_social').val('');

                $('#div_nombre_refiere').addClass('ocultar');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
            } else if (idReferidoPorChange == 2) { // REDES SOCIALES
                $('#div_red_social').removeClass('ocultar');
                $('#id_red_social').attr('required');

                $('#div_empresa_refiere').addClass('ocultar');
                $('#empresa_que_refiere').removeAttr('required');
                $('#empresa_que_refiere').val('');

                $('#div_nombre_refiere').addClass('ocultar');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
            } else if (idReferidoPorChange == 3) { // REFERIDOS
                $('#div_nombre_refiere').removeClass('ocultar');
                $('#nombre_quien_refiere').attr('required');
                
                $('#div_red_social').addClass('ocultar');
                $('#id_red_social').removeAttr('required');
                $('#id_red_social').val('');

                $('#div_empresa_refiere').addClass('ocultar');
                $('#empresa_que_refiere').removeAttr('required');
                $('#empresa_que_refiere').val('');
            } else if (idReferidoPorChange == 4)  { // WEB AVALUAMOS
                $('#div_nombre_refiere').addClass('ocultar');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
                
                $('#div_red_social').addClass('ocultar');
                $('#id_red_social').removeAttr('required');
                $('#id_red_social').val('');

                $('#div_empresa_refiere').addClass('ocultar');
                $('#empresa_que_refiere').removeAttr('required');
                $('#empresa_que_refiere').val('');
            } else {
                $('#div_nombre_refiere').addClass('ocultar');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
                
                $('#div_red_social').addClass('ocultar');
                $('#id_red_social').removeAttr('required');
                $('#id_red_social').val('');

                $('#div_empresa_refiere').addClass('ocultar');
                $('#empresa_que_refiere').removeAttr('required');
                $('#empresa_que_refiere').val('');

                $('#id_referido_por').attr('required');
            }
        });

        // ==============================================

        $('#departamento').on('change', function () {
            let idDpto = $('#departamento').val();

            $.ajax({
                url: "{{route('consultar_ciudad_dpto')}}",
                type: "POST",
                dataType: "JSON",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_dpto': idDpto
                },
                success: function (respuesta) {

                    var ciudadSelect = $('#municipio');
        
                    // Limpiar el select de ciudades
                    ciudadSelect.empty();
                    ciudadSelect.append($('<option value="">Seleccionar...</option>'));

                    // Llenar el select con las ciudades obtenidas
                    $.each(respuesta, function (key, value) {
                        ciudadSelect.append($('<option value="' + value.id_ciudad + '">' + value.descripcion_ciudad + '</option>'));
                    });
                }
            });
        })
    </script>
@endsection
