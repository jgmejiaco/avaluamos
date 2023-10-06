{!! Form::open(['method' => 'POST', 'route' => ['visita_calificacion_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_calificacion_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">CALIFICACIÓN DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_estructura" class="form-label text-uppercase">Estructura<span class="text-danger">*</span></label>
                        {!! Form::select('cal_estructura', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_estructura : null, ['class' => 'form-control select2', 'id' => 'cal_estructura', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_porton_ppal" class="form-label text-uppercase">Portón Principal<span class="text-danger">*</span></label>
                        {!! Form::select('cal_porton_ppal', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_porton_ppal : null, ['class' => 'form-control select2', 'id' => 'cal_porton_ppal', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_fachada" class="form-label text-uppercase">Fachada</label>
                        {!! Form::select('cal_fachada', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_fachada : null, ['class' => 'form-control select2', 'id' => 'cal_fachada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_puertas" class="form-label text-uppercase">Puertas<span class="text-danger">*</span></label>
                        {!! Form::select('cal_puertas', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_puertas : null, ['class' => 'form-control select2', 'id' => 'cal_puertas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_muros" class="form-label text-uppercase">Muros<span class="text-danger">*</span></label>
                        {!! Form::select('cal_muros', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_muros : null, ['class' => 'form-control select2', 'id' => 'cal_muros', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_ventaneria" class="form-label text-uppercase">Ventaneria<span class="text-danger">*</span></label>
                        {!! Form::select('cal_ventaneria', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_ventaneria : null, ['class' => 'form-control select2', 'id' => 'cal_ventaneria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_techos" class="form-label text-uppercase">Techos<span class="text-danger">*</span></label>
                        {!! Form::select('cal_techos', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_techos : null, ['class' => 'form-control select2', 'id' => 'cal_techos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_carpinteria" class="form-label text-uppercase">Carpintería</label>
                        {!! Form::select('cal_carpinteria', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_carpinteria : null, ['class' => 'form-control select2', 'id' => 'cal_carpinteria']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_pisos" class="form-label text-uppercase">Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('cal_pisos', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_pisos : null, ['class' => 'form-control select2', 'id' => 'cal_pisos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_ventilacion" class="form-label text-uppercase">Ventilación</label>
                        {!! Form::select('cal_ventilacion', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_ventilacion : null, ['class' => 'form-control select2', 'id' => 'cal_ventilacion']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_cocina" class="form-label text-uppercase">Cocina</label>
                        {!! Form::select('cal_cocina', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_cocina : null, ['class' => 'form-control select2', 'id' => 'cal_cocina']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_iluminacion" class="form-label text-uppercase">Iluminación</label>
                        {!! Form::select('cal_iluminacion', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_iluminacion : null, ['class' => 'form-control select2', 'id' => 'cal_iluminacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_banios" class="form-label text-uppercase">Baños<span class="text-danger">*</span></label>
                        {!! Form::select('cal_banios', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_banios : null, ['class' => 'form-control select2', 'id' => 'cal_banios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_distribucion" class="form-label text-uppercase">Distribución<span class="text-danger">*</span></label>
                        {!! Form::select('cal_distribucion', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_distribucion : null, ['class' => 'form-control select2', 'id' => 'cal_distribucion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_zona_ropas" class="form-label text-uppercase">Zona Ropas<span class="text-danger">*</span></label>
                        {!! Form::select('cal_zona_ropas', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_zona_ropas : null, ['class' => 'form-control select2', 'id' => 'cal_zona_ropas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_patios" class="form-label text-uppercase">Patios<span class="text-danger">*</span></label>
                        {!! Form::select('cal_patios', collect(['' => 'Seleccionar...'])->union($calificacion_general), isset($calcularAvaluo) ? $calcularAvaluo->cal_patios : null, ['class' => 'form-control select2', 'id' => 'cal_patios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cal_humedades" class="form-label text-uppercase">Humedades<span class="text-danger">*</span></label>
                        {!! Form::select('cal_humedades', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->cal_humedades : null, ['class' => 'form-control select2', 'id' => 'cal_humedades', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_calificacion_inmueble" class="form-label text-uppercase">Observaciones Calificacion del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_calificacion_inmueble', isset($calcularAvaluo) ? $calcularAvaluo->obs_calificacion_inmueble : null, ['class' => 'form-control', 'id' => 'obs_calificacion_inmueble', 'required']) !!}
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
