@extends('layouts.app')
@section('title', 'Editar Avalúo')

@section('css')

@stop

{{-- ====================================================== --}}
{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase">Calcular Avalúo: <span class="text-primary">{{$calcularAvaluo->cli_nombres}}</span></h2>
            </div>
        </div>

        @include('avaluo.fields_avaluo_edit_main')
    </div>
@stop

{{-- ====================================================== --}}
{{-- ====================================================== --}}

@section('scripts')
    <script src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
    <script>
        $( document ).ready(function()
        {
            // $('.select2').select2({
            //     placeholder: 'Seleccionar...',
            //     allowClear: true,
            //     disabled: false
            // });

            // ==============================================

            // $('#div_red_social').hide();
            // $('#div_nombre_refiere').hide();
            // $('#div_empresa_refiere').hide();

            // $("#referido_por").on('change',function(){
            let referido_por = $('#referido_por').val();
            console.log(referido_por);

            if (referido_por == 1) { // EMPRESA = 1
                $('#div_empresa_refiere').show('slow');
                $('#empresa_que_refiere').attr('required');

                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');
                $('#red_social').val('');

                $('#div_nombre_refiere').hide('slow');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
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
                $('#div_nombre_refiere').show('slow');
                $('#nombre_quien_refiere').attr('required');


                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');
                $('#red_social').val('');

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

                $('#id_referido_por').attr('required');
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
            // });

            // ==============================================
            // ==============================================

            $('#dirigido_a').on('change', function () {
                let id_dirigido_a = $('#dirigido_a').val();
                console.log(id_dirigido_a);

                if (id_dirigido_a == "-1" || id_dirigido_a == "") {
                    $('#tipo_doc_empresa').val('');
                    $('#doc_dirigido_a').val('');
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

                            if (respuesta != null) {
                                $('#tipo_doc_empresa').val(respuesta.id_tipo_documento);
                                // $('#tipo_doc_empresa').val(respuesta.decripcion_documento);
                                $('#doc_dirigido_a').val(respuesta.numero_documento);
                            } else {
                                $('#tipo_doc_empresa').val('');
                                $('#doc_dirigido_a').val('');
                            }
                        }
                    });
                }
            });

            // ==============================================
            // ==============================================

            let id_factor_pendiente = $('#id_factor_pendiente').val();

            if (id_factor_pendiente == "" || id_factor_pendiente == null) {
                $('#div_valor_pendiente').hide('slow');
            } else {
                $('#div_valor_pendiente').show('slow');
            }

            // ====================================

            let id_factor_ubicacion = $('#id_factor_ubicacion').val();

            if (id_factor_ubicacion == "" || id_factor_ubicacion == null) {
                $('#div_valor_ubicacion').hide('slow');
            } else {
                $('#div_valor_ubicacion').show('slow');
            }
        });

        // ======================================================
        // ======================================================
        // ======================================================

        $("#referido_por").on('change',function(){
            let referido_por = $('#referido_por').val();
            console.log(referido_por);

            if (referido_por == 1) { // EMPRESA = 1
                $('#div_empresa_refiere').show('slow');
                $('#empresa_que_refiere').attr('required');

                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');
                $('#red_social').val('');

                $('#div_nombre_refiere').hide('slow');
                $('#nombre_quien_refiere').removeAttr('required');
                $('#nombre_quien_refiere').val('');
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
                $('#div_nombre_refiere').show('slow');
                $('#nombre_quien_refiere').attr('required');


                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');
                $('#red_social').val('');

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

                $('#id_referido_por').attr('required');
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

        $('#id_factor_pendiente').on('change', function () {
            let id_factor_pendiente = $('#id_factor_pendiente').val();

            if (id_factor_pendiente == "" || id_factor_pendiente == "-1") {
                $('#div_valor_pendiente').hide('slow');
                $('#valor_pendiente').val('');
                $('#valor_pendiente').removeAttr('required');
            } else {
                $.ajax({
                    url: "{{route('consultar_factor_pendiente')}}",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'id_factor_pendiente': id_factor_pendiente
                    },
                    success: function(respuesta) {
                        if (respuesta != null) {
                            $('#div_valor_pendiente').show('slow');
                            $('#valor_pendiente').val(respuesta.valor_pendiente);
                            $('#valor_pendiente').attr('required');
                        } else {
                            $('#div_valor_pendiente').hide('slow');
                            $('#valor_pendiente').val('');
                            $('#valor_pendiente').removeAttr('required');
                        }
                    }
                });
            }
        });

        // ==============================================

        $('#id_factor_ubicacion').on('change', function () {
            let id_factor_ubicacion = $('#id_factor_ubicacion').val();
            if (id_factor_ubicacion == "" || id_factor_ubicacion == "-1") {
                $('#div_valor_ubicacion').hide('slow');
                $('#valor_ubicacion').val('');
                $('#valor_ubicacion').removeAttr('required');
            } else {
                $.ajax({
                    url: "{{route('consultar_factor_ubicacion')}}",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        '_token': "{{ csrf_token() }}",
                        'id_factor_ubicacion': id_factor_ubicacion
                    },
                    success: function(respuesta) {
                        if (respuesta != null) {
                            $('#div_valor_ubicacion').show('slow');
                            $('#valor_ubicacion').val(respuesta.valor_ubicacion);
                            $('#valor_ubicacion').attr('required');
                        } else {
                            $('#div_valor_ubicacion').hide('slow');
                            $('#valor_ubicacion').val('');
                            $('#valor_ubicacion').removeAttr('required');
                        }
                    }
                });
            }
        });
        
        // ==============================================

        $('#cli_dpto').on('change', function () {
            let idDpto = $('#cli_dpto').val();

            $.ajax({
                url: "{{route('consultar_ciudad_dpto')}}",
                type: "POST",
                dataType: "JSON",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_dpto': idDpto
                },
                success: function (respuesta) {

                    var ciudadSelect = $('#cli_ciudad');

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
        
        // ==============================================

        $('#vis_dpto').on('change', function () {
            let idDpto = $('#vis_dpto').val();

            $.ajax({
                url: "{{route('consultar_ciudad_dpto')}}",
                type: "POST",
                dataType: "JSON",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id_dpto': idDpto
                },
                success: function (respuesta) {

                    var ciudadSelect = $('#vis_ciudad');

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

        // ==============================================

        function displaySelectedFile(inputId, displayElementId) {
            const input = document.getElementById(inputId);
            const selectedFile = input.files[0];
            const displayElement = document.getElementById(displayElementId);

            if (selectedFile) {
                const selectedFileName = selectedFile.name;
                displayElement.textContent = selectedFileName;
                displayElement.classList.remove('hidden');
            } else {
                displayElement.textContent = '';
                displayElement.classList.add('hidden');
            }
        }

        // ==============================================
    </script>
@endsection
