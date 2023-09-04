{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">OBSERVACIONES GENERALES</h2>

            <div class="row mb-5">
                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="observaciones_generales" class="form-label text-uppercase" data-placeholder="observaciones_generales">Valor Observaciones Generales<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_generales', null, ['class' => 'form-control select2', 'id' => 'observaciones_generales', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Visita" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
