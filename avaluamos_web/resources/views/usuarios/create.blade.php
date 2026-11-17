@extends('layouts.app')
@section('title', 'Create')

@section('css')
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center text-uppercase">Crear Nuevo Usuario</h2>
        </div>
    </div>

    {{-- ==================================================== --}}
    
    <div class="row">
        <div class="col-12">
            <a class="btn btn-warning" href="{{route('usuarios.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div>
    </div>
    
    {{-- ==================================================== --}}

    {!! Form::open(['method' => 'POST', 'route' => ['usuarios.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_nuevo_usuario']) !!}
        @csrf

        @include('usuarios.fields')

    {!! Form::close() !!}
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#numero_documento').on('focusout', function () {
                const usuidTipoDocumento = $('#id_tipo_documento').val();
                const usuNumeroDocumento = $('#numero_documento').val();

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
                        Swal.fire(
                            'Error!',
                            'No fue posible consultar el documento, intente nuevamente!',
                            'error'
                        );
                    }
                }).fail(function (xhr) {
                    console.log('error verificar documento', xhr.status, xhr.responseText);
                    Swal.fire(
                        'Error!',
                        'No fue posible consultar el documento, intente nuevamente!',
                        'error'
                    );
                });
            }); // fIN $('#numero_documento').on('focusout', function ()
        }); // FIN $(document).ready(function ()
    </script>
@stop
