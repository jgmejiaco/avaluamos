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
                <h1 class="text-center text-uppercase">visita cliente</h1>
            </div>
        </div>

        @include('visita.fields_edit_main')
    </div>
@stop

{{-- ====================================================== --}}
{{-- ====================================================== --}}

@section('scripts')
    <script>
        $( document ).ready(function()
        {
            let select = $('.select2');

            let seleccionar = $("<option>", {
                value: "-1", // Valor de la opción
                text: "Seleccionar..." // Texto visible de la opción
            });

            seleccionar.attr("selected", true);
            select.prepend(seleccionar);

            // ==============================================

            $('#div_red_social').hide();
            $('#div_nombre_refiere').hide();
            $('#div_empresa_refiere').hide();

            $("#id_referido_por").on('change',function(){
                let referido_por = $('#id_referido_por').val();
                console.log(referido_por);

                if (referido_por == 1) { // EMPRESA = 1
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').show('slow');
                } else if (referido_por == 2) { // REDES SOCIALES = 2
                    $('#div_red_social').show('slow');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else if (referido_por == 3) { // REFERIDOS = 3
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').show('slow');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else if (referido_por == 4) { // WEB AVALUAMOS = 4
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                } else { // SIN SELECCIONAR = -1
                    $('#div_red_social').hide('slow');
                    $('#red_social').removeAttr('required');
                    $('#div_nombre_refiere').hide('slow');
                    $('#nombre_quien_refiere').removeAttr('required');
                    $('#div_empresa_refiere').hide('slow');
                    $('#empresa_que_refiere').removeAttr('required');
                    $('#id_referido_por').attr('required');
                }
            });
        });
    </script>
@endsection