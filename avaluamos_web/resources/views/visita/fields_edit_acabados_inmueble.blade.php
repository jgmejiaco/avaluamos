{!! Form::open(['method' => 'POST', 'route' => ['visita_acabados_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_acabados_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-3 rounded-4">
        <div class="mb-5">
            {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h4 class="text-uppercase">ACABADOS Y EVALUACIÓN TÉCNICA DEL INMUEBLE</h4>

            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_sistema_constructivo" class="form-label text-uppercase mb-0">Sistema Constructivo<span class="text-danger">*</span></label>
                        {!! Form::select('id_sistema_constructivo', collect(['' => 'Seleccionar...'])->union($sistema_constructivo), isset($editarVisita) ? $editarVisita->id_sistema_constructivo : null, ['class' => 'form-select', 'id' => 'id_sistema_constructivo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porton_principal" class="form-label text-uppercase mb-0">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('porton_principal', collect(['' => 'Seleccionar...'])->union($puertas_material), isset($editarVisita) ? $editarVisita->porton_principal : null, ['class' => 'form-select', 'id' => 'porton_principal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_fachada" class="form-label text-uppercase mb-0">Fachada</label>
                        {!! Form::select('id_tipo_fachada', collect(['' => 'Seleccionar...'])->union($tipo_fachada), isset($editarVisita) ? $editarVisita->id_tipo_fachada : null, ['class' => 'form-select', 'id' => 'id_tipo_fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="puertas" class="form-label text-uppercase mb-0">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('puertas', collect(['' => 'Seleccionar...'])->union($puertas_material), isset($editarVisita) ? $editarVisita->puertas : null, ['class' => 'form-select', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_muro" class="form-label text-uppercase mb-0">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_muro', collect(['' => 'Seleccionar...'])->union($tipo_muro), isset($editarVisita) ? $editarVisita->id_tipo_muro : null, ['class' => 'form-select', 'id' => 'id_tipo_muro', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="id_ventaneria" class="form-label text-uppercase mb-0">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('id_ventaneria', collect(['' => 'Seleccionar...'])->union($ventaneria), isset($editarVisita) ? $editarVisita->id_ventaneria : null, ['class' => 'form-select', 'id' => 'id_ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_techo" class="form-label text-uppercase mb-0">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_techo', collect(['' => 'Seleccionar...'])->union($tipo_techo), isset($editarVisita) ? $editarVisita->id_tipo_techo : null, ['class' => 'form-select', 'id' => 'id_tipo_techo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="pisos" class="form-label text-uppercase mb-0">Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('pisos', collect(['' => 'Seleccionar...'])->union($tipo_piso), isset($editarVisita) ? $editarVisita->pisos : null, ['class' => 'form-select', 'id' => 'pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="banios" class="form-label text-uppercase mb-0">Baños</label>
                        {!! Form::select('banios', collect(['' => 'Seleccionar...'])->union($tipo_banio), isset($editarVisita) ? $editarVisita->banios : null, ['class' => 'form-select', 'id' => 'banios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="cocina" class="form-label text-uppercase mb-0">Cocina<span class="text-danger">*</span></label>
                        {!! Form::select('cocina', collect(['' => 'Seleccionar...'])->union($tipo_cocina), isset($editarVisita) ? $editarVisita->cocina : null, ['class' => 'form-select', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}


                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="meson" class="form-label text-uppercase mb-0">Mesón<span class="text-danger">*</span></label>
                        {!! Form::select('meson', collect(['' => 'Seleccionar...'])->union($tipo_meson), isset($editarVisita) ? $editarVisita->meson : null, ['class' => 'form-select', 'id' => 'meson', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="patios" class="form-label text-uppercase mb-0">Patios</label>
                        {!! Form::select('patios', collect(['' => 'Seleccionar...'])->union($tipo_piso), isset($editarVisita) ? $editarVisita->patios : null, ['class' => 'form-select', 'id' => 'patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="servicios_publicos" class="form-label text-uppercase mb-0">Servicios Públicos</label>
                        {!! Form::select('servicios_publicos', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->servicios_publicos : null, ['class' => 'form-select', 'id' => 'servicios_publicos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="telefono" class="form-label text-uppercase mb-0">Teléfono</label>
                        {!! Form::select('telefono', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->telefono : null, ['class' => 'form-select', 'id' => 'telefono']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="energia" class="form-label text-uppercase mb-0">Energía</label>
                        {!! Form::select('energia', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->energia : null, ['class' => 'form-select', 'id' => 'energia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="agua" class="form-label text-uppercase mb-0">Agua<span class="text-danger">*</span></label>
                        {!! Form::select('agua', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->agua : null, ['class' => 'form-select', 'id' => 'agua', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="gas" class="form-label text-uppercase mb-0">Gas<span class="text-danger">*</span></label>
                        {!! Form::select('gas', collect(['' => 'Seleccionar...'])->union($si_no), isset($editarVisita) ? $editarVisita->gas : null, ['class' => 'form-select', 'id' => 'gas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_acabados_inmueble" class="form-label text-uppercase mb-0">Observaciones Acabados Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_acabados_inmueble', isset($editarVisita) ? $editarVisita->obs_acabados_inmueble : null, ['class' => 'form-control', 'id' => 'obs_acabados_inmueble', 'rows' => 4, 'required']) !!}
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
                <input class="btn btn-primary rounded-pill" type="submit" value="Guardar Acabados Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
