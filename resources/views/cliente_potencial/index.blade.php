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
                <h1 class="text-center text-uppercase">Clientes Potenciales</h1>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary">Crear Nuevo Cliente</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-button" id="tabla_visitas">
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
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nombre y Apellido</td>
                                <td>300 555 55 55</td>
                                <td>nombre@correo.com</td>
                                <td>Natural</td>
                                <td>EPM</td>
                                <td>Nit</td>
                                <td>0123456789</td>
                                <td>juridico</td>
                                <td>medellin</td>
                                <td>Finca</td>
                                <td>500000</td>
                                <td>empleado juan</td>
                                <td>pendiente</td>
                                <td>
                                    <a href="visita/edit" class="btn btn-info" id="">Editar</a>
                                    {{-- <button class="btn btn-info" id="">
                                        <i class="fa fa-key" aria-hidden="true"></i>Editar
                                    </button> --}}
                                </td>
                            </tr>
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