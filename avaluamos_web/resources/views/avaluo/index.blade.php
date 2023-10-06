@extends('layouts.app')
@section('title', 'Avalúo')
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    {{-- @php
        use Carbon\Carbon;
    @endphp --}}
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Calcular Avalúos</h1>
            </div>
        </div>

        {{-- ============================== --}}

        {{-- <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('visita.create')}}" class="btn btn-primary">Registrar Nueva Visita</a>
            </div>
        </div> --}}

        {{-- ============================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="tbl_avaluos">
                        <thead>
                            <tr class="header-table">
                                <th>ID Visita</th>
                                <th>Cliente</th>
                                <th>Dirigido A</th>
                                <th>Objeto Avalúo</th>
                                <th>Ciudad</th>
                                <th>Tipo Inmueble</th>
                                <th>Área</th>
                                <th>Estrato</th>
                                <th>% Descuento</th>
                                <th>Valor Cotización</th>
                                <th>Estado Visitado</th>
                                <th>Fecha Visita</th>
                                <th>Fecha Informe</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        {{-- ============================== --}}
                        <tbody>
                            {{-- @php
                                dd($avaluosIndex);
                            @endphp --}}
                            @foreach ($avaluosIndex as $avaluo)
                                <tr>
                                    <td>{{$avaluo->id_visita}}</td>
                                    <td>{{$avaluo->cli_nombres}}</td>
                                    <td>{{$avaluo->dirigido_a}}</td>
                                    <td>{{$avaluo->objeto_avaluo}}</td>
                                    <td>{{$avaluo->descripcion_ciudad}}</td>
                                    <td>{{$avaluo->tipo_inmueble}}</td>
                                    <td>{{$avaluo->area}}</td>
                                    <td>{{$avaluo->estrato}}</td>
                                    <td>{{$avaluo->porcentaje_descuento}}</td>
                                    <td>{{$avaluo->valor_cotizacion}}</td>
                                    <td>{{$avaluo->descripcion_si_no}}</td>
                                    <td>{{$avaluo->fecha_visita}}</td>
                                    <td>{{$avaluo->fecha_informe}}</td>
                                    <td>
                                        <a href="{{route('calcular_avaluo',$avaluo->id_visita)}}" class="btn btn-info mt-3" id="calcular_avaluo">
                                            <i class="fa fa-key" aria-hidden="true"></i> Calcular Avalúo
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('DataTables/Buttons-2.3.4/js/buttons.html5.min.js')}}"></script>

    <script>
        $( document ).ready(function()
        {

            // // INICIO DataTable LIST USER'S
            $("#tbl_avaluos").DataTable({
                dom: 'Blfrtip',
                "infoEmpty": "No hay registros",
                stripe: true, 
                "bSort": false,
                "buttons": [
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
                        init: function(api, node, config) {
                            $(node).removeClass('dt-button')
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        className: 'waves-effect waves-light btn-rounded btn-sm btn-primary mr-3',
                        customize: function( xlsx ) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            $('row:first c', sheet).attr( 's', '42' );
                        }
                    }
                ],
                "pageLength": 25,
                "scrollX": true,                 
            });
            // CIERRE DataTable LIST USER'S
        });
    </script>
@endsection