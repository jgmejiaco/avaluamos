@extends('layouts.app')
@section('title', 'Clietes Potenciales')
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase">Clientes Potenciales</h2>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary float-right">Crear Nuevo Cliente</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row" style="margin-top: 5em !important;">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabla_visitas" aria-describedby="tbl editar visitas">
                        <thead>
                            <tr class="header-table">
                                <th>ID</th>
                                <th>Nombre Solicitante</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Tipo de Pesona</th>
                                <th>Dirigido A:</th>
                                <th>Tipo Documento</th>
                                <th>Número Documento</th>
                                <th>Objeto Avalúo</th>
                                <th>Municipio</th>
                                <th>Tipo Inmueble</th>
                                <th>Valor Cotización</th>
                                <th>Recomendado Por</th>
                                <th>Visitado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id_cliente}}</td>
                                    <td>{{$cliente->cli_nombres}}</td>
                                    <td>{{$cliente->cli_celular}}</td>
                                    <td>{{$cliente->cli_email}}</td>
                                    <td>{{$cliente->tipo_persona}}</td>
                                    <td>{{$cliente->dirigido_a}}</td>
                                    <td>{{$cliente->decripcion_documento}}</td>
                                    <td>{{$cliente->documento_empresa}}</td>
                                    <td>{{$cliente->objeto_avaluo}}</td>
                                    <td>{{$cliente->descripcion_ciudad}}</td>
                                    <td>{{$cliente->tipo_inmueble}}</td>
                                    <td>{{$cliente->valor_cotizacion}}</td>
                                    <td>{{$cliente->referido_por}}</td>
                                    <td>{{$cliente->descripcion_si_no}}</td>
                                    <td>
                                        <a href="visita/edit" class="btn btn-info" id="">Editar</a>
                                        {{-- <button class="btn btn-info" id="">
                                            <i class="fa fa-key" aria-hidden="true"></i>Editar
                                        </button> --}}
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
        $(document).ready(function()
        {
            // INICIO DataTable LIST USER'S
            $("#tabla_visitas").DataTable({
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
            // CIERRE DataTable LISTA CLIENTES
        });
    </script>
@endsection