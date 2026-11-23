@extends('layouts.app')
@section('title', 'Roles')
@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center text-uppercase">Roles</h1>
        </div>
    </div>

    <div class="row p-b-20 float-right mb-3">
        <div class="col-12">
            <button type="button" class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modalCrearRol">
                Crear Rol
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100" id="tabla_roles">
                    <thead>
                        <tr class="header-table">
                            <th>Id</th>
                            <th>Rol</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->id }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>
                                    @if ($rol->name === 'Administrador')
                                        <span class="text-muted">Sin edición</span>
                                    @else
                                        <button type="button" class="btn btn-primary rounded btn-editar-rol" data-id="{{ $rol->id }}">
                                            <i class="fa fa-pencil"></i> Editar
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Crear Rol --}}
    <div class="modal fade" id="modalCrearRol" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">Crear Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                {!! Form::open(['route' => 'roles.store', 'method' => 'POST', 'id' => 'formCrearRol', 'autocomplete' => 'off']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre del rol <span class="text-danger">*</span></label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="btn_crear_rol">Crear</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- Modal Editar Rol --}}
    <div class="modal fade" id="modalEditarRol" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" id="modalEditarRolContent"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tabla_roles').DataTable({
                order: [[1, 'asc']]
            });

            $(document).on('click', '.btn-editar-rol', function () {
                const idRol = $(this).data('id');

                $.ajax({
                    url: `/roles/${idRol}/edit`,
                    type: 'GET',
                    beforeSend: function () {
                        $('#modalEditarRolContent').html('<div class="text-center p-5"><i class="fa fa-spinner fa-spin fa-2x"></i> Cargando...</div>');
                        bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarRol')).show();
                    },
                    success: function (html) {
                        $('#modalEditarRolContent').html(html);
                    },
                    error: function (xhr) {
                        if (xhr.status === 403 && xhr.responseText) {
                            $('#modalEditarRolContent').html(xhr.responseText);
                        } else {
                            $('#modalEditarRolContent').html('<div class="alert alert-danger m-3">Error al cargar el formulario.</div>');
                        }
                    }
                });
            });
        });
    </script>
@endsection
