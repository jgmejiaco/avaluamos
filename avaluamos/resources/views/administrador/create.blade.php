@extends('layouts.app')
@section('title', 'Create')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/chosen/chosen.min.css')}}">
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
            <a class="btn btn-warning" href="{{route('administrador.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div>
    </div>
    
    {{-- ==================================================== --}}

    {!! Form::open(['method' => 'POST', 'route' => ['administrador.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_nuevo_usuario']) !!}
    @csrf

        @include('administrador.fields')

    {!! Form::close() !!}
@stop

{{-- ========================================================== --}}
{{-- ========================================================== --}}
{{-- ========================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function()
        {
            $('.select2').select2({
                placeholder: 'Seleccionar...',
                allowClear: true,
                disabled: false
            });
            
            // ==============================================
            
            $('#numero_documento').blur(function () {
                let usuidTipoDocumento = $('#id_tipo_documento').val();
                let usuNumeroDocumento = $('#numero_documento').val();
                
                $.ajax({
                    url: "{{route('verificar_documento')}}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'usuidTipoDocumento': usuidTipoDocumento,
                        'usuNumeroDocumento': usuNumeroDocumento,
                    },
                    success: function (respuesta) {
                        console.log(respuesta);

                        if (respuesta == "existe_documento") {
                            Swal.fire(
                                'Cuidado!',
                                'Este tipo y número de documento ya existe!',
                                'warning'
                            )
                            $('#numero_documento').val('');
                        }

                        if (respuesta == "error_exception") {
                            Swal.fire(
                                'Error!',
                                'No fue posible consultar el documento, intente nuevamente!',
                                'error'
                            )
                        }
                    }
                });
            })
        });
    </script>
@endsection
