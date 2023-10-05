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
                <h2 class="text-center text-uppercase">Calcular Avalúo: <span class="text-primary">nombre cliente</span></h2>
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
            $('.select2').select2({
                placeholder: 'Seleccionar...',
                allowClear: true,
                disabled: false
            });

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

            $('input[name=rf_fachada]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Fachada",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder",
            });
            
            // ====================================

            $('input[name=rf_entrada]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Entrada",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_sala1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Sala 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_sala2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Sala 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_sala3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Sala3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_comedor1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Comedor 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_comedor2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Comedor 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_comedor3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Comedor 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cocina1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cocina 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cocina2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cocina 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cocina3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cocina 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion4]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 4",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion5]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 5",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion6]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 6",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_habitacion7]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Habitación 7",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_bano1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Baño 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_bano2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Baño 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_bano3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Baño 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_patio1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Patio 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_patio2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Patio 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_patio3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Patio 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_estudio1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Estudio 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_estudio2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Estudio 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_estudio3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Estudio 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cuarto_util1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cuarto Útil 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cuarto_util2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cuarto Útil 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_cuarto_util3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Cuarto Útil 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_pasillo1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Pasillo 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_pasillo2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Pasillo 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_pasillo3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Pasillo 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_zona_ropa1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Zona Ropa 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_zona_ropa2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Zona Ropa 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_zona_ropa3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Zona Ropa 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_balcon1]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Balcón 1",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================

            $('input[name=rf_balcon2]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Balcón 2",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });

            // ====================================
            
            $('input[name=rf_balcon3]').filestyle({
                input: false,
                buttonName: "btn-rounded btn-success",
                buttonText: "Balcón 3",
                buttonBefore: true,
                size : 'md',
                iconName: "mdi mdi-folder"
            });
            
            // ====================================

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

    </script>
@endsection