{!! Form::open(['method' => 'POST', 'route' => ['visita_obser_generales_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_obser_generales']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">OBSERVACIONES GENERALES</h2>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="observaciones_generales" class="form-label text-uppercase">Observaciones Generales<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_generales', isset($editarVisita) ? $editarVisita->observaciones_generales : null, ['class' => 'form-control', 'id' => 'observaciones_generales', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Observaciones Generales" id="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
