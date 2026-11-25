@extends('layouts.app')
@section('title', 'Empresas')
@section('css')
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Empresas</h1>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-primary rounded" id="crear_empresa"
                    data-bs-toggle="modal" data-bs-target="#modalCrearDirigidoEmpresa">
                    Crear Nueva Empresa
                </button>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="tbl_empresas" aria-describedby="tbl dirigido empresas">
                        <thead>
                            <tr class="header-table">
                                <th>ID</th>
                                <th>Nombre Empresa</th>
                                <th>Tipo Documento</th>
                                <th>Número Documento</th>
                                <th>Creada Por</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td>{{isset($empresa) ? $empresa->id_dirigido_a : null}}</td>
                                    <td>{{isset($empresa) ? $empresa->dirigido_a : null}}</td>
                                    <td>{{isset($empresa) ? $empresa->decripcion_documento : null}}</td>
                                    <td>{{isset($empresa) ? $empresa->numero_documento : null}}</td>
                                    <td>{{isset($empresa) ? $empresa->nombre_usuario : null}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary rounded btn-editar-dirigido-empresa" title="Editar" data-id-dirigido-a="{{ $empresa->id_dirigido_a }}">
                                            <i class="fa fa-pencil" aria-hidden="true"> Editar</i>
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
    
    {{-- ====================================================== --}}
    {{-- ====================================================== --}}

    {{-- INICIO Modal Crear Dirigido Empresa --}}
    <div class="modal fade" id="modalCrearDirigidoEmpresa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-3">
                @include('dirigido_empresa.modal_crear_empresa')
            </div>
        </div>
    </div>
    {{-- FINAL Modal Crear Dirigido Empresa --}}

    {{-- ====================================================== --}}

    {{-- INICIO Modal Editar Dirigido Empresa --}}
    <div class="modal fade" id="modalEditarDirigidoEmpresa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-3" id="modalEditarDirigidoEmpresaContent">
                {{-- El contenido AJAX se cargará aquí --}}
            </div> {{-- FIN modal-content --}}
        </div> {{-- FIN modal-dialog --}}
    </div> {{-- FIN modal --}}
    {{-- FINAL Modal Editar Dirigido Empresa --}}

    {{-- ====================================================== --}}
    {{-- ====================================================== --}}

@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#tbl_empresas").DataTable({
                dom: window.dataTableDomConBotones,
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_de_Empresas',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_de_Empresas'
                    }
                ],
                scrollX: true
            });
        });

        // =========================================================================
        // =========================================================================

        $(document).on('click', '.btn-editar-dirigido-empresa', function () {
            // id 0 es válido; solo rechazar null/undefined/''
            const idDirigidoA = $(this).attr('data-id-dirigido-a');

            if (idDirigidoA === undefined || idDirigidoA === null || idDirigidoA === '') {
                $('#modalEditarDirigidoEmpresaContent').html('<div class="alert alert-warning m-3">No se pudo identificar la empresa.</div>');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarDirigidoEmpresa')).show();
                return;
            }

            const urlEditar = @json(url('dirigido_empresa')).replace(/\/?$/, '') + '/' + idDirigidoA + '/edit';

            $.ajax({
                url: urlEditar,
                type: 'GET',
                data: {
                    tipo_modal: 'editar_dirigido_empresa'
                },
                beforeSend: function () {
                    $('#modalEditarDirigidoEmpresaContent').html('<div class="text-center p-5"><i class="fa fa-spinner fa-spin fa-2x"></i> Cargando...</div>');
                    bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarDirigidoEmpresa')).show();
                },
                success: function (html) {
                    $('#modalEditarDirigidoEmpresaContent').html(html);
                    aplicarReglasDocumentoEditarEmpresa();
                },
                error: function (xhr) {
                    if (xhr.status === 403 && xhr.responseText) {
                        $('#modalEditarDirigidoEmpresaContent').html(xhr.responseText);
                        setTimeout(() => {
                            bootstrap.Modal.getOrCreateInstance(document.getElementById('modalEditarDirigidoEmpresa')).hide();
                        }, 3000);
                    } else {
                        $('#modalEditarDirigidoEmpresaContent').html(xhr.responseText || '<div class="alert alert-danger">Error al cargar el formulario.</div>');
                    }
                }
            });
        });

        // =========================================================================
        // =========================================================================

        function formatoNombrePropio(texto) {
            if (texto == null || String(texto).trim() === '') {
                return texto;
            }

            return String(texto)
                .trim()
                .toLocaleLowerCase('es-ES')
                .replace(/(^|[\s\-_/])(\S)/g, function (_, sep, char) {
                    return sep + char.toLocaleUpperCase('es-ES');
                });
        }

        $(document).on('blur', '#nombre_empresa, #nombre_empresa_editar', function () {
            $(this).val(formatoNombrePropio($(this).val()));
        });

        // =========================================================================
        // id=0 "A Quien Interese": tipo/número de documento no obligatorios
        // =========================================================================

        function esEmpresaEspecialSinDocumento(idEmpresa) {
            return String(idEmpresa) === '0';
        }

        function aplicarReglasDocumentoEditarEmpresa() {
            const idEmpresa = $('#id_empresa_editar').val();
            const especial = esEmpresaEspecialSinDocumento(idEmpresa);

            $('#id_tipo_documento_editar, #numero_documento_editar').prop('required', !especial);
            $('.req-doc-editar').toggle(!especial);
        }

        $(document).on('submit', '[id^="formEditarEmpresa_"]', function (e) {
            aplicarReglasDocumentoEditarEmpresa();

            const idEmpresa = $('#id_empresa_editar').val();
            const nombreEmpresa = $.trim($('#nombre_empresa_editar').val() || '');

            if (!nombreEmpresa) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Nombre requerido',
                    text: 'El nombre de la empresa es obligatorio.'
                });
                return;
            }

            if (!esEmpresaEspecialSinDocumento(idEmpresa)) {
                const tipoDocumento = $('#id_tipo_documento_editar').val();
                const numeroDocumento = $.trim($('#numero_documento_editar').val() || '');

                if (!tipoDocumento || !numeroDocumento) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Datos incompletos',
                        text: 'Tipo y número de documento son obligatorios.'
                    });
                }
            }
            // Spinner global: public/js/form-procesando.js
        });

        // =========================================================================

        $(document).on('blur', '#numero_documento', function () {
            const csrfToken = document.querySelector('#form_dirigido_empresa input[name="_token"]')?.value
                || document.querySelector('input[name="_token"]')?.value;
            const idTipoDocumento = $('#id_tipo_documento').val();
            const numeroDocumento = $('#numero_documento').val();

            if (!idTipoDocumento || !numeroDocumento) {
                return;
            }

            if (window.ValidacionDocumento) {
                const formato = window.ValidacionDocumento.validarNumero(idTipoDocumento, numeroDocumento);
                if (!formato.ok) {
                    return;
                }
            }

            $.ajax({
                url: "{{ route('validar_empresa') }}",
                type: 'POST',
                datatype: 'JSON',
                data: {
                    _token: csrfToken,
                    id_tipo_documento: idTipoDocumento,
                    numero_documento: numeroDocumento
                },
                success: function (respuesta) {
                    if (respuesta == 'existe_empresa') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Esta empresa ya existe!',
                            text: 'Verifique por favor'
                        });
                    }

                    if (respuesta == 'error_exception') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Exception!',
                            text: 'Verifique por favor con soporte técnico'
                        });
                    }
                }
            });
        });

        // =========================================================================

    </script>
@endsection
