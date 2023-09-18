{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">ACABADOS Y EVALUACIÓN TÉCNICA DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="sistema_constructivo" class="form-label text-uppercase">Sistema Constructivo<span class="text-danger">*</span></label>
                        {!! Form::select('sistema_constructivo', collect(['' => 'Seleccionar...'])->union($sistema_constructivo), null, ['class' => 'form-control select2', 'id' => 'sistema_constructivo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porton_principal" class="form-label text-uppercase">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('porton_principal', collect(['' => 'Seleccionar...'])->union($puertas_material), null, ['class' => 'form-control select2', 'id' => 'porton_principal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="fachada" class="form-label text-uppercase">Fachada</label>
                        {!! Form::select('fachada', collect(['' => 'Seleccionar...'])->union($tipo_fachada), null, ['class' => 'form-control select2', 'id' => 'fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="puertas" class="form-label text-uppercase">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('puertas', collect(['' => 'Seleccionar...'])->union($puertas_material), null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="muros" class="form-label text-uppercase">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('muros', collect(['' => 'Seleccionar...'])->union($tipo_muro), null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="ventaneria" class="form-label text-uppercase">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('ventaneria', collect(['' => 'Seleccionar...'])->union($ventaneria), null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="techos" class="form-label text-uppercase">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('techos', collect(['' => 'Seleccionar...'])->union($tipo_techo), null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="servicios_publicos" class="form-label text-uppercase">Servicios Públicos</label>
                        {!! Form::text('servicios_publicos', null, ['class' => 'form-control', 'id' => 'servicios_publicos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column" data-validate="Required">
                        <label for="pisos" class="form-label text-uppercase">Pisos<span class="text-danger">*</span></label>
                        {!! Form::text('pisos', null, ['class' => 'form-control text-uppercase', 'id' => 'pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="telefono" class="form-label text-uppercase">Teléfono</label>
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="bano" class="form-label text-uppercase">Baños</label>
                        {!! Form::text('bano', null, ['class' => 'form-control', 'id' => 'bano']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="energia" class="form-label text-uppercase">Energía</label>
                        {!! Form::text('energia', null, ['class' => 'form-control', 'id' => 'energia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cocina" class="form-label text-uppercase">Cocina<span class="text-danger">*</span></label>
                        {!! Form::text('cocina', null, ['class' => 'form-control', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="agua" class="form-label text-uppercase">Agua<span class="text-danger">*</span></label>
                        {!! Form::text('agua', null, ['class' => 'form-control', 'id' => 'agua', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="meson" class="form-label text-uppercase">Mesón<span class="text-danger">*</span></label>
                        {!! Form::text('meson', null, ['class' => 'form-control', 'id' => 'meson', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="gas" class="form-label text-uppercase">Gas<span class="text-danger">*</span></label>
                        {!! Form::text('gas', null, ['class' => 'form-control', 'id' => 'gas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="observaciones_acabados_inmueble" class="form-label text-uppercase">Observaciones Acabados Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_acabados_inmueble', null, ['class' => 'form-control', 'id' => 'observaciones_acabados_inmueble', 'required']) !!}
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
