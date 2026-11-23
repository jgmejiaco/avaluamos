@extends('layouts.app')
@section('title', 'Acceso denegado')

@section('content')
    <div class="modal fade show" id="modalPermisoDenegado" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 p-3">
                <div class="text-center p-4">
                    <h5 class="text-danger">Acceso Denegado</h5>
                    <p>{{ $mensaje ?? 'No tienes permisos para realizar esta acción.' }}</p>
                    <a href="{{ route('home.index') }}" class="btn btn-secondary mt-3">Ir al inicio</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
@endsection
