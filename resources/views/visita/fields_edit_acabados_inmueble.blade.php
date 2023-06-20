{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">5 - ACABADOS Y EVALUACIÓN TÉCNICA DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="sistema_constructivo" class="form-label text-uppercase" data-placeholder="sistema_constructivo">Sistema Constructivo<span class="text-danger">*</span></label>
                        {!! Form::select('sistema_constructivo', $sistema_constructivo,null, ['class' => 'form-control select2', 'id' => 'sistema_constructivo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="porton_principal" class="form-label text-uppercase" data-placeholder="porton_principal">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('porton_principal', $puertas_material,null, ['class' => 'form-control', 'id' => 'porton_principal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                {{-- @php
                    use Carbon\Carbon;
                    // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
                @endphp --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100">
                        <label for="fachada" class="form-label text-uppercase" data-placeholder="fachada">Fachada</label>
                        {!! Form::select('fachada', $tipo_fachada,null, ['class' => 'form-control', 'id' => 'fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="puertas" class="form-label text-uppercase" data-placeholder="puertas">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('puertas', $puertas_material,null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="muros" class="form-label text-uppercase" data-placeholder="muros">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('muros', $tipo_muro, null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="ventaneria" class="form-label text-uppercase" data-placeholder="ventaneria">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('ventaneria', $ventaneria,null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="techos" class="form-label text-uppercase" data-placeholder="techos">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('techos', $tipo_techo,null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group">
                        <label for="servicios_publicos" class="form-label text-uppercase" data-placeholder="servicios_publicos">Servicios Públicos</label>
                        {!! Form::text('servicios_publicos', null, ['class' => 'form-control', 'id' => 'servicios_publicos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="pisos" class="form-label text-uppercase" data-placeholder="pisos">Pisos<span class="text-danger">*</span></label>
                        {!! Form::text('pisos', null, ['class' => 'form-control text-uppercase', 'id' => 'pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="telefono" class="form-label text-uppercase" data-placeholder="telefono">Teléfono</label>
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="bano" class="form-label text-uppercase" data-placeholder="bano">Baños</label>
                        {!! Form::text('bano', null, ['class' => 'form-control', 'id' => 'bano']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="energia" class="form-label text-uppercase" data-placeholder="energia">Energía</label>
                        {!! Form::text('energia', null, ['class' => 'form-control', 'id' => 'energia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="cocina" class="form-label text-uppercase" data-placeholder="cocina">Cocina<span class="text-danger">*</span></label>
                        {!! Form::text('cocina', null, ['class' => 'form-control select2', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="agua" class="form-label text-uppercase" data-placeholder="agua">Agua<span class="text-danger">*</span></label>
                        {!! Form::text('agua', null, ['class' => 'form-control select2', 'id' => 'agua', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="meson" class="form-label text-uppercase" data-placeholder="meson">Mesón<span class="text-danger">*</span></label>
                        {!! Form::text('meson', null, ['class' => 'form-control select2', 'id' => 'meson', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="gas" class="form-label text-uppercase" data-placeholder="gas">Gas<span class="text-danger">*</span></label>
                        {!! Form::text('gas', null, ['class' => 'form-control select2', 'id' => 'gas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="observaciones_acabados_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_acabados_inmueble">Observaciones Acabados Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_acabados_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_acabados_inmueble', 'required']) !!}
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
