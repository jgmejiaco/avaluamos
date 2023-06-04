@extends('layouts.app')
@section('title', 'Cronograma Mtto Infra')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" /> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}"/> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
    {{-- <style>
        .select2-container{
            z-index: 99999 !important;
        }
    </style> --}}

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
            {{-- <img src="{{asset('imagenes/icon_help.png')}}" alt="homepage" class="dark-logo size-logo float-right mt-2 pointer" width="25" id="icon_ayuda"> --}}
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
        
                            <div class="btn-group-sm flex-wrap" role="group" aria-label="Basic example">
                                <a href="/compras/categorias_mtto_infra" class="btn btn-rounded btn-success float-right">Crear Visita</a>
                            </div>
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
    {{-- <script src="{{asset('fullcalendar/js/fullcalendar.min.js')}}"></script> --}}
    <script src="{{asset('fullcalendar/js/locale/es.js')}}"></script>
    {{-- FIN SCRIPT FULL CALENDAR "LOCAL" --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

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
        
            var calendar = $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events:'/full-calender',
                selectable:true,
                selectHelper: true,
                select:function(start, end, allDay)
                {
                    var title = prompt('Event Title:');
        
                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
        
                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
        
                        $.ajax({
                            url:"/full-calender/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success:function(data)
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Created Successfully");
                            }
                        })
                    }
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
                eventDrop: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/full-calender/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated Successfully");
                        }
                    })
                },
        
                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"/full-calender/action",
                            type:"POST",
                            data:{
                                id:id,
                                type:"delete"
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Deleted Successfully");
                            }
                        })
                    }
                }
            });
        });
    </script>
@endsection