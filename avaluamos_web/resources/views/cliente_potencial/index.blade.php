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
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <h2 class="text-center text-uppercase">Clientes</h2>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('cliente_potencial.create')}}" class="btn btn-primary rounded">Crear Nuevo Cliente</a>
            </div>
        </div>

        {{-- ====================================================== --}}

        <div class="row">
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
                                <th>Creado Por</th>
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

                                    <td>{{$cliente->nombre_usuario}}</td>

                                    <td>
                                        <a href="{{ route('cliente_potencial.edit', $cliente->id_cliente) }}" class="btn btn-warning rounded">Editar Cliente</a>

                                        <a href="{{ route('visita.create', ['id_cliente' => $cliente->id_cliente]) }}" class="btn btn-success mt-2 rounded">Crear Visita</a>
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
            $("#tabla_visitas").DataTable({
                dom: window.dataTableDomConBotones,
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_Clientes_Potenciales',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_Clientes_Potenciales'
                    }
                ],
                scrollX: true
            });
        });
    </script>
@endsection
