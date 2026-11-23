@extends('layouts.app')
@section('title', 'Inicio')
@section('css')
    <style>
        .home-saludo-wrap {
            min-height: calc(100vh - 220px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .home-saludo-wrap h2 {
            font-weight: 500;
            color: #333;
        }
    </style>
@endsection

{{-- ============================================================================================ --}}

@section('content')
    <div class="home-saludo-wrap">
        <div class="text-center">
            @php
                $hora = now()->setTimezone('America/Bogota')->hour;
                $saludo = 'Hola 👋';

                if ($hora >= 5 && $hora < 12) {
                    $saludo = 'Buenos días ☀️';
                } elseif ($hora >= 12 && $hora < 18) {
                    $saludo = 'Buenas tardes 🌤️';
                } else {
                    $saludo = 'Buenas noches 🌙';
                }
            @endphp

            <h2>{{ $saludo }}</h2>
            <h2>{{ $nombreCompleto ?? 'Visitante' }}</h2>
        </div>
    </div>
@endsection

{{-- ============================================================================================ --}}

@section('scripts')
    <script>
    </script>
@endsection
