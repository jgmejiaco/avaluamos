@extends('layouts.app')
@section('title', 'Cliente')
{{-- ====================================================== --}}
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                @php
                    // dd($cliente);
                    $idCliente = $cliente->id_cliente;
                    $nombres = $cliente->cli_nombres;
                    $idDocCliente = $cliente->id_doc_cliente;
                    $TipoDocumento = $cliente->decripcion_documento;
                    $documentoCliente = $cliente->documento_cliente;
                    $cliCelular = $cliente->cli_celular;
                    $cliEmail = $cliente->cli_email;
                    $idTipoPersona = $cliente->id_tipo_persona;
                    $tipoPersona = $cliente->tipo_persona;
                @endphp
                <h3 class="text-center text-uppercase">Historial Cliente: {{$nombres}}</h3>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row mb-5 mt-5">
            <div class="col-12 d-flex justify-content-around">
                <button class="btn btn-warning" onclick="editarCliente('{{$idCliente}}','{{$nombres}}','{{$idDocCliente}}','{{$TipoDocumento}}','{{$documentoCliente}}','{{$cliCelular}}','{{$cliEmail}}',{{$idTipoPersona}},'{{$tipoPersona}}')">Editar Cliente</button>
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary">Crear Visista</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row" style="margin-top: 5em !important;">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tabla_visitas_cliente" aria-describedby="tbl visitas cliente">
                        <thead>
                            <tr class="header-table">
                                <th>ID</th>
                                <th>Nombre Solicitante</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Tipo de Pesona</th>
                                <th>Dirigido A:</th>
                                <th>Tipo Documento</th>
                                <th>Número Documento</th>
                                <th>Objeto Avalúo</th>
                                <th>Municipio</th>
                                <th>Tipo Inmueble</th>
                                <th>Valor Cotización</th>
                                <th>Recomendado Por</th>
                                <th>Visitado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                dd($cliente);
                            @endphp --}}
                            <tr>
                                {{-- <td>{{$cliente->id_cliente}}</td> --}}
                                <td>id</td>
                                {{-- <td>{{$cliente->cli_nombres}}</td> --}}
                                <td>nombre</td>
                                {{-- <td>{{$cliente->cli_celular}}</td> --}}
                                <td>celular</td>
                                {{-- <td>{{$cliente->cli_email}}</td> --}}
                                <td>correo</td>
                                {{-- <td>{{$cliente->tipo_persona}}</td> --}}
                                <td>tipo persona</td>
                                {{-- <td>{{$cliente->dirigido_a}}</td> --}}
                                <td>dirigo a</td>
                                {{-- <td>{{$cliente->decripcion_documento}}</td> --}}
                                <td>tipo documento</td>
                                {{-- <td>{{$cliente->documento_empresa}}</td> --}}
                                <td>documento empresa</td>
                                {{-- <td>{{$cliente->objeto_avaluo}}</td> --}}
                                <td>objeto avaluo</td>
                                {{-- <td>{{$cliente->descripcion_ciudad}}</td> --}}
                                <td>ciudad</td>
                                {{-- <td>{{$cliente->tipo_inmueble}}</td> --}}
                                <td>tipo inmueble</td>
                                {{-- <td>{{$cliente->valor_cotizacion}}</td> --}}
                                <td>valor cotizado</td>
                                {{-- <td>{{$cliente->referido_por}}</td> --}}
                                <td>referido por</td>
                                {{-- <td>{{$cliente->descripcion_si_no}}</td> --}}
                                <td>visitado</td>
                                <td>
                                    <a href="visita/edit" class="btn btn-info" id="">
                                        <i class="fa fa-key" aria-hidden="true"></i> Editar Visita
                                    </a>
                                </td>
                            </tr>
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
            $("#tabla_visitas_cliente").DataTable({
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

        let select = $('.select2');

        let seleccionar = $("<option>", {
            value: "-1", // Valor de la opción
            text: "Seleccionar..." // Texto visible de la opción
        });

        seleccionar.attr("selected", true);
        select.prepend(seleccionar);

        // ===========================================================

        let tipo_documento = @json($tipo_documento);
        let tipo_persona = @json($tipo_persona);

        function editarCliente(idCliente,nombres,idDocCliente,TipoDocumento,documentoCliente,cliCelular,cliEmail,idTipoPersona,tipoPersona) {
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
                            <label for="id_tipo_documento" class="form-label text-uppercase">Tipo Documento
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" id="id_doc_cliente" name="id_doc_cliente" required>
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
                            <label for="id_tipo_persona" class="form-label text-uppercase">Tipo Persona
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" id="id_tipo_persona" name="id_tipo_persona" required>
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
                            <input type="submit" class="btn btn-primary rounded-pill mt-5" value="Editar Cliente" id="btn_editar_cliente">
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
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
                cancelButtonAriaLabel: 'Thumbs down',
                allowOutsideClick: false,
                allowEscapeKey: false,
            });
        }
    </script>
@endsection