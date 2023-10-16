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
                <h1 class="text-center text-uppercase">Permiso Módulos</h1>
            </div>
        </div>

        {{-- ====================================================== --}}

        {{-- <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary">Crear Nuevo Permisos</a>
            </div>
        </div> --}}

        {{-- ====================================================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabla_permisos">
                        <thead>
                            <tr class="header-table"">
                                <th class="text-center" style="vertical-align: middle">ID ROL</th>
                                <th class="text-center" style="vertical-align: middle">ROL</th>
                                <th class="text-center" style="vertical-align: middle">GESTOR USUARIOS</th>
                                <th class="text-center" style="vertical-align: middle">CLIENTES</th>
                                <th class="text-center" style="vertical-align: middle">CALENDARIO</th>
                                <th class="text-center" style="vertical-align: middle">AVALÚO</th>
                                <th class="text-center" style="vertical-align: middle">INFORMES GERENCIALES</th>
                                <th class="text-center" style="vertical-align: middle">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$rol->id_rol}}</td>

                                    <td class="text-center" style="vertical-align: middle">{{$rol->nombre_rol}}</td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="mod_usuario_{{$rol->id_rol}}" id="mod_usuario_{{$rol->id_rol}}">
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="mod_clientes_{{$rol->id_rol}}" id="mod_clientes_{{$rol->id_rol}}">
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="mod_calendario_{{$rol->id_rol}}" id="mod_calendario_{{$rol->id_rol}}">
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="mod_avaluo_{{$rol->id_rol}}" id="mod_avaluo_{{$rol->id_rol}}">
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <input type="checkbox" name="mod_informes_{{$rol->id_rol}}" id="mod_informes_{{$rol->id_rol}}">
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        <button class="btn btn-info" id="btn_permiso" onclick="editarPermiso({{$rol->id_rol}})">
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

        // ==========================================

        function editarPermiso(idPermiso) {

            console.log(idPermiso);
            let modUsuario = $('#mod_usuario_'+idPermiso).is(':checked') ? 'on' : 'off';
            let modClientes = $('#mod_clientes_'+idPermiso).is(':checked') ? 'on' : 'off';
            let modCalendario = $('#mod_calendario_'+idPermiso).is(':checked') ? 'on' : 'off';
            let modAvaluo = $('#mod_avaluo_'+idPermiso).is(':checked') ? 'on' : 'off';
            let modInformes = $('#mod_informes_'+idPermiso).is(':checked') ? 'on' : 'off';

            $.ajax({
                url: "{{route('permiso_update')}}",
                type: "POST",
                dataType: "JSON",
                data:{
                    '_token': "{{ csrf_token() }}",
                    'id_permiso': idPermiso,
                    'mod_usuario': modUsuario,
                    'mod_clientes': modClientes,
                    'mod_calendario': modCalendario,
                    'mod_avaluo': modAvaluo,
                    'mod_informes': modInformes,
                },
                success: function (respuesta) {
                    console.log(respuesta);
                }
            })
            
            
            // $("input:checkbox[id^='pending_']").attr('checked', true);

            console.log(mod_usuario);
            console.log(mod_clientes);
            console.log(mod_calendario);
            console.log(mod_avaluo);
            console.log(mod_informes);
        }
    </script>
@endsection