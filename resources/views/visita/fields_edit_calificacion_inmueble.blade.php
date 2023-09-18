{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">CALIFICACIÓN DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="estructura" class="form-label text-uppercase">Estructura<span class="text-danger">*</span></label>
                        {!! Form::select('estructura', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'estructura', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porton_principal" class="form-label text-uppercase">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('porton_principal', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'porton_principal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="fachada" class="form-label text-uppercase">Fachada</label>
                        {!! Form::select('fachada', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="puertas" class="form-label text-uppercase">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('puertas', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="muros" class="form-label text-uppercase">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('muros', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="ventaneria" class="form-label text-uppercase">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('ventaneria', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="techos" class="form-label text-uppercase">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('techos', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="carpinteria" class="form-label text-uppercase">Carpintería</label>
                        {!! Form::select('carpinteria', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'carpinteria']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="pisos" class="form-label text-uppercase">Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('pisos', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="ventilacion" class="form-label text-uppercase">Ventilación</label>
                        {!! Form::select('ventilacion', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'ventilacion']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="cocina" class="form-label text-uppercase">Cocina</label>
                        {!! Form::select('cocina', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'cocina']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="iluminacion" class="form-label text-uppercase">Iluminación</label>
                        {!! Form::select('iluminacion', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'iluminacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="banios" class="form-label text-uppercase">Baños<span class="text-danger">*</span></label>
                        {!! Form::select('banios', $calificacion_general, null, ['class' => 'form-control select2', 'id' => 'banios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="distribucion" class="form-label text-uppercase">Distribución<span class="text-danger">*</span></label>
                        {!! Form::select('distribucion', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'distribucion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_ropas" class="form-label text-uppercase">Zona Ropas<span class="text-danger">*</span></label>
                        {!! Form::select('zona_ropas', collect(['' => 'Seleccionar...'])->union($calificacion_general), null, ['class' => 'form-control select2', 'id' => 'zona_ropas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="humedades" class="form-label text-uppercase">Humedades<span class="text-danger">*</span></label>
                        {!! Form::select('humedades', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'humedades', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_acabados_inmueble" class="form-label text-uppercase">Observaciones Calificacion del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_acabados_inmueble', null, ['class' => 'form-control', 'id' => 'obs_acabados_inmueble', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Calificacion Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
