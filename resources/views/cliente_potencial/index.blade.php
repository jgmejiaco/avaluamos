@extends('layouts.app')
@section('title', 'Clientes Potenciales')
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase">Clientes</h2>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary float-right">Crear Nuevo Cliente</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row" style="margin-top: 5em !important;">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="tabla_visitas" aria-describedby="tbl editar visitas">
                        <thead>
                            <tr class="header-table">
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Tipo Persona</th>
                                <th>Recomendado Por</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                {{-- @php
                                    dd($cliente);
                                @endphp --}}
                                <tr>
                                    <td>{{$cliente->id_cliente}}</td>
                                    <td>{{$cliente->cli_nombres}}</td>
                                    <td>{{$cliente->decripcion_documento}}</td>
                                    <td>{{$cliente->documento_cliente}}</td>
                                    <td>{{$cliente->cli_celular}}</td>
                                    <td>{{$cliente->cli_email}}</td>
                                    <td>{{$cliente->tipo_persona}}</td>
                                    <td>{{$cliente->referido_por}}</td>
                                    <td>
                                        <button class="btn btn-warning" onclick="editarCliente('{{$cliente->id_cliente}}','{{$cliente->cli_nombres}}','{{$cliente->id_doc_cliente}}','{{$cliente->decripcion_documento}}','{{$cliente->documento_cliente}}','{{$cliente->cli_celular}}','{{$cliente->cli_email}}',{{$cliente->id_tipo_persona}},'{{$cliente->tipo_persona}}','{{$cliente->referido_por}}')">Editar Cliente</button>

                                        <a href="{{route('crear_visita',$cliente->id_cliente)}}" class="btn btn-success">Crear Visita</a>
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
            $("#tabla_visitas").DataTable({
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

        
        // ===========================================================
        // ===========================================================

        let select = $('.select2');

        let seleccionar = $("<option>", {
            value: "-1", // Valor de la opción
            text: "Seleccionar..." // Texto visible de la opción
        });

        seleccionar.attr("selected", true);
        select.prepend(seleccionar);

        // ===========================================================
        // ===========================================================

        let tipo_documento = @json($tipo_documento);
        let tipo_persona = @json($tipo_persona);

        function editarCliente(idCliente,nombres,idDocCliente,TipoDocumento,documentoCliente,cliCelular,cliEmail,idTipoPersona,tipoPersona,referidoPor) {
            formEditarcliente = '';

            formEditarcliente += `
                {!! Form::open(['method' => 'POST', 'route' => ['editar_cliente'], 'id' => 'form_editar_cliente', 'class' => 'login100-form', 'autocomplete' => 'off']) !!}
                @csrf
            `;

            // ====================================

            formEditarcliente += `<input type="hidden" name="id_cliente" value="${idCliente}">`;

            // ====================================

            formEditarcliente += `  <div class="form-group mt-5">
                                        <label class="form-label text-uppercase">Nombres</label>
                                        <input type="text" class="form-control" name="nombres" value="${nombres}">
                                    </div>
            `;

            // ====================================

            formEditarcliente += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id_tipo_documento" class="form-label text-uppercase">Tipo Documento</label>
                            <select class="form-control select2" id="id_doc_cliente" name="id_doc_cliente">
            `;
                                if (idDocCliente == null || idDocCliente == "") {
                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarcliente += `<option value="${idDocCliente}" selected >${TipoDocumento}</option>`;
                                }
            
                                $.each(tipo_documento, function(idDoc, tipDoc){
                                    formEditarcliente += ' <option value="'+idDoc+'">'+tipDoc+'</option>';
                                });

            formEditarcliente += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group">
                                        <label class="form-label text-uppercase">Número Documento</label>
                                        <input type="text" class="form-control" name="documento_cliente" value="${documentoCliente}">
                                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group">
                                        <label class="form-label text-uppercase">Celular</label>
                                        <input type="text" class="form-control" name="cli_celular" value="${cliCelular}">
                                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group">
                                        <label class="form-label text-uppercase">Correo</label>
                                        <input type="text" class="form-control" name="cli_email" value="${cliEmail}">
                                    </div>
            `;

            // ====================================

            formEditarcliente += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id_tipo_persona" class="form-label text-uppercase">Tipo Persona</label>
                            <select class="form-control select2" id="id_tipo_persona" name="id_tipo_persona">
            `;
                                if (idTipoPersona == null || idTipoPersona == "") {
                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarcliente += `<option value="${idTipoPersona}" selected >${tipoPersona}</option>`;
                                }
            
                                $.each(tipo_persona, function(idTipPersona, tipPersona){
                                    formEditarcliente += ' <option value="'+idTipPersona+'">'+tipPersona+'</option>';
                                });

            formEditarcliente += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            formEditarcliente += `
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary rounded-pill mt-3 mb-3" value="Editar Cliente" id="btn_editar_cliente">
                        </div>
                    </div>
            `;

            // ====================================

            formEditarcliente += `
                    {!! Form::close() !!}
            `;

            // ===========================================================

            Swal.fire({
                title: '<strong>EDICIÓN BÁSICA</strong>',
                icon: 'info',
                type: 'info',
                html: formEditarcliente,
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
                cancelButtonAriaLabel: 'Thumbs down',
                allowOutsideClick: false,
                allowEscapeKey: false,
            });
        }
    </script>
@endsection