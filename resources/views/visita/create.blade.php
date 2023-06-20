@extends('layouts.app')
@section('title', 'Crear Visita')
@section('css')
    {{-- <link href="{{asset('DataTables/datatables.min.css')}}"/> --}}
@stop

{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5 pt-0">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase mt-0">registro de visita</h1>
            </div>
        </div>

        @include('visita.fields_create_main')
    </div>
@stop

{{-- ====================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function() 
        {

           
        });
    </script>
@endsection