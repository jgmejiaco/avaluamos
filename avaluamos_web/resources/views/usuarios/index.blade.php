@extends('layouts.app')
@section('title', 'Index')
@section('css')
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="text-center text-uppercase">Lista de Usuarios</h1>
        </div>
    </div>

    <div class="row p-b-20 float-right">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{route('usuarios.create')}}" class="btn btn-primary">Crear Nuevo Usuario</a>
        </div>
    </div>
    <div class="row p-t-30">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="tabla_ususuarios">
                    <thead>
                        <tr class="header-table">
                            <th>Id</th>
                            <th>Usuario</th>
                            {{-- <th>Nombres</th> --}}
                            {{-- <th>Apellidos</th> --}}
                            <th>Nombre Completo</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id_usuario}}</td>
                                <td>{{$usuario->nombre_usuario}}</td>
                                {{-- <td>{{$usuario->nombres}}</td> --}}
                                {{-- <td>{{$usuario->apellidos}}</td> --}}
                                <td>{{$usuario->nombre_completo}}</td>
                                <td>{{$usuario->decripcion_documento}}</td>
                                <td>{{$usuario->numero_documento}}</td>
                                <td>{{$usuario->correo}}</td>
                                <td>{{$usuario->descripcion_cargo}}</td>
                                <td>{{$usuario->nombre_rol}}</td>
                                <td>{{$usuario->descripcion_estado}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary rounded btn-editar-usuario" title="Editar" data-id="{{$usuario->id_usuario}}">
                                        <i class="fa fa-solid fa-pencil"> Editar</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ====================================================== --}}
    {{-- ====================================================== --}}

    {{-- INICIO Modal Editar Usuario --}}
    <div class="modal fade" id="modalEditarUsuario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 p-3" id="modalEditarUsuarioContent">
                {{-- El contenido AJAX se cargará aquí --}}
            </div> {{-- FIN modal-content --}}
        </div> {{-- FIN modal-dialog --}}
    </div> {{-- FIN modal --}}
    {{-- FINAL Modal Editar Usuario --}}

    {{-- ====================================================== --}}
    {{-- ====================================================== --}}

    {{-- <div id="loaderGif" class="ocultar">
        <img src="{{asset('img/processing.gif')}}" alt="processing">
    </div> --}}
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function() {
            // INICIO DataTable LIST USER'S
            $("#tabla_ususuarios").DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_de_Usuarios',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_de_Usuarios'
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
                infoEmpty: "No hay registros disponibles",
                order: [[0, 'asc']]
            });
            // CIERRE DataTable LIST USER'S
        });

        //==========================================//

        $(document).on('click', '.btn-editar-usuario', function () {
            // Sí es necesaria: cada botón tiene su data-id; aquí leemos el del clic
            const idUsuario = $(this).data('id');
            const urlEditar = @json(url('usuarios')).replace(/\/?$/, '') + '/' + idUsuario + '/edit';

            $.ajax({
                url: urlEditar, // GET /usuarios/{id}/edit  →  UsuariosController@edit
                type: 'GET',
                data: {
                    tipo_modal: 'editar_usuario'
                },
                beforeSend: function () {
                    $('#modalEditarUsuarioContent').html('<div class="text-center p-5"><i class="fa fa-spinner fa-spin fa-2x"></i> Cargando...</div>');
                    const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarUsuario'));
                    modal.show();
                },
                success: function (html) {
                    // HTML del formulario (Blade) que devolvió UsuarioEdit
                    $('#modalEditarUsuarioContent').html(html);
                },
                error: function (xhr) {
                    if (xhr.status === 403 && xhr.responseText) {
                        $('#modalEditarUsuarioContent').html(xhr.responseText);
                        setTimeout(() => {
                            bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarUsuario')).hide();
                        }, 3000);
                    } else {
                        $('#modalEditarUsuarioContent').html('<div class="alert alert-danger">Error al cargar el formulario.</div>');
                    }
                }
            });
        });

        //==========================================//


    </script>
@endsection