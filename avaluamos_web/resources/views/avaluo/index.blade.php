@extends('layouts.app')
@section('title', 'Avalúo')
@section('css')
    
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">Calcular Avalúos</h1>
            </div>
        </div>

        {{-- ============================== --}}

        <div class="row p-t-30">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered w-100" id="tbl_avaluos">
                        <thead>
                            <tr class="header-table">
                                <th>ID Visita</th>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        {{-- ============================== --}}
                        <tbody>
                            @foreach ($avaluosIndex as $avaluo)
                                <tr>
                                    <td>{{$avaluo->id_visita}}</td>
                                    <td>{{$avaluo->cli_nombres}}</td>
                                    <td>{{$avaluo->dirigido_a}}</td>
                                    <td>{{$avaluo->objeto_avaluo}}</td>
                                    <td>{{$avaluo->descripcion_ciudad}}</td>
                                    <td>{{$avaluo->direccion}}</td>
                                    <td>{{$avaluo->tipo_inmueble}}</td>
                                    <td>{{$avaluo->area}}</td>
                                    <td>{{$avaluo->estrato}}</td>
                                    <td>{{$avaluo->porcentaje_descuento}}</td>
                                    <td>{{$avaluo->valor_cotizacion}}</td>
                                    <td>{{$avaluo->descripcion_si_no}}</td>
                                    <td>{{$avaluo->fecha_visita}}</td>
                                    <td>{{$avaluo->fecha_informe}}</td>
                                    <td>
                                        <a href="{{route('calcular_avaluo',$avaluo->id_visita)}}" class="btn btn-info mt-3" id="calcular_avaluo">
                                            <i class="fa fa-key" aria-hidden="true"></i> Calcular Avalúo
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
            $("#tbl_avaluos").DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'btn btn-sm btn-danger rounded-pill',
                        title: 'Lista_de_Avaluos',
                        customize: function(doc) {
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'LETTER';
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'btn btn-sm btn-success rounded-pill',
                        title: 'Lista_de_Avaluos'
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
