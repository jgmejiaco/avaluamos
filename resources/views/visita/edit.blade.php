@extends('layouts.app')
@section('title', 'Editar Visita')

@section('css')
    
@stop

{{-- ====================================================== --}}
{{-- ====================================================== --}}

@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-uppercase">editar visita</h1>
            </div>
        </div>

        @include('visita.fields_edit_main')
    </div>
@stop

{{-- ====================================================== --}}
{{-- ====================================================== --}}

@section('scripts')
    <script>
        // $( document ).ready(function()
        // {

            
        // });
    </script>
@endsection