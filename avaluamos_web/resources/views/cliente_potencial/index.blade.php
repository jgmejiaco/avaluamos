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

                                    {{-- @php
                                        $fechaNacTimeStamp = $cliente->fecha_nacimiento;
                                        $fechaNacimiento = isset($fechaNacTimeStamp) ? Carbon::parse($cliente->fecha_nacimiento)->toDateString() : null;
                                    @endphp --}}
                                    
                                    <td>
                                        {{-- <button class="btn btn-warning" onclick="editarCliente('{{$cliente->id_cliente}}','{{$cliente->cli_nombres}}','{{$cliente->id_doc_cliente}}','{{$cliente->decripcion_documento}}','{{$cliente->documento_cliente}}','{{$fechaNacimiento}}','{{$cliente->cli_celular}}','{{$cliente->cli_email}}',{{$cliente->id_tipo_persona}},'{{$cliente->tipo_persona}}','{{$cliente->id_pais}}','{{$cliente->descripcion_pais}}','{{$cliente->id_departamento_estado}}','{{$cliente->descripcion_departamento}}','{{$cliente->id_ciudad}}','{{$cliente->descripcion_ciudad}}','{{$cliente->id_referido_por}}','{{$cliente->referido_por}}','{{$cliente->id_red_social}}','{{$cliente->red_social}}','{{$cliente->nombre_quien_refiere}}','{{$cliente->empresa_que_refiere}}')">Editar Cliente</button> --}}

                                        <a href="{{route('editar_cliente',$cliente->id_cliente)}}" class="btn btn-warning">Editar Visita</a>

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
        });
    </script>
@endsection
