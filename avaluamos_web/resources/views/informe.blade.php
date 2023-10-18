@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/typeahead.js-master/dist/typehead-min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables/buttons/css/buttons.dataTables.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/chosen.min.css')}}"> --}}
    {{-- <style>
        .select2-container{
            z-index: 99999 !important;
        }
    </style> --}}
@endsection
@section('title', $informe ? $informe->inf_descripcion : 'Informe')
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        @if($informe->inf_codigo==129)
            <h3 class="text-themecolor m-b-0 m-t-0">Informe Facturación: <strong id="emp_select_name"></strong></h3>
            </div>
            <div class="col-md-3"></div>
                <div class="col-md-4 col-sm-4 align-self-center">
                <div class="d-flex justify-content-end">
                <button type="button" onclick="selectEmpresa()" class="btn btn-rounded btn-primary">Cambiar De Empresa</button>
            </div>
        @elseif($informe->inf_codigo==134)
            <h3 class="text-themecolor m-b-0 m-t-0">Informe Logística Envíos: <strong id="emp_select_name"></strong></h3>
        </div>
            <div class="col-md-3"></div>
                <div class="col-md-4 col-sm-4 align-self-center">
                <div class="d-flex justify-content-end">
                <button type="button" onclick="selectRemitente()" class="btn btn-rounded btn-info" id = "buttonSelectRemitente" style = "display : none">Cambiar De Remitente</button>
            </div>
        @elseif($informe->inf_codigo==147)
            <h3 class="text-themecolor m-b-0 m-t-0">Informe Gerencial Inventario: <strong id="clientes_select_name"></strong></h3>
            </div>
            <div class="col-md-3"></div>
                <div class="col-md-4 col-sm-4 align-self-center">
                <div class="d-flex justify-content-end">
                <button type="button" onclick="selectCliente()" class="btn btn-rounded btn-info" id = "buttonSelectCliente" style = "display : none">Cambiar De Cliente</button>
            </div>
        @else
            <h3 class="text-themecolor m-b-0 m-t-0">{{ $informe ? $informe->inf_descripcion : 'Informe' }}</h3>
        @endif
        
    </div>
</div>
{{-- End Bread crumb and right sidebar toggle --}}

{{-- Start Page Content --}}
<div class="row">
    {{-- <div class="col-1"></div> --}}
    <div class="col-12">
        <div class="card">
    
            <div class="card-body">
                <h4 class="card-title text-themecolor float-left">{{ $informe ? $informe->inf_descripcion : 'Informe' }}</h4>
                <br>
                <form action="{{route('informe.prueba')}}" class="floating-labels m-t-20" method="POST" id="informe" >
                    @csrf
                    <div class="row m-l-20 m-r-20">
                        @foreach($campos['inputs'] as $campo)
                        {!! $campo !!}
                        @endforeach
                    </div>

                    <div class="row m-l-20 m-r-20">
                        @foreach($campos['checks'] as $campo)
                        {!! $campo !!}
                        @endforeach
                    </div>

                    <div class="row m-l-20 m-r-20">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="email" name="correo_notificacion" id="correo_notificacion" autocomplete="off" class="form-control"> 
                                    <label for="correo_notificacion" style="color:red">Correo de Notificación</label>
                                    <span class="card-subtitle">Se enviará un correo con el archivo de Excel del informe adjunto</span>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer">
                        <input type="hidden" name="empresa_id" id="empresa_id">
                        <button type="submit" name="buscar" class="btn btn-submit btn-warning" type="button" id="buscar">Buscar</button>
                        <button name="reset" class="btn btn-submit btn-warning" type="reset" id="reset" onclick="limpiar();">Limpiar</button>
                        <button type="submit" name="export" class="btn btn-submit btn-warning" type="button" id="export">Generar Informe en Excel</button>
                        <p class="float-right">Seleccione todos los campos que requiere su informe, mientras más campos ignore o seleccione como "Todos" tardará más tiempo obtener los resultados.</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <div class="col-1"></div> --}}

    {{-- <div class="col-1"></div> --}}
    <div class="col-12">
        <div class="card ocultar" id="card">
            <div class="card-body">
                <div class="table-responsive" id="resultado">

                </div>
            </div>
        </div>

        <input type="hidden" name="usu_codigo" id="usu_codigo" class="form-control" value="{{auth()->user()->usu_codigo}}">
        <input type="hidden" name="emp_codigo" id="emp_codigo" class="form-control" value="{{auth()->user()->emp_codigo}}">
        <input type="hidden" name="cli_codigo" id="cli_codigo" class="form-control" value="{{auth()->user()->cli_codigo}}">
    </div>
    {{-- <div class="col-1"></div> --}}

</div>
{{-- End PAge Content --}}
@endsection

@section('scripts')
<script src="{{asset('assets/plugins/typeahead.js-master/dist/typeahead.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/buttons/js/vfs_fonts.js')}}"></script>
<script>

    informeDateRangePicker.locale.format='DD/MM/YYYY';
    url = '{{route('informe.prueba')}}';
    urlExport = '{{route('informe.informe.archivo')}}';
    $("select").prepend('<option value="-1" selected="true">TODOS</option>');

    $(".rango_fecha").daterangepicker(informeDateRangePicker).on('apply.daterangepicker', function(ev, picker) {
        picker.element.blur();
        picker.element.close();
    }).on('cancel.daterangepicker', function(ev, picker) {
        //do something, like clearing an input
        picker.element.val('');
    });

    tabla = $('#tabla').DataTable();

    $(".select").select2({'width':'80%'});
    $(".multiple").select2();
    $(document).ready(function(){
        // $('#reset').trigger('click');
        $('.rango_fecha').val('');
        $('#informe').validate({
            submitHandler: function(form) {
                $(".loading").removeClass("ocultar");
                var submitButtonName =  $(this.submitButton).attr("name");
                datos = $(form).serializeArray();

                if(submitButtonName === "buscar"){
                    datos = $(form).serializeArray();
                    // console.log('..........');
                    $.post(url, datos, function(data){
                        if (data.status) {
                            $('#card').removeClass('ocultar');
                            $('#resultado').empty().append(data.data);
                            tabla.destroy();
                            $('#tabla').DataTable({
                                dom: 'Blfrtip',
                                "info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_",
                                "infoEmpty": "No hay registros",
                                "buttons": [
                                {
                                    extend: 'print',
                                    text: 'Imprimir',
                                    className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
                                    init: function(api, node, config) {
                                        $(node).removeClass('dt-button')
                                    }
                                },
                                {
                                    extend: 'copyHtml5',
                                    text: 'Copiar',
                                    className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
                                    init: function(api, node, config) {
                                        $(node).removeClass('dt-button')
                                    }
                                },
                                {
                                    extend: 'excelHtml5',
                                    text: 'Excel',
                                    className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
                                    init: function(api, node, config) {
                                        $(node).removeClass('dt-button')
                                    }
                                },
                                {
                                    extend: 'pdfHtml5',
                                    text: 'PDF',
                                    className: 'waves-effect waves-light btn-rounded btn-sm btn-primary',
                                    init: function(api, node, config) {
                                        $(node).removeClass('dt-button')
                                    }
                                }
                                ],
                                "lengthMenu": [[25,50,100, -1], [25,50,100, 'TODOS']],
                            });
                        }
                    });
                }

                if (submitButtonName === "export") {   
                    // $(form).attr("action", urlExport);
                    $.post(urlExport, datos, function(data){
                        if (data.error != "") {
                            mensaje("error", data.error);
                        }

                        if (data.success != "") {
                            mensaje("success", data.success);
                        }
                    });
                }
                
            }
        });

        // $("#export").on('click', function(){
        //     
        //     // informe/envio_archivo
        // });
    });

    function limpiar(){
        $('#informe').trigger("reset");
        $('#card').addClass('ocultar');
        $('#resultado').empty();
        tabla.destroy();
    }
    function mensaje(tipo, mensaje)
    {
        swal({
            type: tipo,
            title: 'Atención!',
            text: mensaje,
            timer: 2000,
            showConfirmButton: false
        });
    }
    
    // Datos empresa
    let empresas = @json($empresas);
    let empresa_id = @json(session('empresa_id'));
    let empresa_nombre = @json(session('empresa_nombre'));
    let url_empresa_seleccionada = "{{url('contabilidad/empresa_seleccionada')}}/";
    let emp_codigo = $("#emp_codigo").val();

    // ======================================================================
    
    @if(stripos(Request::url(), '/informe/logistica/envios'))
        // Datos remitente
        let remitente = @json($remitente);
        let remitente_id = @json(session('remitente_id'));
        let remitente_nombre = @json(session('remitente_nombre'));
        let url_remitente_seleccionado = "{{url('logistica/remitente_seleccionado')}}/";
    @endif

    @if(stripos(Request::url(), '/informe/informe_gerencial_inventario_binoc'))
        // Datos Clientes
        let clientes_referencia = @json($clientes_referencia);
        let url_cliente_seleccionado = "{{url('logistica_spe/cliente_seleccionado')}}/";
    @endif

    $(document).ready(function()
    {
        @if(stripos(Request::url(),'/informe/contabilidad/facturacion'))
        
            if (empresas !== undefined || empresas.length > 0) {
                if (empresa_id == null) {
                    selectEmpresa();
                } else {
                    $("#empresa_id").val(empresa_id);
                    $("#emp_select_name").empty().html('');
                }
            }
        @endif

        // ======================================================

        @if(stripos(Request::url(), '/informe/logistica/envios'))

            let conteo_facturas = facturasSinPagar(remitente_id);

            if(conteo_facturas){

                // console.log(conteo_facturas);

            } else {
                if (remitente !== undefined || remitente.length > 0) {
                    if (remitente_id == null  && emp_codigo != 1) {
                        selectRemitente();
                        $('#buttonSelectRemitente').css('display', 'block');
                    } else {
                        $("#empresa_id").val(remitente_id);
                        $("#emp_select_name").empty().html("");
                    }
                }
            }
        @endif

        // ======================================================

        @if(stripos(Request::url(), '/informe/informe_gerencial_inventario_binoc'))

            // Dato empresa del usuario logueado
            let consulta_cliente = @json($clientes_inventario);
            
            let empresa_codigo = consulta_cliente.emp_codigo;

            if (empresa_codigo != 1 && empresa_codigo != undefined && empresa_codigo != null)
            {
                selectCliente();
                $('#buttonSelectCliente').css('display', 'block');
            }
        @endif
    });

    // =========================================================================
    // =========================================================================

    function selectEmpresa(){
        swal.fire({
            title: 'Para Seguir Seleciona Una Empresa',
            type: "info",
            input: 'select',
            inputOptions: empresas,
            inputPlaceholder: 'Selecciona...',
            allowOutsideClick: false,
            allowEscapeKey:false,
            inputValidator: function (value) {
                return new Promise(function (resolve) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('Necesitas Seleccionar Una Empresa');
                    }
                });
            }
        }).then(function (result) {
            $.get(url_empresa_seleccionada+result.value, function(data){
                $("#empresa_id").val(data.empresa.id);
                empresa_id = data.empresa.id;
                $("#emp_select_name").empty().html(data.empresa.nombre);
            });
        });
    }

    // =========================================================================
    // =========================================================================

    function selectRemitente(){
        swal.fire({
            title: 'Para Seguir Seleciona Un Remitente',
            type: "info",
            // showCancelButton: true,
            // cancelButtonText: 'Cerrar',
            input: 'select',
            inputOptions: remitente,
            inputPlaceholder: 'Seleccionar...',
            allowOutsideClick: false,
            allowEscapeKey:false,
            inputValidator: function (value) {
                return new Promise(function (resolve) {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('Necesitas Seleccionar Un Remitente');
                    }
                });
            }
        }).then(function (result) {

            $.get(url_remitente_seleccionado+result.value, function(data){
                $("#empresa_id").val(data.remitente.id);
                empresa_id = data.remitente.id;
                $("#emp_select_name").empty().html(data.remitente.descripcion);
            });
        });
    }

    // =========================================================================
    // =========================================================================

    function facturasSinPagar(remitente_id){

        let usuario = $("#usu_codigo").val();
        let remitente = remitente_id;

        $.ajax({
            url: "{{route('logistica.envios.conteo_facturas')}}",
            data: {'usu_codigo': usuario, 'remitente_id': remitente},
            type: 'POST',
            dataType: 'json',
            success: function(response){
                
                if(response === 1 || response == "1"){
                    Swal.fire({
                        position: 'center',
                        title: 'Info!',
                        text: 'Tienes facturas pendientes por pagar, solo tienes acceso para consultar estado o descargar informes gerenciales'
                        + ' por favor ponerse al día para seguir utilizando el sistema.',
                        type: 'info',
                        showConfirmButton: false,
                        timer: 10000,
                        closeOnClickOutside: false,
                        allowOutsideClick: false
                    });

                    /* setTimeout(function(){
                        cerrarSesionUsuario(usuario);
                    }, 5000); */
                    if(window.location.pathname != '/informe/logistica/envios'){

                        setTimeout(function(){
                            cerrarSesionUsuario(usuario);
                        }, 5000);
                    }
                }
            }
        });
    }

    // =========================================================================
    // =========================================================================

    function cerrarSesionUsuario(usuario){

        $.ajax({
            url: "{{route('logistica.envios.cerrar_sesion')}}",
            type: 'POST',
            dataType: 'json',
            data: {'usu_codigo': usuario},
            success: function(response){

                if(response === 1 || response == "1"){
                    location.href = "/";
                }
            }
        });
    }

    // =========================================================================
    // =========================================================================

    function selectCliente()
    {
        // alert('entra funcion');

        // var getclientes = "";

        // getclientes += "<select class='select2 chosen swal form-control'>";
        
        //     $.each(clientes_referencia, function(id_cliente, des_cliente)
        //     {
        //         getclientes += "<option value='" + id_cliente + "'>"+ des_cliente + "</option>";
        //     });

        // getclientes += "</select>";
        
        swal.fire({
            title: 'Para Seguir Seleciona Un cliente',
            type: "info",
            input: 'select',
            inputOptions: clientes_referencia,
            // html:  getclientes,
            inputPlaceholder: 'Seleccionar...',
            allowOutsideClick: false,
            allowEscapeKey:false,
            // customClass: {
            //     input: 'chosen swal',
            // },
            inputValidator: function (value) {
                console.log(value);
                return new Promise(function (resolve)
                {
                    if (value !== '') {
                        resolve();
                    } else {
                        resolve('Necesitas Seleccionar Un Cliente');
                    }
                });
            }
        })
        .then(function (result) {
            console.log(url_cliente_seleccionado+result.value);
            $.get(url_cliente_seleccionado+result.value, function(data)
            {
                console.log(data);
                $("#cli_codigo").val(data.cli_codigo);
                $("#clientes_select_name").empty().html(data.cli_descripcion);
                $("#nom_cli_ref_inv_select option").remove();
                $("#nom_cli_ref_inv_select").append('<option value="'+data.cli_codigo+'" name="0" class="">'+data.cli_descripcion+'</option>');
                limpiar();
            });
        });
    }

    //=======================================//

    // $('.chosen.swal').select2({});

    // =============================================
</script>
@endsection