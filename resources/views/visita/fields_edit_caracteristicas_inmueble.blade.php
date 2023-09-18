{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">CARACTERÍSTICAS DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cocina" class="form-label text-uppercase">Cocina<span class="text-danger">*</span></label>
                        {!! Form::select('cocina', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'select2', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="numero_habitaciones" class="form-label text-uppercase">Número Habitaciones<span class="text-danger">*</span></label>
                        {!! Form::select('numero_habitaciones', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'select2', 'id' => 'numero_habitaciones', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="sala" class="form-label text-uppercase">Sala</label>
                        {!! Form::select('sala', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'sala']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="habitacion_servicio" class="form-label text-uppercase">Habitacion Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('habitacion_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'habitacion_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="comedor" class="form-label text-uppercase">Comedor<span class="text-danger">*</span></label>
                        {!! Form::select('comedor', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'comedor', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="bano_servicio" class="form-label text-uppercase">Baño Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('bano_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'bano_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="balcon" class="form-label text-uppercase">Balcón<span class="text-danger">*</span></label>
                        {!! Form::select('balcon', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'balcon', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_ropas" class="form-label text-uppercase">Zona Ropas</label>
                        {!! Form::select('zona_ropas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'zona_ropas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="bano_social" class="form-label text-uppercase">Baño Social<span class="text-danger">*</span></label>
                        {!! Form::select('bano_social', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'bano_social', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="estudio" class="form-label text-uppercase">Estudio</label>
                        {!! Form::select('estudio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'estudio']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="bano_privado" class="form-label text-uppercase">Baño Privado</label>
                        {!! Form::select('bano_privado', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'bano_privado']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="patios" class="form-label text-uppercase">Patios</label>
                        {!! Form::select('patios', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vestier" class="form-label text-uppercase">Vestier<span class="text-danger">*</span></label>
                        {!! Form::select('vestier', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'vestier', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="escalas_emergencia" class="form-label text-uppercase">Escalas Emergencia<span class="text-danger">*</span></label>
                        {!! Form::select('escalas_emergencia', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'escalas_emergencia', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="closet" class="form-label text-uppercase">Closet<span class="text-danger">*</span></label>
                        {!! Form::select('closet', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'closet', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="shut_basura" class="form-label text-uppercase">Shut de Basuras<span class="text-danger">*</span></label>
                        {!! Form::select('shut_basura', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'shut_basura', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column" data-validate="State Is Required">
                        <label for="observaciones_caracteristicas_inmueble" class="form-label text-uppercase">Observaciones Características del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_caracteristicas_inmueble', null, ['class' => 'form-control', 'id' => 'observaciones_caracteristicas_inmueble', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Características Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
