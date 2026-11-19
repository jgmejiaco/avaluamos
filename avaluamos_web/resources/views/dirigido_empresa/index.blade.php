@extends('layouts.app')
@section('title', 'Empresas')
@section('css')
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase">creación de Empresas</h2>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary float-right" id="crear_empresa">Crear Nueva Empresa</button>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row" style="margin-top: 5em !important;">
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
                                        <button type="button" class="btn btn-primary btn-editar-dirigido-empresa" title="Editar" data-id-dirigido-a="{{ $empresa->id_dirigido_a }}">
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

    {{-- INICIO Modal Editar Dirigido Empresa --}}
    <div class="modal fade" id="modalEditarDirigidoEmpresa" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                dom: 'Blfrtip',
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

        let tipo_documento = @json($tipo_documento);

        $('#crear_empresa').click(function () {

            let form_crear_empresa = ''

            form_crear_empresa += `
                {!! Form::open(['method' => 'POST', 'route' => ['dirigido_empresa.store'], 'class'  => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_dirigido_empresa']) !!}
                    @csrf
            `;

            // ====================================

            form_crear_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id_tipo_documento" class="form-label text-uppercase">Tipo Documento
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="id_tipo_documento" name="id_tipo_documento" required>
                                <option value="" selected >Seleccionar...</option>
            `;
                                $.each(tipo_documento, function(index, element){
                                    form_crear_empresa += ' <option value="'+index+'">'+element+'</option>'
                                });

            form_crear_empresa += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            form_crear_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="numero_documento" class="form-label text-uppercase">Numero Documento
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="numero_documento" id="numero_documento" class="form-control text-uppercase" required>
                        </div>
                    </div>
            `;

            // ====================================

            form_crear_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nombre_empresa" class="form-label text-uppercase">Nombre Empresa
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-control text-uppercase" required>
                        </div>
                    </div>
            `;

            // ====================================

            form_crear_empresa += `
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary rounded-pill mt-5" value="Crear Empresa" id="btn_crear_empresa">
                        </div>
                    </div>
            `;

            // ====================================

            form_crear_empresa += `
                    {!! Form::close() !!}
            `;

            // ================================================

            Swal.fire ({
                title: '<strong>Crear Empresa</strong>',
                icon: 'info',
                type: 'info',
                html: form_crear_empresa,
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                focusConfirm: false,
                cancelButtonText:'<i class="fa fa-thumbs-down"> Cancelar</i>',
                cancelButtonAriaLabel: 'Thumbs down'
            });

            // ================================================

            $('#numero_documento').blur(function () {
                var csrfToken = document.querySelector('input[name="_token"]').value;
                let idTipoDocumento = $('#id_tipo_documento').val();
                let numeroDocumento = $('#numero_documento').val();

                console.log(idTipoDocumento);
                console.log(numeroDocumento);

                $.ajax({
                    url: "{{route('validar_empresa')}}",
                    type: "POST",
                    datatype: "JSON",
                    data:{
                        _token: csrfToken,
                        'id_tipo_documento': idTipoDocumento,
                        'numero_documento': numeroDocumento
                    },
                    success: function (respuesta) {
                        console.log(respuesta);

                        if (respuesta == "existe_empresa") {
                            Swal.fire({
                                icon: 'warning',
                                type: 'warning',
                                title: 'Esta empresa ya existe!',
                                text: 'Verifique por favor',
                                footer: '<a href="">Why do I have this issue?</a>'
                            })
                        }

                        if (respuesta == "error_exception") {
                            Swal.fire({
                                icon: 'error',
                                type: 'error',
                                title: 'Error Exception!',
                                text: 'Verifique por favor con soporte técnico',
                                footer: '<a href="">Why do I have this issue?</a>'
                            })
                        }
                    }
                });
            })
        })

    </script>
@endsection
