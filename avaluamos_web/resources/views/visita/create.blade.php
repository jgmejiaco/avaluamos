@extends('layouts.app')
@section('title', 'Crear Visita')
@section('css')

@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5 pt-0 mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase mt-0">registro de visita cliente: <span class="text-primary">{{$crearVisitaCliente->cli_nombres}}</span></h2>
            </div>
        </div>

        <div class="pt-4 pb-0 py-0">
            <div class="panel panel-default container-fluid p-5">
                <div class="panel-body p-2">
                    <ul class="nav nav-tabs" style="margin-bottom: 1vw !important;">
                        <li class="nav-item">
                            <a class="nav-link active" href="#nav_visita_tecnica" id="nav_visita_tecnica_tab" data-toggle="tab" role="tab" aria-controls="nav_visita_tecnica" aria-selected="true">Visita Técnica</a>
                        </li>
                    </ul>
                    <!-- ================================== -->
                    <!-- ================================== -->
                    <div class="tab-content p-0">
                        <!-- CONTENIDO PESTAÑA "VISITA TÉCNICA" CREACIÓN -->
                        <div class="tab-pane active" id="nav_visita_tecnica" role="tabpanel" aria-labelledby="nav_visita_tecnica_tab">
                             @include('visita.fields_create_visita_tecnica')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function() {

            $('.select2').select2({
                placeholder: 'Seleccionar...',
                allowClear: true,
                disabled: false
            });

            // ==============================================
            
            let referidoPorCreate = $("#id_referido_por").val()
            console.log(referidoPorCreate);

            if (referidoPorCreate == "EMPRESA") { // EMPRESA = 1
                $('#div_empresa_refiere').show('slow');
                $('#empresa_que_refiere').attr('required');

                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');

                $('#div_nombre_refiere').hide('slow');
                $('#nombre_quien_refiere').removeAttr('required');
            } else if (referidoPorCreate == "REDES SOCIALES") { // REDES SOCIALES = 2
                $('#div_red_social').show('slow');
                $('#red_social').attr('required');

                $('#div_nombre_refiere').hide('slow');
                $('#nombre_quien_refiere').removeAttr('required');

                $('#div_empresa_refiere').hide('slow');
                $('#empresa_que_refiere').removeAttr('required');
            } else if (referidoPorCreate == "REFERIDOS") { // REFERIDOS = 3
                $('#div_nombre_refiere').show('slow');
                $('#nombre_quien_refiere').attr('required');

                $('#div_red_social').hide('slow');
                $('#red_social').removeAttr('required');

                $('#div_empresa_refiere').hide('slow');
                $('#empresa_que_refiere').removeAttr('required');
            } else if (referidoPorCreate == "WEB AVALUAMOS") { // WEB AVALUAMOS = 4
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
            }
                
            // ==============================================

            $('#dirigido_a').on('change', function () {
                let id_dirigido_a = $('#dirigido_a').val();
                console.log(id_dirigido_a);

                if (id_dirigido_a == "-1") {
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
            
            $('#visitado').val(2);
            
            // ==============================================

            $('#departamento').on('change', function () {
                let idDpto = $('#departamento').val();
                console.log(idDpto);

                $.ajax({
                    url: "{{route('consultar_ciudad_dpto')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'id_dpto': idDpto
                    },
                    success: function (respuesta) {

                        var ciudadSelect = $('#ciudad');
            
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

            $('#direccion_create').blur(function () {
                let idCliente = $('#id_cliente').val();
                let direccionCreate = $('#direccion_create').val();
                console.log(idCliente + direccionCreate);

                $.ajax({
                    url:        "{{route('visita_direccion')}}",
                    type:       "POST",
                    dataType:   "JSON",
                    data:       {
                        '_token': "{{ csrf_token() }}",
                        'id_cliente': idCliente,
                        'direccion_create': direccionCreate
                    },
                    success: function (respuesta) {
                        console.log(respuesta);

                        $('#dirigido_a').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_dirigido_a,
                            text: respuesta.dirigido_a
                        }));

                        $('#tipo_doc_empresa').val(respuesta.id_doc_empresa);
                        $('#doc_dirigido_a').val(respuesta.documento_empresa);

                        // ===================================================

                        // Verificar si objeto_avaluo tiene contenido
                        if (respuesta.objeto_avaluo) {
                            // Parsear la cadena de objeto_avaluo a un array
                            var objetoAvaluoArray = respuesta.objeto_avaluo.split(', ');

                            // Mapeo de valores en objeto_avaluo a IDs de checkboxes
                            var idMapping = {
                                'comercial': 'comercial',
                                'jurídico': 'juridico',
                                'rentas': 'rentas',
                                'contable': 'contable',
                                'financiero': 'financiero',
                                'reforma vivienda': 'reforma_vivienda',  // Ajuste por espacios
                                'compra vivienda': 'compra_vivienda'     // Ajuste por espacios
                            };

                            // Marcar los checkboxes correspondientes
                            objetoAvaluoArray.forEach(function(valor) {
                                // Convertir el valor a minúsculas y buscar en el mapeo
                                var idCheckbox = idMapping[valor.toLowerCase()];
                                if (idCheckbox) {
                                    $('#' + idCheckbox).prop('checked', true);
                                }
                            });
                        } else {
                            // Si objeto_avaluo está vacío, desmarcar todos los checkboxes o realizar otras acciones según tus necesidades
                            $('input[name="objeto_avaluo[]"]').prop('checked', false);
                        }

                        // ===================================================

                        $('#pais').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.visita_pais,
                            text: respuesta.descripcion_pais
                        }));

                        // ===================================================
                        
                        $('#departamento').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_vis_dpto,
                            text: respuesta.vis_dpto
                        }));

                        // ===================================================
                        
                        $('#ciudad').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_vis_ciudad,
                            text: respuesta.vis_ciudad
                        }));

                        // ===================================================
                        
                        $('#ciudad').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_vis_ciudad,
                            text: respuesta.vis_ciudad
                        }));

                        // ===================================================
                        
                        $('#comuna').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_comuna,
                            text: respuesta.comuna
                        }));

                        // ===================================================
                        
                        $('#sector').val(respuesta.sector);

                        // ===================================================
                        
                        $('#cerca_de').val(respuesta.cerca_de);

                        // ===================================================
                        
                        $('#barrio').val(respuesta.barrio);

                        // ===================================================
                        
                        $('#unidad_edificio').val(respuesta.unidad_edificio);

                        // ===================================================
                        
                        $('#tipo_inmueble').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_tipo_inmueble,
                            text: respuesta.tipo_inmueble
                        }));

                        // ===================================================
                        
                        $('#area').val(respuesta.area);

                        // ===================================================
                        
                        $('#estrato').prepend($('<option>', {
                            selected: 'selected',
                            value: respuesta.id_estrato,
                            text: respuesta.estrato
                        }));

                        // ===================================================
                        
                        $('#numero_inmueble').val(respuesta.numero_inmueble);

                        // ===================================================
                        
                        $('#porcentaje_descuento').val(respuesta.porcentaje_descuento);

                        // ===================================================
                        
                        // $('#valor_cotizacion').val(respuesta.valor_cotizacion);

                        // ===================================================
                        
                        $('#latitud').val(respuesta.latitud);

                        // ===================================================
                        
                        $('#longitud').val(respuesta.longitud);

                        // ===================================================
                        
                        $('#obser_visita_tecnica').val(respuesta.obser_visita);

                        // ===================================================
                    }
                });
            })
        }); // FIN Document Ready

        // ===============================================================
        // ===============================================================
        // ===============================================================
    </script>
@endsection