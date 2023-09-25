@extends('layouts.app')
@section('title', 'Index')
@section('css')
    <link href="{{asset('DataTables/datatables.min.css')}}"/>
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1 class="text-center text-uppercase">Lista de Usuarios</h1>
        </div>
    </div>

    <div class="row p-b-20 float-right">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{route('administrador.create')}}" class="btn btn-primary">Crear Nuevo Usuario</a>
        </div>
    </div>
    <div class="row p-t-30">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tabla_ususuarios">
                    {{-- <table class="table table-striped table-bordered table-hover dt-button" id="tabla_ususuarios"> --}}
                    <thead>
                        <tr class="header-table">
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Actualizar Clave</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        {{-- @php
                            dd($usuario);
                        @endphp --}}
                            <tr>
                                <td>{{$usuario->id_usuario}}</td>
                                <td>{{$usuario->nombre_usuario}}</td>
                                <td>{{$usuario->nombres}}</td>
                                <td>{{$usuario->apellidos}}</td>
                                <td>{{$usuario->decripcion_documento}}</td>
                                <td>{{$usuario->numero_documento}}</td>
                                <td>{{$usuario->correo}}</td>
                                <td>{{$usuario->descripcion_cargo}}</td>
                                <td>{{$usuario->nombre_rol}}</td>
                                <td>estado</td>
                                
                                <td>
                                    <button class="btn btn-primary" onclick="editarUsuario('{{$usuario->id_usuario}}','{{$usuario->nombre_usuario}}','{{$usuario->nombres}}','{{$usuario->apellidos}}','{{$usuario->id_tipo_documento}}','{{$usuario->decripcion_documento}}','{{$usuario->numero_documento}}','{{$usuario->correo}}','{{$usuario->celular}}','{{$usuario->id_cargo}}','{{$usuario->descripcion_cargo}}','{{$usuario->id_rol}}','{{$usuario->nombre_rol}}','{{$usuario->id_estado}}','{{$usuario->descripcion_estado}}')">
                                        <i class="fa fa-pencil" aria-hidden="true">Editar</i>
                                    </button>
                                </td>

                                <td>
                                    <button class="btn btn-info" title="Update Password" id=""><i class="fa fa-key" aria-hidden="true"></i>actualizar clave</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @include('administrador.modal') --}}

    {{-- <div id="loaderGif" class="ocultar">
        <img src="{{asset('img/processing.gif')}}" alt="processing">
    </div> --}}
@stop

{{-- ====================================================== --}}

@section('scripts')

    <script src="{{asset('DataTables/datatables.min.js')}}"></script>
    <script src="{{asset('DataTables/Buttons-2.3.4/js/buttons.html5.min.js')}}"></script>

    <script>
        $( document ).ready(function() {

            // INICIO DataTable LIST USER'S
            $("#tabla_ususuarios").DataTable({
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
            // CIERRE DataTable LIST USER'S
        });

        //==========================================//

        let cargos = @json($cargo);
        let roles = @json($rol);
        let tipoDocumento = @json($descripcion_documento);
        let estados = @json($estado);

        function editarUsuario(idUsuario,usuario,nombres,apellidos,idTipoDocumento,TipoDocumento,numeroDocumento,correo,celular,idCargo,cargo,idRol,rol,idEstado,estado) {
            formEditarUsuario = '';

            formEditarUsuario += `
                {!! Form::open(['method' => 'POST', 'route' => ['editar_usuario'], 'id' => 'form_editar_usuario', 'class' => 'login100-form', 'autocomplete' => 'off']) !!}
                @csrf
            `;

            // ====================================

            formEditarUsuario += `<input type="hidden" name="id_usuario" value="${idUsuario}">`;

            // ====================================

            formEditarUsuario += `  <div class="form-group mt-3 d-flex align-items-center">
                                        <label class="form-label text-uppercase fs-5 w-100 1-md-50">Nombres</label>
                                        <input type="text" class="form-control text-uppercase w-100 1-md-50" name="usu_nombres" value="${nombres}">
                                    </div>
            `;

            // ====================================
            
            formEditarUsuario += `  <div class="form-group mt-3 d-flex align-items-center">
                                        <label class="form-label text-uppercase fs-5 w-100 1-md-50">Apellidos</label>
                                        <input type="text" class="form-control text-uppercase w-100 1-md-50" name="usu_apellidos" value="${apellidos}">
                                    </div>
            `;

            // ====================================
            
            formEditarUsuario += `
                    <div class="col-12">
                        <div class="form-group d-flex align-items-center">
                            <label for="usu_cargo" class="form-label text-uppercase fs-5 w-100 1-md-50">Cargo</label>
                            <select class="form-control select2 w-100 1-md-50" id="usu_cargo" name="usu_cargo">
            `;
                                if (idCargo == null || idCargo == "") {
                                    formEditarUsuario += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarUsuario += `<option value="${idCargo}" selected >${cargo}</option>`;
                                }
            
                                $.each(cargos, function(id_cargo, des_cargo){
                                    formEditarUsuario += ' <option value="'+id_cargo+'">'+des_cargo+'</option>';
                                });

            formEditarUsuario += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================
            
            formEditarUsuario += `
                    <div class="col-12">
                        <div class="form-group d-flex align-items-center">
                            <label for="usu_rol" class="form-label text-uppercase fs-5 w-100 1-md-50">Rol</label>
                            <select class="form-control select2 w-100 1-md-50" id="usu_rol" name="usu_rol">
            `;
                                if (idRol == null || idRol == "") {
                                    formEditarUsuario += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarUsuario += `<option value="${idRol}" selected >${rol}</option>`;
                                }
            
                                $.each(roles, function(id_rol, des_rol){
                                    formEditarUsuario += ' <option value="'+id_rol+'">'+des_rol+'</option>';
                                });

            formEditarUsuario += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            formEditarUsuario += `
                    <div class="col-12">
                        <div class="form-group d-flex align-items-center">
                            <label for="usu_id_doc" class="form-label text-uppercase fs-5 w-100 1-md-50">Tipo Documento</label>
                            <select class="form-control select2 w-100 1-md-50" id="usu_id_doc" name="usu_id_doc">
            `;
                                if (idTipoDocumento == null || idTipoDocumento == "") {
                                    formEditarUsuario += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarUsuario += `<option value="${idTipoDocumento}" selected >${TipoDocumento}</option>`;
                                }
            
                                $.each(tipoDocumento, function(idDoc, tipDoc){
                                    formEditarUsuario += ' <option value="'+idDoc+'">'+tipDoc+'</option>';
                                });

            formEditarUsuario += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            formEditarUsuario += `  <div class="form-group d-flex align-items-center">
                                        <label class="form-label text-uppercase fs-5 w-100 1-md-50">Número Documento</label>
                                        <input type="text" class="form-control text-uppercase w-100 1-md-50" name="usu_documento" value="${numeroDocumento}">
                                    </div>
            `;

            // ====================================

            formEditarUsuario += `  <div class="form-group d-flex align-items-center">
                                        <label class="form-label text-uppercase fs-5 w-100 1-md-50">Correo</label>
                                        <input type="text" class="form-control w-100 1-md-50" name="usu_correo" value="${correo}">
                                    </div>
            `;

            // ====================================

            formEditarUsuario += `  <div class="form-group d-flex align-items-center">
                                        <label class="form-label text-uppercase fs-5 w-100 1-md-50">Celular</label>
                                        <input type="text" class="form-control w-100 1-md-50" name="usu_celular" value="${celular}">
                                    </div>
            `;

            // ====================================
            
            formEditarUsuario += `
                    <div class="col-12">
                        <div class="form-group d-flex align-items-center">
                            <label for="usu_estado" class="form-label text-uppercase fs-5 w-100 1-md-50">Estado</label>
                            <select class="form-control select2 w-100 1-md-50" id="usu_estado" name="usu_estado">
            `;
                                if (idEstado == null || idEstado == "") {
                                    formEditarUsuario += `<option value="" selected >Seleccionar...</option>`;
                                } else {
                                    formEditarUsuario += `<option value="${idEstado}" selected >${estado}</option>`;
                                }
            
                                $.each(estados, function(id_estado, d_estado){
                                    formEditarUsuario += ' <option value="'+id_estado+'">'+d_estado+'</option>';
                                });

            formEditarUsuario += `
                            </select>
                        </div>
                    </div>
            `;

            // ====================================

            formEditarUsuario += `
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary rounded-pill mt-3 mb-3" value="Editar Usuario" id="btn_editar_usuario">
                        </div>
                    </div>
            `;

            // ====================================

            formEditarUsuario += `
                    {!! Form::close() !!}
            `;

            // ===========================================================
            
            Swal.fire({
                title: '<strong>EDICIÓN BÁSICA</strong>',
                icon: 'info',
                type: 'info',
                html: formEditarUsuario,
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar!',
                cancelButtonAriaLabel: 'Thumbs down',
                allowOutsideClick: false,
                allowEscapeKey: false,
                // width: 600,
                padding: '2em',
            });
        }
    </script>
@endsection