{!! Form::open(['method' => 'POST', 'route' => ['visita_condi_urbanisticas_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_condi_urbanisticas']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">CONDICIONES URBANISTICAS</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_valorizacion" class="form-label text-uppercase">valorización</label>
                        {!! Form::select('id_valorizacion', collect(['' => 'Seleccionar...'])->union($valorizacion), isset($editarVisita) ? $editarVisita->id_valorizacion : null, ['class' => 'form-control select2', 'id' => 'id_valorizacion']) !!}
                        {{-- isset($editarVisita) ? $editarVisita->porteria_24 : null --}}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_alumbrado_publico" class="form-label text-uppercase">alumbrado público</label>
                        {!! Form::select('cu_alumbrado_publico', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_alumbrado_publico : null, ['class' => 'form-control select2', 'id' => 'cu_alumbrado_publico']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_transporte" class="form-label text-uppercase">Transporte</label>
                        {!! Form::select('cu_transporte', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_transporte : null, ['class' => 'form-control select2', 'id' => 'cu_transporte']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_orden_publico" class="form-label text-uppercase">orden público</label>
                        {!! Form::select('cu_orden_publico', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_orden_publico : null, ['class' => 'form-control select2', 'id' => 'cu_orden_publico']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_seguridad" class="form-label text-uppercase">seguridad</label>
                        {!! Form::select('cu_seguridad', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_seguridad : null, ['class' => 'form-control select2', 'id' => 'cu_seguridad']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_salubridad" class="form-label text-uppercase">salubridad</label>
                        {!! Form::select('cu_salubridad', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_salubridad : null, ['class' => 'form-control select2', 'id' => 'cu_salubridad']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_vias" class="form-label text-uppercase">vías</label>
                        {!! Form::select('cu_vias', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($editarVisita) ? $editarVisita->cu_vias : null, ['class' => 'form-control select2', 'id' => 'cu_vias']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_vias" class="form-label text-uppercase">tipo de vías</label>
                        {!! Form::select('id_tipo_vias', collect(['' => 'Seleccionar...'])->union($tipo_vias), isset($editarVisita) ? $editarVisita->id_tipo_vias : null, ['class' => 'form-control select2', 'id' => 'id_tipo_vias']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_aceras" class="form-label text-uppercase">Aceras</label>
                        {!! Form::select('cu_aceras', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->cu_aceras : null, ['class' => 'form-control select2', 'id' => 'cu_aceras']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_red_gas" class="form-label text-uppercase">Red Gas</label>
                        {!! Form::select('cu_red_gas', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->cu_red_gas : null, ['class' => 'form-control select2', 'id' => 'cu_red_gas']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_red_telco" class="form-label text-uppercase">Red Telecomunicaciones</label>
                        {!! Form::select('cu_red_telco', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->cu_red_telco : null, ['class' => 'form-control select2', 'id' => 'cu_red_telco']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_red_acueducto" class="form-label text-uppercase">Red Acueducto</label>
                        {!! Form::select('cu_red_acueducto', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->cu_red_acueducto: null, ['class' => 'form-control select2', 'id' => 'cu_red_acueducto']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_red_alcantarillado" class="form-label text-uppercase">Red Alcantarillado</label>
                        {!! Form::select('cu_red_alcantarillado', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->cu_red_alcantarillado : null, ['class' => 'form-control select2', 'id' => 'cu_red_alcantarillado']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_barrios_sectores" class="form-label text-uppercase">Barrios/Sectores</label>
                        {!! Form::textarea('cu_barrios_sectores', isset($editarVisita) ? $editarVisita->cu_barrios_sectores : null, ['class' => 'form-control', 'id' => 'cu_barrios_sectores']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="cu_tipo_edificaciones" class="form-label text-uppercase">tipo edificaciones</label>
                        {!! Form::textarea('cu_tipo_edificaciones', isset($editarVisita) ? $editarVisita->cu_tipo_edificaciones : null, ['class' => 'form-control', 'id' => 'cu_tipo_edificaciones']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_condiciones_urbanisticas" class="form-label text-uppercase">Observaciones condiciones urbanisticas<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_condiciones_urbanisticas', isset($editarVisita) ? $editarVisita->obs_condiciones_urbanisticas : null, ['class' => 'form-control', 'id' => 'obs_condiciones_urbanisticas', 'required']) !!}
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
