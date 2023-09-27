@extends('layouts.app')
@section('title', 'Clientes')

{{-- ====================================================== --}}

@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    @php
        use Carbon\Carbon;
    @endphp
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
                                <th>Referido</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->id_cliente}}</td>
                                    <td>{{$cliente->cli_nombres}}</td>
                                    <td>{{$cliente->decripcion_documento}}</td>
                                    <td>{{$cliente->documento_cliente}}</td>
                                    <td>{{$cliente->cli_celular}}</td>
                                    <td>{{$cliente->cli_email}}</td>
                                    <td>{{$cliente->tipo_persona}}</td>
                                    <td>{{$cliente->referido_por}}</td>
                                    
                                    @if ($cliente->id_referido_por == 1) {{-- EMPRESA --}}
                                        <td>{{$cliente->empresa_que_refiere}}</td>
                                    @elseif($cliente->id_referido_por == 2) {{-- REDES SOCIALES --}}
                                        <td>{{$cliente->red_social}}</td>
                                    @elseif($cliente->id_referido_por == 3) {{-- REFERIDOS --}}
                                        <td>{{$cliente->nombre_quien_refiere}}</td>
                                    @elseif($cliente->id_referido_por == 4) {{-- WEB AVALUAMOS  --}}
                                        <td>
                                            <a href="https://www.avaluamos.com.co" class="text-primary" target="_blank">Avaluamos</a>
                                        </td>
                                    @else {{-- Vacío --}}
                                        <td></td>
                                    @endif

                                    @php
                                        $fechaNacTimeStamp = $cliente->fecha_nacimiento;
                                        $fechaNacimiento = isset($fechaNacTimeStamp) ? Carbon::parse($cliente->fecha_nacimiento)->toDateString() : null;
                                    @endphp
                                    
                                    <td>
                                        <button class="btn btn-warning" onclick="editarCliente('{{$cliente->id_cliente}}','{{$cliente->cli_nombres}}','{{$cliente->id_doc_cliente}}','{{$cliente->decripcion_documento}}','{{$cliente->documento_cliente}}','{{$fechaNacimiento}}','{{$cliente->cli_celular}}','{{$cliente->cli_email}}',{{$cliente->id_tipo_persona}},'{{$cliente->tipo_persona}}','{{$cliente->id_pais}}','{{$cliente->descripcion_pais}}','{{$cliente->id_departamento_estado}}','{{$cliente->descripcion_departamento}}','{{$cliente->id_ciudad}}','{{$cliente->descripcion_ciudad}}','{{$cliente->id_referido_por}}','{{$cliente->referido_por}}','{{$cliente->id_red_social}}','{{$cliente->red_social}}','{{$cliente->nombre_quien_refiere}}','{{$cliente->empresa_que_refiere}}')">Editar Cliente</button>

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
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
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

            // ===========================================================
            // ===========================================================

            // $('.select2').select2({
            //     placeholder: 'Seleccionar...',
            //     allowClear: true,
            //     disabled: false
            // });

            let select = $('.select2');

            let seleccionar = $("<option>", {
                value: "-1", // Valor de la opción
                text: "Seleccionar..." // Texto visible de la opción
            });

            seleccionar.attr("selected", true);
            select.prepend(seleccionar);
        });

        // ===========================================================
        // ===========================================================

        let tipo_documento = @json($tipo_documento);
        let tipo_persona = @json($tipo_persona);
        let paises = @json($paises);
        let departamentos = @json($departamentos);
        let ciudades = @json($ciudades);
        let referidosPor = @json($referido_por);
        let redesSociales = @json($red_social);

        function editarCliente(idCliente,nombres,idDocCliente,TipoDocumento,documentoCliente,fechaNacimiento,cliCelular,cliEmail,idTipoPersona,tipoPersona,idPais,pais,idDpto,departamento,idCiudad,ciudad,idReferidoPor,referidoPor,idRedSocial,redSocial,quienRefiere,empresaRefiere)
        {
            formEditarcliente = '';

            formEditarcliente += `
                {!! Form::open(['method' => 'POST', 'route' => ['editar_cliente'], 'id' => 'form_editar_cliente', 'class' => 'login100-form', 'autocomplete' => 'off']) !!}
                @csrf
            `;

            // ====================================

            formEditarcliente += `<input type="hidden" name="id_cliente" value="${idCliente}">`;

            // ====================================

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column">
                                            <label class="form-label text-uppercase fs-5">Nombres</label>
                                            <input type="text" class="form-control text-uppercase" name="nombres" value="${nombres}">
                                        </div>
                                        
                                        <div class="form-group col-12 col-md-6 d-flex flex-column">
                                                <label class="form-label text-uppercase fs-5">Tipo Documento</label>
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

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">Número Documento</label>
                                            <input type="text" class="form-control text-uppercase" name="documento_cliente" value="${documentoCliente}">
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-group d-flex flex-column align-items-center">
                                                <label class="form-label text-uppercase fs-5">Fecha Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="${fechaNacimiento}">
                                            </div>
                                        </div>
                                    </div>
            `;
        
            // ====================================

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">Celular</label>
                                            <input type="text" class="form-control" name="cli_celular" value="${cliCelular}">
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <div class="form-group d-flex flex-column align-items-center">
                                                <label class="form-label text-uppercase fs-5">Correo</label>
                                                <input type="text" class="form-control" name="cli_email" value="${cliEmail}">
                                            </div>
                                        </div>
                                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">Tipo Persona</label>
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
            `;

            formEditarcliente += `
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">País residencia</label>
                                            <select class="form-control select2" id="pais_edit" name="pais_edit">
            `;
                                                if (idPais == null || idPais == "") {
                                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                                } else {
                                                    formEditarcliente += `<option value="${idPais}" selected >${pais}</option>`;
                                                }
                            
                                                $.each(paises, function(id_pais, d_pais){
                                                    formEditarcliente += ' <option value="'+id_pais+'">'+d_pais+'</option>';
                                                });

            formEditarcliente += `
                                            </select>
                                        </div>
                                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">departamento residencia</label>
                                            <select class="form-control select2" id="dpto_edit" name="dpto_edit">
            `;
                                                if (idDpto == null || idDpto == "") {
                                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                                } else {
                                                    formEditarcliente += `<option value="${idDpto}" selected >${departamento}</option>`;
                                                }
                            
                                                $.each(departamentos, function(id_dpto, dpto){
                                                    formEditarcliente += ' <option value="'+id_dpto+'">'+dpto+'</option>';
                                                });
            formEditarcliente += `
                                            </select>
                                        </div>
            `;

            formEditarcliente += `
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">Ciudad Residencia</label>
                                            <select class="form-control select2" id="ciudad_edit" name="ciudad_edit">
            `;
                                                if (idCiudad == null || idCiudad == "") {
                                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                                } else {
                                                    formEditarcliente += `<option value="${idCiudad}" selected >${ciudad}</option>`;
                                                }
                            
                                                $.each(ciudades, function(id_ciudad, d_ciudad){
                                                    formEditarcliente += ' <option value="'+id_ciudad+'">'+d_ciudad+'</option>';
                                                });

            formEditarcliente += `
                                            </select>
                                        </div>
                                    </div>
            `;

            // ====================================

            formEditarcliente += `  <div class="form-group mt-3 row">
                                        <div class="form-group col-12 col-md-6 d-flex flex-column align-items-center">
                                            <label class="form-label text-uppercase fs-5">Referido por</label>
                                            <select class="form-control select2" id="referido_por_edit" name="referido_por_edit">
            `;
                                                if (idReferidoPor == null || idReferidoPor == "") {
                                                    formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                                } else {
                                                    formEditarcliente += `<option value="${idReferidoPor}" selected >${referidoPor}</option>`;
                                                }

                                                $.each(referidosPor, function(id_referido, d_referido){
                                                    formEditarcliente += ' <option value="'+id_referido+'">'+d_referido+'</option>';
                                                });
            formEditarcliente += `
                                            </select>
                                        </div>
            `;

            formEditarcliente += `
                                        <div class="form-group col-12 col-md-6 d-flex flex-column" id="div_edit_red_social">
                                            <label class="form-label text-uppercase fs-5">Red Social</label>
                                            <select class="form-control select2" id="red_social_edit" name="red_social_edit">
            `;
                                            if (idRedSocial == null || redSocial == "") {
                                                formEditarcliente += `<option value="" selected >Seleccionar...</option>`;
                                            } else {
                                                formEditarcliente += `<option value="${idRedSocial}" selected >${redSocial}</option>`;
                                            }

                                            $.each(redesSociales, function(id_red, d_red){
                                                formEditarcliente += ' <option value="'+id_red+'">'+d_red+'</option>';
                                            });

            formEditarcliente += `
                                            </select>
                                        </div>

                                        <div class="form-group col-12 col-md-6 d-flex flex-column" id="div_edit_quien_refiere">
                                            <label class="form-label text-uppercase fs-5">Nombre Quien refiere</label>
                                            <input type="text" class="form-control" name="quien_refiere_edit" id="quien_refiere_edit" value="${quienRefiere}">
                                        </div>

                                        <div class="form-group col-12 col-md-6 d-flex flex-column" id="div_edit_empresa_refiere">
                                            <label class="form-label text-uppercase fs-5">Empresa que refiere</label>
                                            <input type="text" class="form-control" name="empresa_refiere_edit" id="empresa_refiere_edit" value="${empresaRefiere}">
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
                width: 600,
                padding: '2em',
            });

            // ===========================================================

            $(document).ready(function()
            {
                if (idReferidoPor == 1 || idReferidoPor == "1") { // EMPRESA
                    $('#div_edit_empresa_refiere').removeClass('ocultar');
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#div_edit_quien_refiere').addClass('ocultar');
                } else if (idReferidoPor == 2 || idReferidoPor == "2") { // REDES SOCIALES
                    $('#div_edit_red_social').removeClass('ocultar');
                    $('#div_edit_empresa_refiere').addClass('ocultar');
                    $('#div_edit_quien_refiere').addClass('ocultar');
                } else if (idReferidoPor == 3 || idReferidoPor == "3") { // REFERIDOS
                    $('#div_edit_quien_refiere').removeClass('ocultar');
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#div_edit_empresa_refiere').addClass('ocultar');
                } else if (idReferidoPor == 4 || idReferidoPor == "4")  { // WEB AVALUAMOS
                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#div_edit_empresa_refiere').addClass('ocultar');
                } else {
                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#div_edit_empresa_refiere').addClass('ocultar');
                }
            });

            // ===========================================================

            $('#referido_por_edit').on('change', function () {
                let idReferidoPorVal = $('#referido_por_edit').val();

                if (idReferidoPorVal == 1) { // EMPRESA
                    $('#div_edit_empresa_refiere').removeClass('ocultar');
                    $('#empresa_refiere_edit').attr('required');
                    
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#red_social_edit').removeAttr('required');
                    $('#red_social_edit').val('');

                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#quien_refiere_edit').removeAttr('required');
                    $('#quien_refiere_edit').val('');
                } else if (idReferidoPorVal == 2) { // REDES SOCIALES
                    $('#div_edit_red_social').removeClass('ocultar');
                    $('#red_social_edit').attr('required');

                    $('#div_edit_empresa_refiere').addClass('ocultar');
                    $('#empresa_refiere_edit').removeAttr('required');
                    $('#empresa_refiere_edit').val('');

                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#quien_refiere_edit').removeAttr('required');
                    $('#quien_refiere_edit').val('');
                } else if (idReferidoPorVal == 3) { // REFERIDOS
                    $('#div_edit_quien_refiere').removeClass('ocultar');
                    $('#quien_refiere_edit').attr('required');
                    
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#red_social_edit').removeAttr('required');
                    $('#red_social_edit').val('');

                    $('#div_edit_empresa_refiere').addClass('ocultar');
                    $('#empresa_refiere_edit').removeAttr('required');
                    $('#empresa_refiere_edit').val('');
                } else if (idReferidoPorVal == 4)  { // WEB AVALUAMOS
                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#quien_refiere_edit').removeAttr('required');
                    $('#quien_refiere_edit').val('');
                    
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#red_social_edit').removeAttr('required');
                    $('#red_social_edit').val('');

                    $('#div_edit_empresa_refiere').addClass('ocultar');
                    $('#empresa_refiere_edit').removeAttr('required');
                    $('#empresa_refiere_edit').val('');
                } else {
                    $('#div_edit_quien_refiere').addClass('ocultar');
                    $('#quien_refiere_edit').removeAttr('required');
                    $('#quien_refiere_edit').val('');
                    
                    $('#div_edit_red_social').addClass('ocultar');
                    $('#red_social_edit').removeAttr('required');
                    $('#red_social_edit').val('');

                    $('#div_edit_empresa_refiere').addClass('ocultar');
                    $('#empresa_refiere_edit').removeAttr('required');
                    $('#empresa_refiere_edit').val('');

                    $('#referido_por_edit').attr('required');
                }
            });
        }
    </script>
@endsection