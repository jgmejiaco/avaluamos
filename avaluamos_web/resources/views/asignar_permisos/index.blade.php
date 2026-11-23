@extends('layouts.app')
@section('title', 'Asignar Permisos')
@section('css')
    <style>
        .modulo-card {
            border: 1px solid #dee2e6;
            border-radius: .5rem;
            margin-bottom: 1rem;
            overflow: hidden;
        }
        .modulo-card-header {
            background: #f8f9fa;
            padding: .75rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        .modulo-card-body {
            padding: 1rem;
            display: none;
        }
        .modulo-card.open .modulo-card-body {
            display: block;
        }
        .permiso-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: .5rem 1rem;
        }
        .permiso-item {
            display: flex;
            gap: .5rem;
            align-items: flex-start;
        }
        .permiso-item label {
            margin: 0;
            cursor: pointer;
            font-size: .92rem;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase mt-3">Asignar Permisos</h1>
            </div>
        </div>

        {!! Form::open(['route' => 'asignar_permisos.store', 'method' => 'POST', 'id' => 'formAsignarPermisos', 'autocomplete' => 'off']) !!}
            <div class="row mb-4 align-items-end">
                <div class="col-12 col-md-4">
                    <label for="id_rol" class="form-label">Rol <span class="text-danger">*</span></label>
                    {!! Form::select('id_rol', collect(['' => 'Seleccionar...'])->union($roles), null, ['class' => 'form-select', 'id' => 'id_rol', 'required']) !!}
                </div>
                <div class="col-12 col-md-4" id="loadingPermissions" style="display:none;">
                    <i class="fa fa-spinner fa-spin"></i> Cargando permisos del rol...
                </div>
            </div>

            <div class="alert alert-info" id="alertaAdmin" style="display:none;">
                El rol <strong>Administrador</strong> tiene acceso total. No se editan sus permisos.
            </div>

            <div class="mb-3 d-flex gap-3 flex-wrap">
                <label class="mb-0">
                    <input type="checkbox" id="seleccionar_todos">
                    <strong>Seleccionar todos</strong>
                </label>
            </div>

            @foreach ($permisosPorModulo as $modulo => $permisos)
                <div class="modulo-card" data-modulo="{{ $modulo }}">
                    <div class="modulo-card-header">
                        <div>
                            <input type="checkbox" class="marcar-modulo me-2" data-modulo="{{ $modulo }}">
                            <strong>{{ $etiquetasModulo[$modulo] ?? ucfirst($modulo) }}</strong>
                            <small class="text-muted">({{ $permisos->count() }})</small>
                        </div>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="modulo-card-body">
                        <div class="permiso-grid">
                            @foreach ($permisos as $permiso)
                                <div class="permiso-item">
                                    <input
                                        type="checkbox"
                                        class="permiso-checkbox"
                                        name="permisos[]"
                                        value="{{ $permiso->id }}"
                                        id="permiso_{{ $permiso->id }}"
                                        data-modulo="{{ $modulo }}"
                                    >
                                    <label for="permiso_{{ $permiso->id }}">
                                        {{ $permiso->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-success rounded" id="btnAsignarPermisos">
                    <i class="fa fa-save"></i> Guardar asignación
                </button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function setChecksDisabled(disabled) {
                $('.permiso-checkbox, .marcar-modulo, #seleccionar_todos, #btnAsignarPermisos').prop('disabled', disabled);
            }

            function clearChecks() {
                $('.permiso-checkbox, .marcar-modulo, #seleccionar_todos').prop('checked', false);
            }

            function applyPermissionIds(ids, esAdmin) {
                clearChecks();
                ids.forEach(function (id) {
                    $('#permiso_' + id).prop('checked', true);
                });

                $('.marcar-modulo').each(function () {
                    const modulo = $(this).data('modulo');
                    const checks = $('.permiso-checkbox[data-modulo="' + modulo + '"]');
                    const checked = checks.filter(':checked').length;
                    $(this).prop('checked', checks.length > 0 && checked === checks.length);
                });

                const all = $('.permiso-checkbox');
                $('#seleccionar_todos').prop('checked', all.length > 0 && all.filter(':checked').length === all.length);

                setChecksDisabled(esAdmin);
                $('#alertaAdmin').toggle(esAdmin);
            }

            $('.modulo-card-header').on('click', function (e) {
                if ($(e.target).is('input') || $(e.target).closest('input').length) {
                    return;
                }
                $(this).closest('.modulo-card').toggleClass('open');
            });

            $('#seleccionar_todos').on('change', function () {
                const checked = $(this).is(':checked');
                $('.permiso-checkbox:not(:disabled), .marcar-modulo:not(:disabled)').prop('checked', checked);
            });

            $('.marcar-modulo').on('change', function () {
                const modulo = $(this).data('modulo');
                const checked = $(this).is(':checked');
                $('.permiso-checkbox[data-modulo="' + modulo + '"]:not(:disabled)').prop('checked', checked);
            });

            $('#id_rol').on('change', function () {
                const idRol = $(this).val();
                if (!idRol) {
                    clearChecks();
                    setChecksDisabled(false);
                    $('#alertaAdmin').hide();
                    return;
                }

                $('#loadingPermissions').show();
                setChecksDisabled(true);

                $.ajax({
                    url: "{{ route('consultar_permisos_rol') }}",
                    type: 'GET',
                    dataType: 'JSON',
                    data: { id_rol: idRol },
                    success: function (resp) {
                        if (!resp.success) {
                            Swal.fire('Error', resp.message || 'No se pudieron cargar los permisos', 'error');
                            return;
                        }
                        applyPermissionIds(resp.permission_ids || [], !!resp.es_administrador);
                        $('.modulo-card').addClass('open');
                    },
                    error: function () {
                        Swal.fire('Error', 'No se pudieron cargar los permisos del rol', 'error');
                        setChecksDisabled(false);
                    },
                    complete: function () {
                        $('#loadingPermissions').hide();
                    }
                });
            });

            $('#formAsignarPermisos').on('submit', function () {
                if ($('#alertaAdmin').is(':visible')) {
                    return false;
                }
                $('#btnAsignarPermisos').prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Guardando...');
            });
        });
    </script>
@endsection
