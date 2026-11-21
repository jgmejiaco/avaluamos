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

    @include('layouts.fullcalendar_assets', ['tipo' => 'css'])
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

    {{-- Modal Crear Visita Calendario --}}
    <div class="modal fade" id="modalCrearVisitaCalendario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalCrearVisitaCalendarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="modalCrearVisitaCalendarioLabel">Agendamiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body p-4">
                    @include('calendario.partials.modal_crear_visita')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_crear_visita_calendario">Crear Visita</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Editar Visita Calendario --}}
    <div class="modal fade" id="modalEditarVisitaCalendario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="modalEditarVisitaCalendarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="modalEditarVisitaCalendarioLabel">Editar Visita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body p-4">
                    @include('calendario.partials.modal_editar_visita')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_editar_visita_calendario">Editar Visita</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- ============================================================== --}}
{{-- ============================================================== --}}

@section('scripts')
    @include('layouts.fullcalendar_assets', ['tipo' => 'js'])

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

            function mostrarProcesando(mensaje) {
                Swal.fire({
                    title: mensaje || 'Procesando...',
                    text: 'Por favor espere',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: function () {
                        Swal.showLoading();
                    }
                });
            }

            $(document).on('click', '#btn_crear_visita_calendario', function () {
                let $btn = $(this);
                let nombreCliente = $('#nombre_cliente').val();
                let celular = $('#celular').val();
                let tipoInmueble = $('#tipo_inmueble').val();
                let ciudad = $('#ciudad').val();
                let barrio = $('#barrio').val();
                let direccion = $('#direccion').val();
                let fechaVisita = $('#fecha_visita').val();
                let visitado = $('#visitado').val();

                $.ajax({
                    url: "{{ route('calendario.store') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'nombre_cliente': nombreCliente,
                        'celular': celular,
                        'tipo_inmueble': tipoInmueble,
                        'ciudad': ciudad,
                        'barrio': barrio,
                        'direccion': direccion,
                        'fecha_visita': fechaVisita,
                        'visitado': visitado
                    },
                    beforeSend: function () {
                        $btn.prop('disabled', true);
                        mostrarProcesando('Creando visita...');
                    },
                    complete: function () {
                        $btn.prop('disabled', false);
                    },
                    success: function (respuesta) {
                        let modalCrear = document.getElementById('modalCrearVisitaCalendario');
                        bootstrap.Modal.getOrCreateInstance(modalCrear).hide();

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
                            );
                            window.location.reload();
                        }

                        if (respuesta == "error_exception") {
                            Swal.fire(
                                'Erro!',
                                'Error de Excepción, por favor contacte a soporte!',
                                'error'
                            );
                            window.location.reload();
                        }
                    },
                    error: function () {
                        Swal.fire('Erro!', 'No se pudo crear la visita.', 'error');
                    }
                });
            });

            $(document).on('click', '#btn_editar_visita_calendario', function () {
                let $btn = $(this);
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
                    url: "{{ route('calendario.update', ['calendario' => '__ID__']) }}".replace('__ID__', idVisitaCalendarioEditar),
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        '_method': 'PUT',
                        'id_visita_calendario_editar': idVisitaCalendarioEditar,
                        'nombre_cliente_editar': nombreClienteEditar,
                        'celular_editar': celularEditar,
                        'tipo_inmueble_editar': tipoInmuebleEditar,
                        'ciudad_editar': ciudadEditar,
                        'barrio_editar': barrioEditar,
                        'direccion_editar': direccionEditar,
                        'fecha_visita_editar': fechaVisitaEditar,
                        'visitado_editar': visitadoEditar
                    },
                    beforeSend: function () {
                        $btn.prop('disabled', true);
                        mostrarProcesando('Editando visita...');
                    },
                    complete: function () {
                        $btn.prop('disabled', false);
                    },
                    success: function (respuesta) {
                        let modalEditar = document.getElementById('modalEditarVisitaCalendario');
                        bootstrap.Modal.getOrCreateInstance(modalEditar).hide();

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
                            );
                            window.location.reload();
                        }

                        if (respuesta == "error_exception") {
                            Swal.fire(
                                'Erro!',
                                'Error de Excepción, por favor contacte a soporte!',
                                'error'
                            );
                            window.location.reload();
                        }
                    },
                    error: function () {
                        Swal.fire('Erro!', 'No se pudo editar la visita.', 'error');
                    }
                });
            });

            function fechaHoyYmd() {
                let hoy = new Date();
                let hoyDia = hoy.getDate();
                let hoyMes = hoy.getMonth() + 1;
                let hoyYear = hoy.getFullYear();

                if (hoyDia < 10) hoyDia = '0' + hoyDia;
                if (hoyMes < 10) hoyMes = '0' + hoyMes;

                return hoyYear + '-' + hoyMes + '-' + hoyDia;
            }

            function actualizarFechaVisitaCalendario(event, revertFunc) {
                let nuevaFecha = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                let fechaVisitaDia = nuevaFecha.substring(0, 10);

                if (fechaVisitaDia < fechaHoyYmd()) {
                    Swal.fire(
                        'Atención!',
                        'No es posible mover una visita a fechas pasadas.',
                        'error'
                    );
                    if (typeof revertFunc === 'function') {
                        revertFunc();
                    }
                    return;
                }

                let fechaVisitaEditar = nuevaFecha.replace(' ', 'T').substring(0, 16);
                mostrarProcesando('Actualizando fecha...');

                $.ajax({
                    url: "{{ route('consultar_visita_calendario') }}",
                    type: 'POST',
                    dataType: 'JSON',
                    data: { 'id_visita_calendario': event.id },
                    success: function (response) {
                        if (!response || !response.id_visita_calendario) {
                            Swal.fire('Error!', 'No se pudo consultar la visita.', 'error');
                            if (typeof revertFunc === 'function') {
                                revertFunc();
                            }
                            return;
                        }

                        $.ajax({
                            url: "{{ route('calendario.update', ['calendario' => '__ID__']) }}".replace('__ID__', response.id_visita_calendario),
                            type: 'POST',
                            dataType: 'JSON',
                            data: {
                                '_token': "{{ csrf_token() }}",
                                '_method': 'PUT',
                                'id_visita_calendario_editar': response.id_visita_calendario,
                                'nombre_cliente_editar': response.nombre_cliente,
                                'celular_editar': response.celular,
                                'tipo_inmueble_editar': response.t_inmueble,
                                'ciudad_editar': response.municipio,
                                'barrio_editar': response.barrio,
                                'direccion_editar': response.direccion,
                                'fecha_visita_editar': fechaVisitaEditar,
                                'visitado_editar': response.visita_cumplida
                            },
                            success: function (respuesta) {
                                if (respuesta == 'visita_editada') {
                                    Swal.fire(
                                        'Bien!',
                                        'La fecha de la visita fue actualizada.',
                                        'success'
                                    );
                                    return;
                                }

                                if (typeof revertFunc === 'function') {
                                    revertFunc();
                                }

                                if (respuesta == 'visita_no_editada') {
                                    Swal.fire(
                                        'Precacuión!',
                                        'La visita NO ha sido editada!',
                                        'warning'
                                    );
                                    return;
                                }

                                Swal.fire(
                                    'Erro!',
                                    'Error de Excepción, por favor contacte a soporte!',
                                    'error'
                                );
                            },
                            error: function () {
                                if (typeof revertFunc === 'function') {
                                    revertFunc();
                                }
                                Swal.fire('Erro!', 'No se pudo actualizar la fecha de la visita.', 'error');
                            }
                        });
                    },
                    error: function () {
                        if (typeof revertFunc === 'function') {
                            revertFunc();
                        }
                        Swal.fire('Erro!', 'No se pudo consultar la visita.', 'error');
                    }
                });
            }

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

                            // Comparar solo día: en vista mes FullCalendar usa 00:00:00
                            let fechaVisitaDia = event.start.substring(0, 10);

                            if (fechaVisitaDia >= fechaHoyYmd()) {
                                let fechaVisitaInput = event.start.replace(' ', 'T').substring(0, 16);
                                let modalCrear = document.getElementById('modalCrearVisitaCalendario');

                                $('#modalCrearVisitaCalendario').find('input[type="text"], input[type="datetime-local"]').val('');
                                $('#tipo_inmueble, #ciudad, #visitado').val('');
                                $('#fecha_visita').val(fechaVisitaInput);

                                bootstrap.Modal.getOrCreateInstance(modalCrear).show();
                            } else {
                                Swal.fire(
                                    'Atención!',
                                    'No es posible crear una visita en fechas pasadas.',
                                    'error'
                                );
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
                                    let fechaVisitaEditar = (response.fecha_visita_calendario || '').replace(' ', 'T').substring(0, 16);

                                    $('#id_visita_calendario_editar').val(response.id_visita_calendario);
                                    $('#nombre_cliente_editar').val(response.nombre_cliente);
                                    $('#celular_editar').val(response.celular);
                                    $('#tipo_inmueble_editar').val(response.t_inmueble);
                                    $('#ciudad_editar').val(response.municipio);
                                    $('#barrio_editar').val(response.barrio);
                                    $('#direccion_editar').val(response.direccion);
                                    $('#fecha_visita_editar').val(fechaVisitaEditar);
                                    $('#visitado_editar').val(response.visita_cumplida);

                                    let modalEditar = document.getElementById('modalEditarVisitaCalendario');
                                    bootstrap.Modal.getOrCreateInstance(modalEditar).show();
                                }
                            });
                        },

                        // Mover visita (arrastrar)
                        eventDrop: function (event, delta, revertFunc) {
                            actualizarFechaVisitaCalendario(event, revertFunc);
                        },

                        // Redimensionar visita (vista semana/día)
                        eventResize: function (event, delta, revertFunc) {
                            actualizarFechaVisitaCalendario(event, revertFunc);
                        },
                    }); // FIN Full Calendar
                } // FIN Succes (response.visitasCalendario)
            }); // FIN AJAX
        }); // FIN Document Ready
    </script>
@endsection
