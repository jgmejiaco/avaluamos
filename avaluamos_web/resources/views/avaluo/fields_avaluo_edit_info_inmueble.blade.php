{!! Form::open(['method' => 'POST', 'route' => ['avaluo_info_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_info_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        {!! Form::hidden('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
        <div class="mb-5">
            <h2 class="text-uppercase">información del inmueble</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_vivienda" class="form-label text-uppercase">Tipo Vivienda<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_vivienda', collect(['' => 'Seleccionar...'])->union($tipo_vivienda), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_vivienda : null, ['class' => 'form-control select2', 'id' => 'id_tipo_vivienda', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_uso_inmueble" class="form-label text-uppercase">Uso Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('id_uso_inmueble', collect(['' => 'Seleccionar...'])->union($uso_inmueble), isset($calcularAvaluo) ? $calcularAvaluo->id_uso_inmueble : null, ['class' => 'form-control select2', 'id' => 'id_uso_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_tipo_suelo" class="form-label text-uppercase">Tipo Suelo<span class="text-danger">*</span></label>
                        {!! Form::select('id_tipo_suelo', collect(['' => 'Seleccionar...'])->union($tipo_suelo), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_suelo : null, ['class' => 'form-control select2', 'id' => 'id_tipo_suelo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_topografia" class="form-label text-uppercase">Topografía</label>
                        {!! Form::select('id_topografia', collect(['' => 'Seleccionar...'])->union($topografia), isset($calcularAvaluo) ? $calcularAvaluo->id_topografia : null, ['class' => 'form-control select2', 'id' => 'id_topografia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_forma" class="form-label text-uppercase">Forma<span class="text-danger">*</span></label>
                        {!! Form::select('id_forma', collect(['' => 'Seleccionar...'])->union($forma), isset($calcularAvaluo) ? $calcularAvaluo->id_forma : null, ['class' => 'form-control select2', 'id' => 'id_forma', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="pisos_inmueble" class="form-label text-uppercase">Número Pisos Inmueble</label>
                        {!! Form::select('pisos_inmueble', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->pisos_inmueble : null, ['class' => 'form-control select2', 'id' => 'pisos_inmueble']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="pisos_edificio" class="form-label text-uppercase">Número Pisos Edificio</label>
                        {!! Form::select('pisos_edificio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->pisos_edificio : null, ['class' => 'form-control select2', 'id' => 'pisos_edificio']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="valor_administracion" class="form-label text-uppercase">Valor Administracion</label>
                        {!! Form::text('valor_administracion', isset($calcularAvaluo) ? $calcularAvaluo->valor_administracion : null, ['class' => 'form-control', 'id' => 'valor_administracion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="altura" class="form-label text-uppercase">Altura</label>
                        {!! Form::text('altura', isset($calcularAvaluo) ? $calcularAvaluo->altura : null, ['class' => 'form-control', 'id' => 'altura']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="frente" class="form-label text-uppercase">Frente</label>
                        {!! Form::text('frente', isset($calcularAvaluo) ? $calcularAvaluo->frente : null, ['class' => 'form-control', 'id' => 'frente']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="fondo" class="form-label text-uppercase">Fondo</label>
                        {!! Form::text('fondo', isset($calcularAvaluo) ? $calcularAvaluo->fondo : null, ['class' => 'form-control text-uppercase', 'id' => 'fondo']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                
                {{-- <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="barrio" class="form-label text-uppercase">barrio</label>
                        {!! Form::text('barrio', null, ['class' => 'form-control', 'id' => 'barrio']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}

                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="remodelado" class="form-label text-uppercase">Remodelado</label>
                        {!! Form::select('remodelado', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->remodelado : null, ['class' => 'form-control select2', 'id' => 'remodelado']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_libre" class="form-label text-uppercase">Área Libre M<sup>2</sup></label>
                        {!! Form::text('area_libre', isset($calcularAvaluo) ? $calcularAvaluo->area_libre : null, ['class' => 'form-control', 'id' => 'area_libre']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="anios_construccion" class="form-label text-uppercase">Año De Construcción<span class="text-danger">*</span></label>
                        {!! Form::text('anios_construccion', null, ['class' => 'form-control', 'id' => 'anios_construccion', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="anios_remodelacion" class="form-label text-uppercase">Año Remodelación</label>
                        {!! Form::text('anios_remodelacion', isset($calcularAvaluo) ? $calcularAvaluo->anios_remodelacion : null, ['class' => 'form-control', 'id' => 'anios_remodelacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_construida" class="form-label text-uppercase">Área Construida M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_construida', null, ['class' => 'form-control', 'id' => 'area_construida', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_patios" class="form-label text-uppercase">Área Patios - vacio M<sup>2</sup></label>
                        {!! Form::text('area_patios', isset($calcularAvaluo) ? $calcularAvaluo->area_patios : null, ['class' => 'form-control', 'id' => 'area_patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_condicion_inmueble" class="form-label text-uppercase">Condición Inmueble</label>
                        {!! Form::select('id_condicion_inmueble', collect(['' => 'Seleccionar...'])->union($condicion_inmueble), isset($calcularAvaluo) ? $calcularAvaluo->id_condicion_inmueble : null, ['class' => 'form-control select2', 'id' => 'id_condicion_inmueble']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porcentaje_depreciacion" class="form-label text-uppercase">% depreciación<span class="text-danger">*</span></label>
                        {!! Form::text('porcentaje_depreciacion', null, ['class' => 'form-control', 'id' => 'porcentaje_depreciacion', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_fitto_corvini" class="form-label text-uppercase">CALIFICACIÓN (FITTO CORVINI)<span class="text-danger">*</span></label>
                        {!! Form::select('id_fitto_corvini', collect(['' => 'Seleccionar...'])->union($calificacion_fitto_corvini), null, ['class' => 'form-control select2', 'id' => 'id_fitto_corvini', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vida_util_anios" class="form-label text-uppercase">vida útil en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida_util_anios', null, ['class' => 'form-control', 'id' => 'vida_util_anios', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vetustez_anios" class="form-label text-uppercase">vetustez en años<span class="text-danger">*</span></label>
                        {!! Form::text('vetustez_anios', null, ['class' => 'form-control', 'id' => 'vetustez_anios', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                
                {{-- <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vida_permanente_anios" class="form-label text-uppercase">vida permanente en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida_permanente_anios', null, ['class' => 'form-control', 'id' => 'vida_permanente_anios', 'required']) !!}
                    </div>
                </div> --}}

                {{-- ======================= --}}
                {{-- ======================= --}}
                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_info_inmueble" class="form-label text-uppercase">Observaciones Información Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_info_inmueble',  isset($calcularAvaluo) ? $calcularAvaluo->obs_info_inmueble : null, ['class' => 'form-control', 'id' => 'obs_info_inmueble', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Info Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
