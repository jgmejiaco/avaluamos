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
                                        @php
                                            $idEmpresa = $empresa->id_dirigido_a;
                                            $dirigidoA = $empresa->dirigido_a;
                                            $tipoDocumento = $empresa->id_tipo_documento;
                                            $documento = $empresa->decripcion_documento;
                                            $numeroDocumento = $empresa->numero_documento;
                                        @endphp
                                        <button class="btn btn-info" id="" onclick="editarEmpresa('{{$idEmpresa}}','{{$dirigidoA}}','{{$tipoDocumento}}','{{$documento}}','{{$numeroDocumento}}')">
                                            <i class="fa fa-key" aria-hidden="true"></i> Editar
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

        // =========================================================================
        // =========================================================================

        function editarEmpresa(idEmpresa,empresa,idDocumento,tipoDocumento,documento) {
            let form_editar_empresa = ''

            form_editar_empresa += `
                {!! Form::open(['method' => 'POST', 'route' => ['editar_empresa'], 'class'  => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_empresa_editar']) !!}
                    @csrf
            `;

            // ====================================

            form_editar_empresa += ` <input type="hidden" name="id_empresa_editar" id="id_empresa_editar" value="${idEmpresa}" required >`;

            // ====================================

            form_editar_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id_tipo_documento_editar" class="form-label text-uppercase">Tipo Documento
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="id_tipo_documento_editar" name="id_tipo_documento_editar" required>
                                <option value="${idDocumento}" selected >${tipoDocumento}</option>
            `;
                                $.each(tipo_documento, function(id_documento, documento){
                                    form_editar_empresa += ' <option value="'+id_documento+'">'+documento+'</option>'
                                });

            form_editar_empresa += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            form_editar_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="numero_documento_editar" class="form-label text-uppercase">Numero Documento
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="numero_documento_editar" id="numero_documento_editar" class="form-control text-uppercase" value="${documento}" required>
                        </div>
                    </div>
            `;

            // ====================================

            form_editar_empresa += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nombre_empresa_editar" class="form-label text-uppercase">Nombre Empresa
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="nombre_empresa_editar" id="nombre_empresa_editar" class="form-control text-uppercase" value="${empresa}" required>
                        </div>
                    </div>
            `;

            // ====================================

            form_editar_empresa += `
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary rounded-pill mt-5" value="Editar Empresa" id="btn_editar_empresa">
                        </div>
                    </div>
            `;

            // ====================================

            form_editar_empresa += `
                    {!! Form::close() !!}
            `;

            // ================================================

            Swal.fire ({
                title: '<strong>Editar Empresa</strong>',
                icon: 'info',
                type: 'info',
                html: form_editar_empresa,
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                focusConfirm: false,
                cancelButtonText:'<i class="fa fa-thumbs-down"> Cancelar</i>',
                cancelButtonAriaLabel: 'Thumbs down'
            });
        }
    </script>
@endsection
