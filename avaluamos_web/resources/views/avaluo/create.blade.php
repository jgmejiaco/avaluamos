@extends('layouts.app')
@section('title', 'Crear Avalúo')
@section('css')

@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5 pt-0 mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase mt-0">registro de visita cliente: <span class="text-primary">nombre cliente</span></h2>
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
                             @include('avaluo.fields_create_avaluo_visita_tecnica')
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
            
            // let referidoPorCreate = $("#id_referido_por").val()
            // console.log(referidoPorCreate);

            // if (referidoPorCreate == "EMPRESA") { // EMPRESA = 1
            //     $('#div_empresa_refiere').show('slow');
            //     $('#empresa_que_refiere').attr('required');

            //     $('#div_red_social').hide('slow');
            //     $('#red_social').removeAttr('required');

            //     $('#div_nombre_refiere').hide('slow');
            //     $('#nombre_quien_refiere').removeAttr('required');
            // } else if (referidoPorCreate == "REDES SOCIALES") { // REDES SOCIALES = 2
            //     $('#div_red_social').show('slow');
            //     $('#red_social').attr('required');

            //     $('#div_nombre_refiere').hide('slow');
            //     $('#nombre_quien_refiere').removeAttr('required');

            //     $('#div_empresa_refiere').hide('slow');
            //     $('#empresa_que_refiere').removeAttr('required');
            // } else if (referidoPorCreate == "REFERIDOS") { // REFERIDOS = 3
            //     $('#div_nombre_refiere').show('slow');
            //     $('#nombre_quien_refiere').attr('required');

            //     $('#div_red_social').hide('slow');
            //     $('#red_social').removeAttr('required');

            //     $('#div_empresa_refiere').hide('slow');
            //     $('#empresa_que_refiere').removeAttr('required');
            // } else if (referidoPorCreate == "WEB AVALUAMOS") { // WEB AVALUAMOS = 4
            //     $('#div_red_social').hide('slow');
            //     $('#red_social').removeAttr('required');
            //     $('#red_social').val('');

            //     $('#div_nombre_refiere').hide('slow');
            //     $('#nombre_quien_refiere').removeAttr('required');
            //     $('#nombre_quien_refiere').val('');

            //     $('#div_empresa_refiere').hide('slow');
            //     $('#empresa_que_refiere').removeAttr('required');
            //     $('#empresa_que_refiere').val('');
            // } else { // SIN SELECCIONAR = -1
            //     $('#div_red_social').hide('slow');
            //     $('#red_social').removeAttr('required');
            //     $('#red_social').val('');

            //     $('#div_nombre_refiere').hide('slow');
            //     $('#nombre_quien_refiere').removeAttr('required');
            //     $('#nombre_quien_refiere').val('');

            //     $('#div_empresa_refiere').hide('slow');
            //     $('#empresa_que_refiere').removeAttr('required');
            //     $('#empresa_que_refiere').val('');
            // }
                
            // ==============================================

            // $('#dirigido_a').on('change', function () {
            //     let id_dirigido_a = $('#dirigido_a').val();
            //     console.log(id_dirigido_a);

            //     if (id_dirigido_a == "-1") {
            //         $('#tipo_doc_empresa').val('');
            //         $('#doc_dirigido_a').val('');
            //     } else {
            //         $.ajax({
            //             url: "{{route('consultar_empresa')}}",
            //             type: "POST",
            //             dataType: "JSON",
            //             data:{
            //                 '_token': "{{ csrf_token() }}",
            //                 'id_dirigido_a': id_dirigido_a
            //             },
            //             success: function(respuesta) {
            //                 console.log(respuesta);
            //                 console.log(respuesta.id_tipo_documento);
            //                 console.log(respuesta.decripcion_documento);
            //                 console.log(respuesta.numero_documento);

            //                 if (respuesta != null) {
            //                     $('#tipo_doc_empresa').val(respuesta.id_tipo_documento);
            //                     $('#doc_dirigido_a').val(respuesta.numero_documento);
            //                 } else {
            //                     $('#tipo_doc_empresa').val('');
            //                     $('#doc_dirigido_a').val('');
            //                 }
            //             }
            //         });
            //     }
            // });

            // ==============================================
            
            // $('#visitado').val(2);
            
            // ==============================================

            
        }); // FIN Document Ready

        // ===============================================================
        // ===============================================================
        // ===============================================================
    </script>
@endsection