@extends('layouts.app')
@section('title', 'Crear Visita')
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5 pt-0 mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase mt-0">registro de visita</h1>
            </div>
        </div>

        {{-- @php
            dd($crearVisitaCliente, $clienteId);
        @endphp --}}

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
                             {{-- @include('visita.fields_create_visita_tecnica', ['crearVisitaCliente' => $crearVisitaCliente]) --}}
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

                            if (respuesta != null) {
                                $('#tipo_documento').val(respuesta.id_tipo_documento);
                                $('#documento_dirigido_a').val(respuesta.numero_documento);
                            } else {
                                $('#tipo_documento').val('');
                                $('#documento_dirigido_a').val('');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection