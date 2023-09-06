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
                    $idCliente = $cliente->id_cliente;
                    $nombres = $cliente->cli_nombres;
                    $TipoDocumento = $cliente->id_doc_cliente;
                    $documentoCliente = $cliente->documento_cliente;
                    $cliCelular = $cliente->cli_celular;
                    $cliEmail = $cliente->cli_email;
                    $tipoPersona = $cliente->tipo_persona;
                @endphp
                <h3 class="text-center text-uppercase">Historial Cliente: {{$nombres}}</h3>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row mb-5 mt-5">
            <div class="col-12 d-flex justify-content-around">
                <button class="btn btn-warning" onclick="editarCliente('{{$idCliente}}','{{$nombres}}','{{$TipoDocumento}}','{{$documentoCliente}}','{{$cliCelular}}','{{$cliEmail}}','{{$tipoPersona}}')">Editar Cliente</button>
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
                                <td>{{$cliente->id_cliente}}</td>
                                {{-- <td>id</td> --}}
                                <td>{{$cliente->cli_nombres}}</td>
                                {{-- <td>nombre</td> --}}
                                <td>{{$cliente->cli_celular}}</td>
                                {{-- <td>celular</td> --}}
                                <td>{{$cliente->cli_email}}</td>
                                {{-- <td>correo</td> --}}
                                <td>{{$cliente->tipo_persona}}</td>
                                {{-- <td>tipo persona</td> --}}
                                <td>{{$cliente->dirigido_a}}</td>
                                {{-- <td>dirigo a</td> --}}
                                <td>{{$cliente->decripcion_documento}}</td>
                                {{-- <td>tipo documento</td> --}}
                                <td>{{$cliente->documento_empresa}}</td>
                                {{-- <td>documento empresa</td> --}}
                                <td>{{$cliente->objeto_avaluo}}</td>
                                {{-- <td>objeto avaluo</td> --}}
                                <td>{{$cliente->descripcion_ciudad}}</td>
                                {{-- <td>ciudad</td> --}}
                                <td>{{$cliente->tipo_inmueble}}</td>
                                {{-- <td>tipo inmueble</td> --}}
                                <td>{{$cliente->valor_cotizacion}}</td>
                                {{-- <td>valor cotizado</td> --}}
                                <td>{{$cliente->referido_por}}</td>
                                {{-- <td>referido por</td> --}}
                                <td>{{$cliente->descripcion_si_no}}</td>
                                {{-- <td>visitado</td> --}}
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

        let tipo_documento = @json($tipo_documento);

        function editarCliente(idCliente,nombres,TipoDocumento,documentoCliente,cliCelular,cliEmail,tipoPersona) {
            console.log(idCliente);
            console.log(nombres);
            // console.log(idDocCliente);
            console.log(TipoDocumento);
            console.log(documentoCliente);
            console.log(cliCelular);
            console.log(cliEmail);
            console.log(tipoPersona);

            formEditarcliente = '';

            formEditarcliente += `<input type="text" value="${idCliente}">`;

            formEditarcliente += `  <div>
                                        <label>Nombres</label>
                                        <input type="text" value="${nombres}">
                                    </div>
            `;

            formEditarcliente += `  <div>
                                        <label>Tipo Documento</label>
                                        <input type="select" value="${TipoDocumento}">
                                    </div>
            `;

            formEditarcliente += `
                    <div class="col-12">
                        <div class="form-group">
                            <label for="id_tipo_documento" class="form-label text-uppercase">Tipo Documento
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="id_tipo_documento" name="id_tipo_documento" required>
                                <option value="" selected >Seleccionar...</option>
                                <option value="${idDocumento}" selected >${TipoDocumento}</option>
            `;
                                $.each(tipo_documento, function(idDoc, tipDoc){
                                    formEditarcliente += ' <option value="'+idDoc+'">'+tipDoc+'</option>'
                                });

            formEditarcliente += `
                            </select>
                        </div>
                    </div>
            `;

            formEditarcliente += `  <div>
                                        <label>Número Documento</label>
                                        <input type="text" value="${documentoCliente}">
                                    </div>
            `;

            formEditarcliente += `  <div>
                                        <label>Celular</label>
                                        <input type="text" value="${cliCelular}">
                                    </div>
            `;

            formEditarcliente += `  <div>
                                        <label>Correo</label>
                                        <input type="text" value="${cliEmail}">
                                    </div>
            `;

            formEditarcliente += `  <div>
                                        <label>Tipo Persona</label>
                                        <input type="text" value="${tipoPersona}">
                                    </div>
            `;

            



            Swal.fire({
                title: '<strong>Edición Báscia</strong>',
                icon: 'info',
                type: 'info',
                html: formEditarcliente,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Editar!',
                confirmButtonAriaLabel: 'Thumbs up, great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
                cancelButtonAriaLabel: 'Thumbs down'
            })
        }
    </script>
@endsection