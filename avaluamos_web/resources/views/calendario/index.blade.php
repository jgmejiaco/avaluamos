@extends('layouts.app')
@section('title', 'Calendario Visitas')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}

    <style>
        .fs-14 {
            font-size: 14px;
        }

        .flex-row-edit {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .flex-column-edit {
            display: flex;
            flex-direction: column;
            width: 47%;
        }

        /* .w-100 {
            width: 100% !important;
        } */
        .select2-container{
            z-index: 99999 !important;
        }
    </style>

    <!-- Bootstrap 5.2.3-->
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}" >

    {{-- INICIO CSS FULL CALENDAR "LOCAL" --}}
    <link rel="stylesheet" href="{{asset('fullcalendar/css/fullcalendar.min.css')}}" />
    {{-- FINAL CSS FULL CALENDAR "LOCAL" --}}
@endsection

{{-- ============================================================== --}}

{{-- https://www.jose-aguilar.com/blog/fullcalendar-con-jquery/ --}}

{{-- https://github.com/fullcalendar/fullcalendar-releases/blob/main/fullcalendar/3.9.0/demos/themes.html --}}

{{-- https://cdnjs.com/libraries/fullcalendar/3.9.0 --}}

{{-- LIBRERIAS === https://cdnjs.com/libraries --}}

@section('content')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

    <div class="page-titles">
        <div class="d-flex flex-row justify-content-between align-center px-3">
            <h3 class="text-themecolor m-b-0 m-t-0">Calendario Visitas</h3>
        </div>
    </div>

    {{-- ========================================================= --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header d-flex flex-md-row justify-content-between align-items-center">
                            <h4 class="card-title text-themecolor m-t-10 pointer mostrar_ocultar_campos">Agendamiento</h4>
                        </div>
                        {{-- ======================== --}}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12" id='calendar_container'>
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- ============================================================== --}}
{{-- ============================================================== --}}

@section('scripts')
    {{-- INICIO SCRIPT FULL CALENDAR "LOCAL" --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
    <script src="{{asset('fullcalendar/moment/cdnjs.cloudflare.com_ajax_libs_moment.js_2.24.0_moment.min.js')}}"></script>
    <script src="{{asset('fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('fullcalendar/js/locale/es.js')}}"></script>
    {{-- FIN SCRIPT FULL CALENDAR "LOCAL" --}}

    {{-- ===================================================== --}}
    {{-- ===================================================== --}}
    {{-- ===================================================== --}}

    <script>
       // Obtener la selección actual
        var selection = window.getSelection();

        // Verificar si hay algún rango de selección
        if (selection.rangeCount > 0 && selection.rangeCount > 0) {
          // Obtener el rango en el índice 0
          var range = selection.getRangeAt(0);

          // Resto de tu código para trabajar con el rango de selección
        } else {
          console.error("No hay ningún rango de selección disponible");
        }

        $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            let tipoInmuebles = @json($tipo_inmueble);
            let ciudades = @json($ciudades);
            let siNo = @json($si_no);

            // ===============================================
            // ===============================================

            $.ajax({
                url:"{{route('consultar_visitas_calendario')}}",
                type: 'POST',
                dataType: 'JSON',
                success:function(response)
                {
                    if (response.visitas_calendario == []) {
                        visitasCalendario = '/full-calender';
                    } else {
                        visitasCalendario = response.visitas_calendario;
                    }

                    console.log(visitasCalendario);

                    // ===============================================
                    // ===============================================

                    let calendar = $('#calendar').fullCalendar({
                        height: 'auto',
                        header:{
                            left:'prev,next today',
                            center:'title',
                            right:'month,agendaWeek,agendaDay',
                        },
                        events: visitasCalendario,
                        selectable:true,
                        selectHelper: true,
                        eventRender: function (event, element) {}, // Renderiza el Calendario
                        editable:true,
                        locale: 'es',
                        firstDay: 1, // Monday (0=sunday)
                        weekNumbers: true,
                        timezone: 'America/Bogota',
                        timeFormat: 'h:mm a',
                        defaultView: 'month',
                        eventLimit: false,

                        // ===============================================

                        // CREAR VISITA
                        select:function(start, end, allDay)
                        {
                            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                            let event = {"start": start, "end": end};

                            let hoy = new Date();
                            let hoy_year = hoy.getFullYear();
                            let hoy_mes = hoy.getMonth() + 1;
                            let hoy_dia = hoy.getDate();
                            let hoy_hora = hoy.getHours();
                            let hoy_minutos = hoy.getMinutes();
                            let hoy_segundos = hoy.getSeconds();

                            if (hoy_dia < 10) hoy_dia = '0' + hoy_dia;
                            if (hoy_mes < 10) hoy_mes = '0' + hoy_mes;

                            let fechaActual = hoy_year + '-' + hoy_mes + '-' + hoy_dia + ' ' + hoy_hora + ':' + hoy_minutos + ':' + hoy_segundos;
                            let fechaVisita = event.start;

                            if(fechaVisita >= fechaActual){

                                let formCalendarioVisita = '';

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="flex-row-edit mt-2">
                                        <div class="form-group flex-column-edit">
                                            <label for="nombre_cliente" class="fs-14">Nombre cliente
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="nombre_cliente" type="text" class="form-control" id="nombre_cliente" required>
                                        </div>

                                        <div class="form-group flex-column-edit">
                                            <label for="celular" class="fs-14">Celular
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="celular" type="text" class="form-control" id="celular" required>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="flex-row-edit mt-2">
                                        <div class="form-group flex-column-edit">
                                            <label for="tipo_inmueble" class="fs-14">Tipo Inmueble
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control w-100" id="tipo_inmueble" name="tipo_inmueble" required>
                                                <option value="" selected >Seleccione...</option>
                                `;
                                                $.each(tipoInmuebles, function(idTInmueble, tipoInmueble){
                                                    formCalendarioVisita += ' <option value="'+idTInmueble+'">'+tipoInmueble+'</option>'
                                                });
                                formCalendarioVisita += `
                                            </select>
                                        </div>

                                        <div class="form-group flex-column-edit">
                                            <label for="ciudad" class="fs-14">Municipio
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control w-100" id="ciudad" name="ciudad" required>
                                                <option value="" selected >Seleccione...</option>
                                `;
                                                $.each(ciudades, function(idCiudad, ciudad){
                                                    formCalendarioVisita += ' <option value="'+idCiudad+'">'+ciudad+'</option>'
                                                });
                                formCalendarioVisita += `
                                            </select>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="flex-row-edit mt-2">
                                        <div class="form-group flex-column-edit">
                                            <label for="barrio" class="fs-14">Barrio
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="barrio" type="text" class="form-control" id="barrio" required>
                                        </div>

                                        <div class="form-group flex-column-edit">
                                            <label for="direccion" class="fs-14">Dirección
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input name="direccion" type="text" class="form-control" id="direccion" required>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="flex-row-edit mt-2">
                                        <div class="form-group flex-column-edit">
                                            <label for="fecha_visita" class="fs-14">Fecha Visita
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="datetime-local" name="fecha_visita" class="form-control" id="fecha_visita" value="${fechaVisita}" required>
                                        </div>

                                        <div class="form-group flex-column-edit">
                                            <label for="visitado" class="fs-14">visitado
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="visitado" name="visitado" required>
                                                <option value="" selected >Seleccione...</option>
                                `;
                                                $.each(siNo, function(idSiNo, dSiNo){
                                                    formCalendarioVisita += ' <option value="'+idSiNo+'">'+dSiNo+'</option>'
                                                });
                                formCalendarioVisita += `
                                            </select>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <input type="button" class="btn btn-primary mt-3" id="btn_crear_visita_calendario" value="Crear Visita">
                                `;

                                // =============================================

                                swal({
                                    title: '<strong>AGENDAMIENTO</strong>',
                                    icon: 'warning',
                                    type: 'warning',
                                    html: formCalendarioVisita,
                                    showCancelButton: false,
                                    cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
                                    showCloseButton: true,
                                    focusConfirm: false,
                                    showConfirmButton: false,
                                    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Guardar!',
                                    confirmButtonAriaLabel: 'Thumbs up, great!',
                                    cancelButtonAriaLabel: 'Thumbs down',
                                    allowOutsideClick: false,
                                    padding:'2em',
                                    position: 'bottom',
                                    width: 500,
                                });

                                //=======================================//

                                $('#btn_crear_visita_calendario').on('click', function () {
                                    let fechaVisita = $('#fecha_visita').val();
                                    let nombreCliente = $('#nombre_cliente').val();
                                    let celular = $('#celular').val();
                                    let tipoInmueble = $('#tipo_inmueble').val();
                                    let ciudad = $('#ciudad').val();
                                    let barrio = $('#barrio').val();
                                    let direccion = $('#direccion').val();
                                    let visitado = $('#visitado').val();

                                    $.ajax({
                                        url: "{{route('calendario.store')}}",
                                        type: "POST",
                                        dataType: "JSON",
                                        data: {
                                            '_token': "{{ csrf_token() }}",
                                            'fecha_visita':fechaVisita,
                                            'nombre_cliente':nombreCliente,
                                            'celular':celular,
                                            'tipo_inmueble':tipoInmueble,
                                            'ciudad':ciudad,
                                            'barrio':barrio,
                                            'direccion':direccion,
                                            'visitado':visitado
                                        },
                                        success: function (respuesta) {
                                            if (respuesta == "visita_creada") {
                                                Swal.fire(
                                                    'Bien!',
                                                    'La visita ha sido creada satisfacoriamente!',
                                                    'success'
                                                );
                                                window.location.reload();
                                            }

                                            if (respuesta == "visita_no_creada") {
                                                Swal.fire(
                                                    'Precacuión!',
                                                    'La visita NO ha sido creada!',
                                                    'warning'
                                                )
                                                window.location.reload();
                                            }

                                            if (respuesta == "error_exception") {
                                                Swal.fire(
                                                    'Erro!',
                                                    'Error de Excepción, por favor contacte a soporte!',
                                                    'error'
                                                )
                                                window.location.reload();
                                            }
                                        }
                                    });
                                });

                                // =============================================

                                // $('.chosen.swal').select2({});

                                // =============================================

                                // let form_modal_infra = $("#form_modal_infra");

                                // form_modal_infra.validate({
                                //     rules:{
                                //         id_tipo_categoria:{required:true},
                                //         sed_codigo:{required:true},
                                //         id_tipo_mtto:{required:true},
                                //     },
                                //     errorPlacement: function(error, element) {
                                //         error.appendTo( element.parent() );
                                //     }
                                // });

                                // =============================================

                                // $( "#id_tipo_categoria" ).change(function() {
                                //     let id_tipo_categoria = $('#id_tipo_categoria option:selected').text();

                                //     if (id_tipo_categoria == "EXTINTOR VEHÍCULOS")
                                //     {
                                //         $('#div_segaut_codigo_create').show('slow');
                                //     }
                                //     else
                                //     {
                                //         $('#div_segaut_codigo_create').hide('slow');

                                //     }
                                // });

                                // =============================================
                            } else {
                                swal({
                                    title: 'Atenci&oacute;n!',
                                    text: "No es posible crear una visita en fechas pasadas.",
                                    type: 'error'
                                });
                            }
                        },

                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================

                        // EDITAR
                        eventClick:function(visita)
                        {
                            console.log(`id de la visita ${visita.id}`);
                            idVisita = visita.id;

                            $.ajax({
                                url: "{{route('consultar_visita_calendario')}}",
                                type: 'POST',
                                dataType: 'JSON',
                                data:{'id_visita_calendario':idVisita},
                                success:function(response)
                                {
                                    console.log(response.id_visita_calendario);
                                    let formCalendarioVisitaEditar = '';

                                    formCalendarioVisitaEditar += `<input name="id_visita_calendario_editar" type="hidden" id="id_visita_calendario_editar" value="${response.id_visita_calendario}"><br>`;

                                    // =============================================

                                    formCalendarioVisitaEditar += `
                                        <div class="flex-row-edit mt-2">
                                            <div class="form-group flex-column-edit">
                                                <label for="nombre_cliente_editar" class="fs-14">Nombre cliente
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="nombre_cliente_editar" type="text" class="form-control" id="nombre_cliente_editar" value="${response.nombre_cliente}" required>
                                            </div>

                                            <div class="form-group flex-column-edit">
                                                <label for="celular_editar" class="fs-14">Celular
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="celular_editar" type="text" class="form-control" id="celular_editar" value="${response.celular}" required>
                                            </div>
                                        </div>
                                    `;

                                    // =============================================

                                    formCalendarioVisitaEditar += `
                                        <div class="flex-row-edit mt-2">
                                            <div class="form-group flex-column-edit">
                                                <label for="tipo_inmueble_editar" class="fs-14">Tipo Inmueble
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control w-100" id="tipo_inmueble_editar" name="tipo_inmueble_editar" required>
                                                    <option value="${response.t_inmueble}" selected >${response.tipo_inmueble}</option>
                                    `;
                                                    $.each(tipoInmuebles, function(idTInmueble, tipoInmueble){
                                                        formCalendarioVisitaEditar += ' <option value="'+idTInmueble+'">'+tipoInmueble+'</option>'
                                                    });
                                    formCalendarioVisitaEditar += `
                                                </select>
                                            </div>

                                            <div class="form-group flex-column-edit">
                                                <label for="ciudad_editar" class="fs-14">Municipio
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control w-100" id="ciudad_editar" name="ciudad_editar" required>
                                                    <option value="${response.municipio}" selected >${response.descripcion_ciudad}</option>
                                    `;
                                                    $.each(ciudades, function(idCiudad, ciudad){
                                                        formCalendarioVisitaEditar += ' <option value="'+idCiudad+'">'+ciudad+'</option>'
                                                    });
                                    formCalendarioVisitaEditar += `
                                                </select>
                                            </div>
                                        </div>
                                    `;

                                    // =============================================

                                    formCalendarioVisitaEditar += `
                                        <div class="flex-row-edit mt-2">
                                            <div class="form-group flex-column-edit">
                                                <label for="barrio_editar" class="fs-14">Barrio
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="barrio_editar" type="text" class="form-control" id="barrio_editar" value="${response.barrio}" required>
                                            </div>

                                            <div class="form-group flex-column-edit">
                                                <label for="direccion_editar" class="fs-14">Dirección
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="direccion_editar" type="text" class="form-control" id="direccion_editar" value="${response.direccion}" required>
                                            </div>
                                        </div>
                                    `;

                                    // =============================================

                                    formCalendarioVisitaEditar += `
                                        <div class="flex-row-edit mt-2">
                                            <div class="form-group flex-column-edit">
                                                <label for="fecha_visita_editar" class="fs-14">Fecha Visita
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="datetime-local" name="fecha_visita_editar" class="form-control" id="fecha_visita_editar" value="${response.fecha_visita_calendario}" required>
                                            </div>

                                            <div class="form-group flex-column-edit">
                                                <label for="visitado_editar" class="fs-14">visitado
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="visitado_editar" name="visitado_editar" required>
                                                    <option value="${response.visita_cumplida}" selected >${response.descripcion_si_no}</option>
                                    `;
                                                    $.each(siNo, function(idSiNo, dSiNo){
                                                        formCalendarioVisitaEditar += ' <option value="'+idSiNo+'">'+dSiNo+'</option>'
                                                    });
                                    formCalendarioVisitaEditar += `
                                                </select>
                                            </div>
                                        </div>
                                    `;

                                    // =============================================

                                    formCalendarioVisitaEditar += `
                                        <input type="button" class="btn btn-primary mt-5" value="Editar Visita" id="btnEditarVisita">
                                    `;

                                    // =============================================

                                    swal({
                                        icon: 'info',
                                        type: 'info',
                                        title: '<strong>Editar Visita</strong>',
                                        html: formCalendarioVisitaEditar,
                                        showCancelButton: false,
                                        cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
                                        showCloseButton: true,
                                        focusConfirm: false,
                                        showConfirmButton: false,
                                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Guardar!',
                                        confirmButtonAriaLabel: 'Thumbs up, great!',
                                        cancelButtonAriaLabel: 'Thumbs down',
                                        allowOutsideClick: false,
                                        padding:'2em',
                                        position: 'bottom',
                                        width: 500,
                                    });

                                    //=======================================//

                                    $('#btnEditarVisita').on('click', function () {
                                        let idVisitaCalendarioEditar = $('#id_visita_calendario_editar').val();
                                        let nombreClienteEditar = $('#nombre_cliente_editar').val();
                                        let celularEditar = $('#celular_editar').val();
                                        let tipoInmuebleEditar = $('#tipo_inmueble_editar').val();
                                        let ciudadEditar = $('#ciudad_editar').val();
                                        let barrioEditar = $('#barrio_editar').val();
                                        let direccionEditar = $('#direccion_editar').val();
                                        let fechaVisitaEditar = $('#fecha_visita_editar').val();
                                        let visitadoEditar = $('#visitado_editar').val();

                                        $.ajax({
                                            url: "{{route('editar_visita_calendario')}}",
                                            type: "POST",
                                            dataType: "JSON",
                                            data: {
                                                '_token': "{{ csrf_token() }}",
                                                'id_visita_calendario_editar':idVisitaCalendarioEditar,
                                                'nombre_cliente_editar':nombreClienteEditar,
                                                'celular_editar':celularEditar,
                                                'tipo_inmueble_editar':tipoInmuebleEditar,
                                                'ciudad_editar':ciudadEditar,
                                                'barrio_editar':barrioEditar,
                                                'direccion_editar':direccionEditar,
                                                'fecha_visita_editar':fechaVisitaEditar,
                                                'visitado_editar':visitadoEditar
                                            },
                                            success: function (respuesta) {
                                                if (respuesta == "visita_editada") {
                                                    Swal.fire(
                                                        'Bien!',
                                                        'La visita ha sido editada satisfacoriamente!',
                                                        'success'
                                                    );
                                                    window.location.reload();
                                                }

                                                if (respuesta == "visita_no_editada") {
                                                    Swal.fire(
                                                        'Precacuión!',
                                                        'La visita NO ha sido editada!',
                                                        'warning'
                                                    )
                                                    window.location.reload();
                                                }

                                                if (respuesta == "error_exception") {
                                                    Swal.fire(
                                                        'Erro!',
                                                        'Error de Excepción, por favor contacte a soporte!',
                                                        'error'
                                                    )
                                                    window.location.reload();
                                                }
                                            }
                                        });
                                    });

                                    // =============================================

                                    // INICIO - Estilo Calendario
                                    // let minDate = moment().subtract(120, 'years');
                                    // optionsDatePicker.timePicker24Hour = false;
                                    // optionsDatePicker.locale.format='DD-MM-YYYY';
                                    // optionsDatePicker.timePicker = false;
                                    // optionsDatePicker.autoUpdateInput = false;
                                    // optionsDatePicker.minDate = minDate.format('DD-MM-YYYY');
                                    // optionsDatePicker.drops = 'up';
                                    // FIN - Estilo Calendario

                                    // $('.datapicker').daterangepicker(optionsDatePicker).on('apply.daterangepicker', function(ev, picker) {
                                    //     $(this).val(picker.startDate.format('DD-MM-YYYY'));
                                    // });

                                    // $('.fecha_mtto_ejecutado_editar').val('');

                                    //=======================================//

                                    // $('.chosen.swal').select2({});

                                    // =============================================



                                    // =============================================


                                }
                            });
                        },

                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================

                        // eventResize: function(event, delta)
                        // {
                            // var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                            // var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                            // var title = event.title;
                            // var id = event.id;
                            // $.ajax({
                            //     url:"/full-calender/action",
                            //     type:"POST",
                            //     data:{
                            //         title: title,
                            //         start: start,
                            //         end: end,
                            //         id: id,
                            //         type: 'update'
                            //     },
                            //     success:function(response)
                            //     {
                            //         calendar.fullCalendar('refetchEvents');
                            //         alert("Event Updated Successfully");
                            //     }
                            // })
                        // },

                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================
                        // ========================================================================================

                        // eventDrop: function(event, delta)
                        // {
                            // var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                            // var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                            // var title = event.title;
                            // var id = event.id;
                            // $.ajax({
                            //     url:"/full-calender/action",
                            //     type:"POST",
                            //     data:{
                            //         title: title,
                            //         start: start,
                            //         end: end,
                            //         id: id,
                            //         type: 'update'
                            //     },
                            //     success:function(response)
                            //     {
                            //         calendar.fullCalendar('refetchEvents');
                            //         alert("Event Updated Successfully");
                            //     }
                            // })
                        // },
                    }); // FIN Full Calendar
                } // FIN Succes (response.visitasCalendario)
            }); // FIN AJAX
        }); // FIN Document Ready
    </script>
@endsection
