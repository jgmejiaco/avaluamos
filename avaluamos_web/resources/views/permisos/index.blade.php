@extends('layouts.app')
@section('title', 'Clietes Potenciales')
@section('css')
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

                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_usuario_'.$rol->id_rol, 1, $rol->mod_usuario, ['id' => 'mod_usuario_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_usuario_'.$rol->id_rol, 1, $rol->mod_usuario, ['id' => 'mod_usuario_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}

                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_clientes_'.$rol->id_rol, 1, $rol->mod_clientes, ['id' => 'mod_clientes_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_clientes_'.$rol->id_rol, 1, $rol->mod_clientes, ['id' => 'mod_clientes_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}
                                    
                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_calendario_'.$rol->id_rol, 1, $rol->mod_calendario, ['id' => 'mod_calendario_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_calendario_'.$rol->id_rol, 1, $rol->mod_calendario, ['id' => 'mod_calendario_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}
                                    
                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_visitas_'.$rol->id_rol, 1, $rol->mod_visitas, ['id' => 'mod_visitas_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_visitas_'.$rol->id_rol, 1, $rol->mod_visitas, ['id' => 'mod_visitas_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}
                                    
                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_avaluo_'.$rol->id_rol, 1, $rol->mod_avaluo, ['id' => 'mod_avaluo_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_avaluo_'.$rol->id_rol, 1, $rol->mod_avaluo, ['id' => 'mod_avaluo_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}
                                    
                                    @if ($rol->id_rol == 1)
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_informes_'.$rol->id_rol, 1, $rol->mod_informes, ['id' => 'mod_informes_'.$rol->id_rol, 'disabled' => 'disabled']) !!}
                                        </td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            {!! Form::checkbox('mod_informes_'.$rol->id_rol, 1, $rol->mod_informes, ['id' => 'mod_informes_'.$rol->id_rol]) !!}
                                        </td>
                                    @endif

                                    {{-- ================================ --}}

                                    @if ($rol->id_rol == 1)
                                        <td></td>
                                    @else
                                        <td class="text-center" style="vertical-align: middle">
                                            <button class="btn btn-info" id="btn_permiso" onclick="editarPermiso({{$rol->id_rol}})">
                                                <i class="fa fa-key" aria-hidden="true"></i>Editar Rol
                                            </button>
                                        </td>
                                    @endif
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
    <script>
        $(document).ready(function() {
            $("#tabla_permisos").DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_de_Permisos',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_de_Permisos'
                    }
                ],
                language: {
                    url: "{{ asset('dataTable2.3.1/language/es-Es.json') }}"
                },
                pageLength: 10,
                lengthMenu: [[10, 15, 20, 25, 30, 35, 40, 45, 50, -1], [10, 15, 20, 25, 30, 35, 40, 45, 50, "Todos"]],
                scrollX: true,
                bSort: true,
                stripe: true,
                responsive: true,
                infoEmpty: "No hay registros disponibles"
            });
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