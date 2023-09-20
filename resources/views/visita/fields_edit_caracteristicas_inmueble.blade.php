{!! Form::open(['method' => 'POST', 'route' => ['visita_caracteristicas_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_caracteristicas_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        {!! Form::text('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
        <div class="mb-5">
            <h2 class="text-uppercase">CARACTERÍSTICAS DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cocinas" class="form-label text-uppercase">Cocina<span class="text-danger">*</span></label>
                        {!! Form::select('cocinas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'select2', 'id' => 'cocinas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="habitaciones" class="form-label text-uppercase">Número Habitaciones<span class="text-danger">*</span></label>
                        {!! Form::select('habitaciones', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'select2', 'id' => 'habitaciones', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="salas" class="form-label text-uppercase">Sala</label>
                        {!! Form::select('salas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'salas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="habitaciones_servicio" class="form-label text-uppercase">Habitacion Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('habitaciones_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'habitaciones_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="comedores" class="form-label text-uppercase">Comedor<span class="text-danger">*</span></label>
                        {!! Form::select('comedores', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'comedores', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_servicio" class="form-label text-uppercase">Baño Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('banios_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'banios_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="balcones" class="form-label text-uppercase">Balcón<span class="text-danger">*</span></label>
                        {!! Form::select('balcones', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'balcones', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_ropa" class="form-label text-uppercase">Zona Ropas</label>
                        {!! Form::select('zona_ropa', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'zona_ropa']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_social" class="form-label text-uppercase">Baño Social<span class="text-danger">*</span></label>
                        {!! Form::select('banios_social', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'banios_social', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="estudios" class="form-label text-uppercase">Estudio</label>
                        {!! Form::select('estudios', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'estudios']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_privado" class="form-label text-uppercase">Baño Privado</label>
                        {!! Form::select('banios_privado', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'banios_privado']) !!}
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
                        <label for="escala_emergencia" class="form-label text-uppercase">Escalas Emergencia<span class="text-danger">*</span></label>
                        {!! Form::select('escala_emergencia', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'escala_emergencia', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="closets" class="form-label text-uppercase">Closet<span class="text-danger">*</span></label>
                        {!! Form::select('closets', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'closets', 'required']) !!}
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
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_parqueaderos" class="form-label text-uppercase">Cantidad Parqueaderos</label>
                        {!! Form::select('cant_parqueaderos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_parqueaderos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_cuarto util" class="form-label text-uppercase">Cantidad Cuartos Útiles</label>
                        {!! Form::select('cant_cuarto_util', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_cuarto util']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_kioscos" class="form-label text-uppercase">Cantidad Kioscos</label>
                        {!! Form::select('cant_kioscos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_kioscos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_piscinas" class="form-label text-uppercase">Cantidad Piscinas</label>
                        {!! Form::select('cant_piscinas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_piscinas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_establos" class="form-label text-uppercase">Cantidad Establos</label>
                        {!! Form::select('cant_establos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_establos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_billares" class="form-label text-uppercase">Cantidad Billares</label>
                        {!! Form::select('cant_billares', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'cant_billares']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column" data-validate="State Is Required">
                        <label for="obs_caract_inmueble" class="form-label text-uppercase">Observaciones Características del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_caract_inmueble', null, ['class' => 'form-control', 'id' => 'obs_caract_inmueble', 'required']) !!}
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
