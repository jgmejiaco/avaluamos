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
                <table class="table table-striped table-bordered table-hover dt-button" id="tabla_ususuarios">
                    <thead>
                        <tr class="header-table">
                            <th>Usuario</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>
                            <th>Correo</th>
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
                                <td>{{$usuario->nombre_usuario}}</td>
                                <td>{{$usuario->nombres}}</td>
                                <td>{{$usuario->apellidos}}</td>
                                <td>{{$usuario->decripcion_documento}}</td>
                                <td>{{$usuario->numero_documento}}</td>
                                <td>{{$usuario->correo}}</td>
                                <td>{{$usuario->nombre_rol}}</td>
                                <td>estado</td>
                                
                                <td>
                                    <a href="" class="btn btn-primary" title="Edit"><i class="fa fa-pencil" aria-hidden="true">Editar</i></a>
                                    {{-- <input type="hidden" name="id_user" id="id_user" value="{{$usuario->id_user}}"> --}}
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

       

       
    </script>
@endsection