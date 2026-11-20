{{--
    Uso en vistas que necesiten FullCalendar:
    @section('css')
        @include('layouts.fullcalendar_assets', ['tipo' => 'css'])
    @endsection

    @section('scripts')
        @include('layouts.fullcalendar_assets', ['tipo' => 'js'])
    @endsection
--}}
@if (($tipo ?? '') === 'css')
    <link rel="stylesheet" href="{{ asset('fullcalendar/css/fullcalendar.min.css') }}" />
@elseif (($tipo ?? '') === 'js')
    <script src="{{ asset('fullcalendar/moment/cdnjs.cloudflare.com_ajax_libs_moment.js_2.24.0_moment.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('fullcalendar/js/locale/es.js') }}"></script>
@endif
