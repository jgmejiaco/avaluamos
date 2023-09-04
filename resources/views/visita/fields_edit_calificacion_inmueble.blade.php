{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">CALIFICACIÓN DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="estructura" class="form-label text-uppercase" data-placeholder="estructura">Estructura<span class="text-danger">*</span></label>
                        {!! Form::text('estructura', null, ['class' => 'form-control select2', 'id' => 'estructura', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="porton_principal" class="form-label text-uppercase" data-placeholder="porton_principal">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::text('porton_principal', null, ['class' => 'form-control', 'id' => 'porton_principal', 'required']) !!}
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
                        {!! Form::text('fachada', null, ['class' => 'form-control', 'id' => 'fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="puertas" class="form-label text-uppercase" data-placeholder="puertas">Puertas<span class="text-danger">*</span></label>
                        {!! Form::text('puertas', null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="muros" class="form-label text-uppercase" data-placeholder="muros">Muros<span class="text-danger">*</span></label>
                        {!! Form::text('muros', null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="ventaneria" class="form-label text-uppercase" data-placeholder="ventaneria">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::text('ventaneria', null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="techos" class="form-label text-uppercase" data-placeholder="techos">Techos<span class="text-danger">*</span></label>
                        {!! Form::text('techos', null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group">
                        <label for="carpinteria" class="form-label text-uppercase" data-placeholder="carpinteria">Carpintería</label>
                        {!! Form::text('carpinteria', null, ['class' => 'form-control', 'id' => 'carpinteria']) !!}
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
                        <label for="ventilacion" class="form-label text-uppercase" data-placeholder="ventilacion">Ventilación</label>
                        {!! Form::text('ventilacion', null, ['class' => 'form-control', 'id' => 'ventilacion']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="cocina" class="form-label text-uppercase" data-placeholder="cocina">Cocina</label>
                        {!! Form::text('cocina', null, ['class' => 'form-control', 'id' => 'cocina']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="iluminacion" class="form-label text-uppercase" data-placeholder="iluminacion">Iluminación</label>
                        {!! Form::text('iluminacion', null, ['class' => 'form-control', 'id' => 'iluminacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="banos" class="form-label text-uppercase" data-placeholder="banos">Baños<span class="text-danger">*</span></label>
                        {!! Form::text('banos', null, ['class' => 'form-control select2', 'id' => 'banos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="distribucion" class="form-label text-uppercase" data-placeholder="distribucion">Distribución<span class="text-danger">*</span></label>
                        {!! Form::text('distribucion', null, ['class' => 'form-control select2', 'id' => 'distribucion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="zona_ropas" class="form-label text-uppercase" data-placeholder="zona_ropas">Zona Ropas<span class="text-danger">*</span></label>
                        {!! Form::text('zona_ropas', null, ['class' => 'form-control select2', 'id' => 'zona_ropas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="humedades" class="form-label text-uppercase" data-placeholder="humedades">Humedades<span class="text-danger">*</span></label>
                        {!! Form::text('humedades', null, ['class' => 'form-control select2', 'id' => 'humedades', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="observaciones_calificacion_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_calificacion_inmueble">Observaciones Calificacion del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_calificacion_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_calificacion_inmueble', 'required']) !!}
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
