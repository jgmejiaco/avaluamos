@extends('layouts.app')
@section('title', 'Crear Visita')
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">editar visita</h1>
            </div>
        </div>

        @include('visita.fields_edit_main')
    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')

    {{-- <script src="{{asset('DataTables/datatables.min.js')}}"></script> --}}
    {{-- <script src="{{asset('DataTables/Buttons-2.3.4/js/buttons.html5.min.js')}}"></script> --}}

    <script>
        $( document ).ready(function()
        {

            // // INICIO DataTable LIST USER'S
            // $("#tabla_ususuarios").DataTable({
            //     dom: 'Blfrtip',
            //     "infoEmpty": "No hay registros",
            //     stripe: true, 
            //     "bSort": false,
            //     "buttons": [
            //         {
            //             extend: 'copyHtml5',
            //             text: 'Copy',
            //             className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
            //             init: function(api, node, config) {
            //                 $(node).removeClass('dt-button')
            //             }
            //         },
            //         {
            //             extend: 'excelHtml5',
            //             text: 'Excel',
            //             className: 'waves-effect waves-light btn-rounded btn-sm btn-primary mr-3',
            //             customize: function( xlsx ) {
            //                 var sheet = xlsx.xl.worksheets['sheet1.xml'];
            //                 $('row:first c', sheet).attr( 's', '42' );
            //             }
            //         }
            //     ],
            //     "pageLength": 25,
            //     "scrollX": true,                 
            // });
            // CIERRE DataTable LIST USER'S
        });
    </script>
@endsection