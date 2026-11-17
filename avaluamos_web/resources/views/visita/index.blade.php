@extends('layouts.app')
@section('title', 'Visita')
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    {{-- @php
        use Carbon\Carbon;
    @endphp --}}
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Listado de visitas</h1>
            </div>
        </div>

        {{-- ============================== --}}

        {{-- <div class="row p-b-20 float-right">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{route('visita.create')}}" class="btn btn-primary">Registrar Nueva Visita</a>
            </div>
        </div> --}}

        {{-- ============================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="tabla_visitas">
                        <thead>
                            <tr class="header-table">
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Dirigido A</th>
                                <th>Objeto Avalúo</th>
                                <th>Ciudad</th>
                                <th>Dirección</th>
                                <th>Tipo Inmueble</th>
                                <th>Área</th>
                                <th>Estrato</th>
                                <th>% Descuento</th>
                                <th>Valor Cotización</th>
                                <th>Estado Visitado</th>
                                <th>Fecha Visita</th>
                                <th>Fecha Informe</th>
                                <th>Creado Por</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        {{-- ============================== --}}
                        <tbody>
                            @foreach ($todasVisitas as $visita)
                                <tr>
                                    <td>{{$visita->id_visita}}</td>
                                    <td>{{$visita->cli_nombres}}</td>
                                    <td>{{$visita->dirigido_a}}</td>
                                    <td>{{$visita->objeto_avaluo}}</td>
                                    <td>{{$visita->descripcion_ciudad}}</td>
                                    <td>{{$visita->direccion}}</td>
                                    <td>{{$visita->tipo_inmueble}}</td>
                                    <td>{{$visita->area}}</td>
                                    <td>{{$visita->estrato}}</td>
                                    <td>{{$visita->porcentaje_descuento}}</td>
                                    <td>{{$visita->valor_cotizacion}}</td>
                                    <td>{{$visita->descripcion_si_no}}</td>
                                    <td>{{$visita->fecha_visita}}</td>
                                    <td>{{$visita->fecha_informe}}</td>
                                    <td>{{$visita->nombre_usuario}}</td>
                                    <td>
                                        <a href="{{route('editar_visita',$visita->id_visita)}}" class="btn btn-info" id="ver_cliente">
                                            <i class="fa fa-key" aria-hidden="true"></i> Editar Visita
                                        </a>
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
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_de_Visitas',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_de_Visitas'
                    }
                ],
                language: {
                    url: "{{ asset('dataTable2.3.1/language/es-Es.json') }}"
                },
                pageLength: 10,
                lengthMenu: [[10, 15, 20, 25, 30, 35, 40, 45, 50, -1], [10, 15, 20, 25, 30, 35, 40, 45, 50, "Todos"]],
                scrollX: true,
                bSort: true,
                stripe: true,
                responsive: true,
                infoEmpty: "No hay registros disponibles"
            });
        });
    </script>
@endsection