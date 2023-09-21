{!! Form::open(['method' => 'POST', 'route' => ['visita_estado_conservacion_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_estado_conservacion']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">ESTADO CONSERVACIÓN</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="valor_estimado_inmueble" class="form-label text-uppercase">Valor Estimado Inmueble<span class="text-danger">*</span></label>
                        {!! Form::text('valor_estimado_inmueble', isset($editarVisita) ? $editarVisita->valor_estimado_inmueble : null, ['class' => 'form-control', 'id' => 'valor_estimado_inmueble', 'required']) !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Estado Conservación">
            </div>
        </div>
    </div>
{!! Form::close() !!}
