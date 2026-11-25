@extends('layouts.app')
@section('title', 'Create')

@section('css')
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('content')
    <div class="container-fluid mt-3 mb-3">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase">Crear Nuevo Usuario</h2>
            </div>
        </div>

        {{-- ==================================================== --}}
        
        <div class="row">
            <div class="col-12">
                <a class="btn btn-warning rounded" href="{{route('usuarios.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
            </div>
        </div>
        
        {{-- ==================================================== --}}

        {!! Form::open(['method' => 'POST', 'route' => ['usuarios.store'], 'class' => 'login100-form validate-form mt-3', 'autocomplete' => 'off', 'id' => 'form_nuevo_usuario']) !!}
            @csrf

            @include('usuarios.fields')

        {!! Form::close() !!}
    </div>
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function () {
            function mostrarErrorConsulta(mensaje) {
                Swal.fire('Error!', mensaje, 'error');
            }

            $('#numero_documento').on('focusout', function () {
                const usuidTipoDocumento = $('#id_tipo_documento').val();
                const usuNumeroDocumento = $('#numero_documento').val();
                const msgErrorDocumento = 'No fue posible consultar el documento, intente nuevamente!';

                if (!usuNumeroDocumento) {
                    return;
                }

                if (!usuidTipoDocumento) {
                    Swal.fire(
                        'Atención!',
                        'Debe seleccionar el tipo de documento antes de validar el número.',
                        'warning'
                    );
                    $('#id_tipo_documento').focus();
                    return;
                }

                $.ajax({
                    url:      "{{ route('verificar_documento_store') }}",
                    method:   'POST',
                    dataType: 'json',
                    data: {
                        _token: @json(csrf_token()),
                        usuidTipoDocumento: usuidTipoDocumento,
                        usuNumeroDocumento: usuNumeroDocumento
                    }
                }).done(function (respuesta) {
                    if (respuesta === 'existe_documento') {
                        Swal.fire(
                            'Cuidado!',
                            'Este tipo y número de documento ya existe!',
                            'warning'
                        );
                        $('#numero_documento').val('');
                    }

                    if (respuesta === 'error_exception') {
                        mostrarErrorConsulta(msgErrorDocumento);
                    }
                }).fail(function (xhr) {
                    console.log('error verificar documento', xhr.status, xhr.responseText);
                    mostrarErrorConsulta(msgErrorDocumento);
                });
            }); // fIN $('#numero_documento').on('focusout', function ()

            // ===========================================================================

            let peticionCorreo = null;

            $('#correo').on('focusout', function () {
                const usuCorreo = $.trim($('#correo').val() || '');
                const msgErrorCorreo = 'No fue posible consultar el correo, intente nuevamente!';

                if (!usuCorreo) {
                    return;
                }

                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(usuCorreo)) {
                    Swal.fire(
                        'Atención!',
                        'Ingrese un correo válido.',
                        'warning'
                    );
                    $('#correo').val('');
                    return;
                }

                if (peticionCorreo) {
                    peticionCorreo.abort();
                }

                peticionCorreo = $.ajax({
                    url:      "{{ route('verificar_correo_store') }}",
                    method:   'POST',
                    dataType: 'json',
                    data: {
                        _token: @json(csrf_token()),
                        usuCorreo: usuCorreo
                    }
                }).done(function (respuesta) {
                    // Solo actuar si el correo del input sigue siendo el consultado
                    if ($.trim($('#correo').val() || '') !== usuCorreo) {
                        return;
                    }

                    if (respuesta === 'existe_correo') {
                        Swal.fire(
                            'Cuidado!',
                            'Este correo ya existe!',
                            'warning'
                        );
                        $('#correo').val('');
                        return;
                    }

                    if (respuesta === 'error_exception') {
                        mostrarErrorConsulta(msgErrorCorreo);
                    }
                }).fail(function (xhr, textStatus) {
                    if (textStatus === 'abort') {
                        return;
                    }
                    console.log('error verificar correo', xhr.status, xhr.responseText);
                    mostrarErrorConsulta(msgErrorCorreo);
                });
            }); // fIN $('#correo').on('focusout', function ()

            // ===========================================================================


        }); // FIN $(document).ready(function ()
    </script>
@stop
