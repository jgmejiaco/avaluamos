{!! Form::open(['method' => 'POST', 'route' => ['visita_acabados_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_acabados_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">ACABADOS Y EVALUACIÓN TÉCNICA DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_sistema_constructivo" class="form-label text-uppercase">Sistema Constructivo<span class="text-danger">*</span></label>
                        {!! Form::select('id_sistema_constructivo', collect(['' => 'Seleccionar...'])->union($sistema_constructivo), isset($calcularAvaluo) ? $calcularAvaluo->id_sistema_constructivo : null, ['class' => 'form-control select2', 'id' => 'id_sistema_constructivo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porton_principal" class="form-label text-uppercase">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('porton_principal', collect(['' => 'Seleccionar...'])->union($puertas_material), isset($calcularAvaluo) ? $calcularAvaluo->porton_principal : null, ['class' => 'form-control select2', 'id' => 'porton_principal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_fachada" class="form-label text-uppercase">Fachada</label>
                        {!! Form::select('id_tipo_fachada', collect(['' => 'Seleccionar...'])->union($tipo_fachada), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_fachada : null, ['class' => 'form-control select2', 'id' => 'id_tipo_fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="puertas" class="form-label text-uppercase">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('puertas', collect(['' => 'Seleccionar...'])->union($puertas_material), isset($calcularAvaluo) ? $calcularAvaluo->puertas : null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_muro" class="form-label text-uppercase">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_muro', collect(['' => 'Seleccionar...'])->union($tipo_muro), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_muro : null, ['class' => 'form-control select2', 'id' => 'id_tipo_muro', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_ventaneria" class="form-label text-uppercase">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('id_ventaneria', collect(['' => 'Seleccionar...'])->union($ventaneria), isset($calcularAvaluo) ? $calcularAvaluo->id_ventaneria : null, ['class' => 'form-control select2', 'id' => 'id_ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_techo" class="form-label text-uppercase">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_techo', collect(['' => 'Seleccionar...'])->union($tipo_techo), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_techo : null, ['class' => 'form-control select2', 'id' => 'id_tipo_techo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="pisos" class="form-label text-uppercase">Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('pisos', collect(['' => 'Seleccionar...'])->union($tipo_piso), isset($calcularAvaluo) ? $calcularAvaluo->pisos : null, ['class' => 'form-control select2', 'id' => 'pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="banios" class="form-label text-uppercase">Baños</label>
                        {!! Form::select('banios', collect(['' => 'Seleccionar...'])->union($tipo_banio), isset($calcularAvaluo) ? $calcularAvaluo->banios : null, ['class' => 'form-control select2', 'id' => 'banios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cocina" class="form-label text-uppercase">Cocina<span class="text-danger">*</span></label>
                        {!! Form::select('cocina', collect(['' => 'Seleccionar...'])->union($tipo_cocina), isset($calcularAvaluo) ? $calcularAvaluo->cocina : null, ['class' => 'form-control select2', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}


                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="meson" class="form-label text-uppercase">Mesón<span class="text-danger">*</span></label>
                        {!! Form::select('meson', collect(['' => 'Seleccionar...'])->union($tipo_meson), isset($calcularAvaluo) ? $calcularAvaluo->meson : null, ['class' => 'form-control select2', 'id' => 'meson', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="patios" class="form-label text-uppercase">Patios</label>
                        {!! Form::select('patios', collect(['' => 'Seleccionar...'])->union($tipo_piso), isset($calcularAvaluo) ? $calcularAvaluo->patios : null, ['class' => 'form-control select2', 'id' => 'patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="servicios_publicos" class="form-label text-uppercase">Servicios Públicos</label>
                        {!! Form::select('servicios_publicos', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->servicios_publicos : null, ['class' => 'form-control select2', 'id' => 'servicios_publicos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="telefono" class="form-label text-uppercase">Teléfono</label>
                        {!! Form::select('telefono', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->telefono : null, ['class' => 'form-control select2', 'id' => 'telefono']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="energia" class="form-label text-uppercase">Energía</label>
                        {!! Form::select('energia', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->energia : null, ['class' => 'form-control select2', 'id' => 'energia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="agua" class="form-label text-uppercase">Agua<span class="text-danger">*</span></label>
                        {!! Form::select('agua', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->agua : null, ['class' => 'form-control select2', 'id' => 'agua', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="gas" class="form-label text-uppercase">Gas<span class="text-danger">*</span></label>
                        {!! Form::select('gas', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->gas : null, ['class' => 'form-control select2', 'id' => 'gas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_acabados_inmueble" class="form-label text-uppercase">Observaciones Acabados Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_acabados_inmueble', isset($calcularAvaluo) ? $calcularAvaluo->obs_acabados_inmueble : null, ['class' => 'form-control', 'id' => 'obs_acabados_inmueble', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Acabados Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
