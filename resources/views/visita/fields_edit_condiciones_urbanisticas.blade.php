{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">CONDICIONES URBANISTICAS</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="valorizacion" class="form-label text-uppercase">valorización<span class="text-danger">*</span></label>
                        {!! Form::select('valorizacion', collect(['' => 'Seleccionar...'])->union($valorizacion), null, ['class' => 'form-control select2', 'id' => 'valorizacion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="alumbrado_publico" class="form-label text-uppercase">alumbrado público<span class="text-danger">*</span></label>
                        {!! Form::select('alumbrado_publico', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'alumbrado_publico', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="transporte" class="form-label text-uppercase">Transporte</label>
                        {!! Form::select('transporte', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'transporte']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="orden_publico" class="form-label text-uppercase">orden público<span class="text-danger">*</span></label>
                        {!! Form::select('orden_publico', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'orden_publico', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="seguridad" class="form-label text-uppercase">seguridad<span class="text-danger">*</span></label>
                        {!! Form::select('seguridad', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'seguridad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="salubridad" class="form-label text-uppercase">salubridad<span class="text-danger">*</span></label>
                        {!! Form::select('salubridad', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'salubridad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vias" class="form-label text-uppercase">vías<span class="text-danger">*</span></label>
                        {!! Form::select('vias', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'vias_acces
                        o', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="tipo_vias" class="form-label text-uppercase">tipo de vías<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_vias', collect(['' => 'Seleccionar...'])->union($tipo_vias), null, ['class' => 'form-control select2', 'id' => 'tipo_vias', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="barrios_sectores" class="form-label text-uppercase">Barrios/Sectores<span class="text-danger">*</span></label>
                        {!! Form::textarea('barrios_sectores', null, ['class' => 'form-control', 'id' => 'barrios_sectores', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="tipo_edificaciones" class="form-label text-uppercase">tipo edificaciones<span class="text-danger">*</span></label>
                        {!! Form::textarea('tipo_edificaciones', null, ['class' => 'form-control', 'id' => 'tipo_edificaciones', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="observaciones_condiciones_urbanisticas" class="form-label text-uppercase">Observaciones condiciones urbanisticas<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_condiciones_urbanisticas', null, ['class' => 'form-control', 'id' => 'observaciones_condiciones_urbanisticas', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Condiciones Urbanísticas" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
