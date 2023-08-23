@extends('layouts.app')
@section('title', 'Clietes Potenciales')
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
    <style>
        .text-center {
            width: 12.5%;
            text-align: center;
            margin-top: auto;
        }
    </style>
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Permisos</h1>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary">Crear Nuevo Permisos</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabla_permisos">
                        <thead>
                            <tr class="header-table"">
                                <th class="text-center" style="vertical-align: middle">ID ROL</th>
                                <th class="text-center" style="vertical-align: middle">ROL</th>
                                <th class="text-center" style="vertical-align: middle">MÓDULO USUARIOS</th>
                                <th class="text-center" style="vertical-align: middle">MÓDULO CLIENTE POTENCIAL</th>
                                <th class="text-center" style="vertical-align: middle">MÓDULO CALENDARIO</th>
                                <th class="text-center" style="vertical-align: middle">AVALUO</th>
                                <th class="text-center" style="vertical-align: middle">MÓDULO INFORMES GERENCIALES</th>
                                <th class="text-center" style="vertical-align: middle">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$rol['id_rol']}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$rol['nombre_rol']}}</td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td class="text-center" style="vertical-align: middle">
                                        <button class="btn btn-info" title="Update Password" id="">
                                            <i class="fa fa-key" aria-hidden="true"></i>Editar Rol
                                        </button>
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
            $("#tabla_permisos").DataTable({
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