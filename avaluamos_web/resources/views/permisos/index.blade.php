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
                                <th class="text-center" style="vertical-align: middle">VISITAS</th>
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
                                        {!! Form::checkbox('mod_usuario_'.$rol->id_rol, 1, $rol->mod_usuario, ['id' => 'mod_usuario_'.$rol->id_rol]) !!}
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        {!! Form::checkbox('mod_clientes_'.$rol->id_rol, 1, $rol->mod_clientes, ['id' => 'mod_clientes_'.$rol->id_rol]) !!}
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        {!! Form::checkbox('mod_calendario_'.$rol->id_rol, 1, $rol->mod_calendario, ['id' => 'mod_calendario_'.$rol->id_rol]) !!}
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        {!! Form::checkbox('mod_visitas_'.$rol->id_rol, 1, $rol->mod_visitas, ['id' => 'mod_visitas_'.$rol->id_rol]) !!}
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        {!! Form::checkbox('mod_avaluo_'.$rol->id_rol, 1, $rol->mod_avaluo, ['id' => 'mod_avaluo_'.$rol->id_rol]) !!}
                                    </td>

                                    <td class="text-center" style="vertical-align: middle">
                                        {!! Form::checkbox('mod_informes_'.$rol->id_rol, 1, $rol->mod_informes, ['id' => 'mod_informes_'.$rol->id_rol]) !!}
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

        function editarPermiso(idRol) {
            let modUsuario = $('#mod_usuario_'+idRol).is(':checked') ? '1' : '0';
            let modClientes = $('#mod_clientes_'+idRol).is(':checked') ? '1' : '0';
            let modCalendario = $('#mod_calendario_'+idRol).is(':checked') ? '1' : '0';
            let modVisitas = $('#mod_visitas_'+idRol).is(':checked') ? '1' : '0';
            let modAvaluo = $('#mod_avaluo_'+idRol).is(':checked') ? '1' : '0';
            let modInformes = $('#mod_informes_'+idRol).is(':checked') ? '1' : '0';

            $.ajax({
                url: "{{route('permiso_update')}}",
                type: "POST",
                dataType: "JSON",
                data:{
                    '_token': "{{ csrf_token() }}",
                    'id_rol': idRol,
                    'mod_usuario': modUsuario,
                    'mod_clientes': modClientes,
                    'mod_calendario': modCalendario,
                    'mod_visitas': modVisitas,
                    'mod_avaluo': modAvaluo,
                    'mod_informes': modInformes,
                },
                success: function (respuesta) {
                    if (respuesta == "permiso_editado") {
                        Swal.fire(
                            'Hecho!',
                            'Este permiso ha sido editado!',
                            'success'
                        );
                        window.location.reload();
                    }

                    // =============================

                    if (respuesta == "permiso_no_editado") {
                        Swal.fire(
                            'Precaución!',
                            'Este permiso NO ha sido editado!',
                            'warning'
                        );
                        window.location.reload();
                    }

                    // =============================

                    if (respuesta == "error_exception") {
                        Swal.fire(
                            'Error!',
                            'Error de Excepción!',
                            'warning'
                        );
                        window.location.reload();
                    }
                }
            })
        }
    </script>
@endsection