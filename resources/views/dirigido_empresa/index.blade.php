@extends('layouts.app')
@section('title', 'Empresas')
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
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
                {{-- <a href="{{route('dirigido_empresa.create')}}" class="btn btn-primary float-right">Crear Nueva Empresa</a> --}}

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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td>{{$empresa->id_dirigido_a}}</td>
                                    <td>{{$empresa->dirigido_a}}</td>
                                    <td>{{$empresa->decripcion_documento}}</td>
                                    <td>{{$empresa->numero_documento}}</td>
                                    <td>
                                        {{-- <a href="visita/edit" class="btn btn-info" id="">Editar</a> --}}
                                        <button class="btn btn-info" id="{{$empresa->id_dirigido_a}}">
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
    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('DataTables/Buttons-2.3.4/js/buttons.html5.min.js')}}"></script>

    <script>
        $(document).ready(function()
        {
            // window.$(".select2").prepend(new Option("Select Contact...", "-1"));
            // $("#btnAccion").attr('disabled', 'disabled');

            // INICIO DataTable CREAR EMPRESAS
            $("#tbl_empresas").DataTable({
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
            // CIERRE DataTable CREAR EMPRESAS

            // =================================================

            
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
                    }
                });
            })
        })
    </script>
@endsection