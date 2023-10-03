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
                        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                            <h4 class="card-title text-themecolor m-t-10 pointer mostrar_ocultar_campos">Cronograma</h4>
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
        $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            let tipoInmuebles = @json($tipo_inmueble);
            let ciudades = @json($ciudades);

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
                            right:'month,agendaWeek,agendaDay'
                        },
                        events: visitasCalendario,
                        // events: [
                        //     {
                        //         id: '1',
                        //         title: 'visita 1',
                        //         start: '2023-10-10',
                        //         color: '#EC971F'
                        //     },
                        //     {
                        //         id: '2',
                        //         title: 'visita 2',
                        //         start: '2023-10-11',
                        //         color: '#EC971F'
                        //     },
                        // ],
                        selectable:true,
                        selectHelper: true,
                        eventRender: function (event, element) {}, // Renderiza el Calendario
                        editable:true,
                        locale: 'es',
                        defaultView: 'month',
                        firstDay: 1, // Monday (0=sunday)
                        weekNumbers: true,
                        allDaySlot: false, // true, false
                        eventLimit: true,
                        eventDurationEditable: true,
                        weekends: true, // show (true) the weekend or not (false)
                        weekType: 'agendaWeek',
                        dayType: 'agendaDay',
                        eventOverlap: true,
                        nowIndicator:true,
                        disableDragging: false,
                        disableResizing: false,
                        lazyFetching: false, // Don't change this to true or month view wont work.
                        filter: false,
                        quickSave: false,
                        fixedWeekCount: 'true', // true, false
                        slotEventOverlap: true,
                        slotLabelFormat: 'h:mma',
                        slotDuration: "00:15:00",
                        slotLabelInterval: 10,
                        buttonIcons:false,
                        
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

                                formCalendarioVisita += `
                                    {!! Form::open(['method' => 'POST', 'route' => ['calendario.store'], 'id'=>'form_calendario_visita', 'class'=>'form-material mt-3', 'accept-charset' => 'UTF-8' ]) !!}
                                    @csrf
                                `;

                                // =============================================
                                
                                formCalendarioVisita += `
                                    <input name="fecha_visita" type="hidden" class="form-control" id="fecha_visita" value="${fechaVisita}" required>
                                `;

                                // =============================================
                                
                                formCalendarioVisita += `
                                        <div class="row mt-2">
                                            <div class="form-group d-flex flex-column">
                                                <label for="nombre_cliente" class="fs-14">Nombre cliente
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="nombre_cliente" type="text" class="form-control" id="nombre_cliente" required>
                                            </div>
                                        </div>
                                `;

                                // =============================================
                                
                                formCalendarioVisita += `
                                        <div class="row mt-12">
                                            <div class="form-group d-flex flex-column">
                                                <label for="celular" class="fs-14">Celular
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="celular" type="text" class="form-control" id="celular" required>
                                            </div>
                                        </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="row mt-2">
                                        <div class="form-group d-flex flex-column">
                                            <label for="tipo_inmueble" class="fs-14">Tipo Inmueble
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="tipo_inmueble" name="tipo_inmueble" required>
                                                <option value="" selected >Seleccione...</option>
                                `;
                                        $.each(tipoInmuebles, function(idTInmueble, tipoInmueble){
                                            formCalendarioVisita += ' <option value="'+idTInmueble+'">'+tipoInmueble+'</option>'
                                        });
                                formCalendarioVisita += `
                                            </select>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <div class="row mt-2">
                                        <div class="form-group d-flex flex-column">
                                            <label for="ciudad" class="fs-14">Municipio
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="ciudad" name="ciudad" required>
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
                                        <div class="row mt-12">
                                            <div class="form-group d-flex flex-column">
                                                <label for="barrio" class="fs-14">Barrio
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="barrio" type="text" class="form-control" id="barrio" required>
                                            </div>
                                        </div>
                                `;

                                // =============================================
                                
                                formCalendarioVisita += `
                                        <div class="row mt-12">
                                            <div class="form-group d-flex flex-column">
                                                <label for="direccion" class="fs-14">Dirección
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input name="direccion" type="text" class="form-control" id="direccion" required>
                                            </div>
                                        </div>
                                `;

                                // =============================================
                                
                                formCalendarioVisita += `
                                    <div class="row mt-2">
                                        <div class="form-group d-flex flex-column">
                                            <label for="visitado" class="fs-14">visitado
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="visitado" name="visitado" required>
                                                <option value="" selected >Seleccione...</option>
                                                <option value="true">Visitado</option>
                                                <option value="false">No visitado</option>
                                            </select>
                                        </div>
                                    </div>
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    <input type="submit" class="btn btn-primary mt-3" value="Crear Visita">
                                `;

                                // =============================================

                                formCalendarioVisita += `
                                    {!! Form::close() !!}
                                `;

                                // =============================================
                            
                                swal({
                                    title: '<strong>AGENDAMIENTO</strong>',
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
                                    padding:'3em',
                                    position: 'bottom',
                                });

                                //=======================================//

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
                
                            // if(title)
                            // {
                            //     var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                
                            //     var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
                
                            //     $.ajax({
                            //         url:"/full-calender/action",
                            //         type:"POST",
                            //         data:{
                            //             title: title,
                            //             start: start,
                            //             end: end,
                            //             type: 'add'
                            //         },
                            //         success:function(data)
                            //         {
                            //             calendar.fullCalendar('refetchEvents');
                            //             alert("Event Created Successfully");
                            //         }
                            //     })
                            // }
                        },

                        // ===============================================
                        
                        // EDITAR
                        eventClick:function(event)
                        {
                            console.log(`id de la visita ${event.id}`);
                            // if(confirm("Are you sure you want to remove it?"))
                            // {
                            //     var id = event.id;
                            //     $.ajax({
                            //         url:"/full-calender/action",
                            //         type:"POST",
                            //         data:{
                            //             id:id,
                            //             type:"delete"
                            //         },
                            //         success:function(response)
                            //         {
                            //             calendar.fullCalendar('refetchEvents');
                            //             alert("Event Deleted Successfully");
                            //         }
                            //     })
                            // }
                        },

                        // ===============================================

                        eventResize: function(event, delta)
                        {
                            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                            var title = event.title;
                            var id = event.id;
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
                        },

                        // ===============================================

                        eventDrop: function(event, delta)
                        {
                            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                            var title = event.title;
                            var id = event.id;
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
                        },
                    }); // FIN Full Calendar
                } // FIN Succes (response.visitasCalendario)
            }); // FIN AJAX
        }); // FIN Document Ready
    </script>
@endsection