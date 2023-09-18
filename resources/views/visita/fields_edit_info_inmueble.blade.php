{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">información del inmueble</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="tipo_inmueble" class="form-label text-uppercase">Tipo Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_inmueble', collect(['' => 'Seleccionar...'])->union($tipo_inmueble), null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="tipo_vivienda" class="form-label text-uppercase">Tipo Vivienda<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_vivienda', collect(['' => 'Seleccionar...'])->union($tipo_vivienda),null, ['class' => 'form-control select2', 'id' => 'tipo_vivienda', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="uso_inmueble" class="form-label text-uppercase">Uso Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('uso_inmueble', collect(['' => 'Seleccionar...'])->union($uso_inmueble), null, ['class' => 'form-control select2', 'id' => 'uso_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="tipo_suelo" class="form-label text-uppercase">Tipo Suelo<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_suelo', collect(['' => 'Seleccionar...'])->union($tipo_suelo), null, ['class' => 'form-control select2', 'id' => 'tipo_suelo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                {{-- @php
                    use Carbon\Carbon;
                    // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
                @endphp --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="topografia" class="form-label text-uppercase">Topografía</label>
                        {!! Form::select('topografia', collect(['' => 'Seleccionar...'])->union($topografia),null, ['class' => 'form-control select2', 'id' => 'topografia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="forma" class="form-label text-uppercase">Forma<span class="text-danger">*</span></label>
                        {!! Form::select('forma', collect(['' => 'Seleccionar...'])->union($forma), null, ['class' => 'form-control select2', 'id' => 'forma', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="numero_pisos" class="form-label text-uppercase">Número Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('numero_pisos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), null, ['class' => 'form-control select2', 'id' => 'numero_pisos', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="valor_administracion" class="form-label text-uppercase">Valor Administracion<span class="text-danger">*</span></label>
                        {!! Form::text('valor_administracion', null, ['class' => 'form-control', 'id' => 'valor_administracion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="barrio" class="form-label text-uppercase">barrio</label>
                        {!! Form::text('barrio', null, ['class' => 'form-control', 'id' => 'barrio']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="remodelado" class="form-label text-uppercase">Remodelado</label>
                        {!! Form::select('remodelado', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'remodelado']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="altura" class="form-label text-uppercase">Altura</label>
                        {!! Form::text('altura', null, ['class' => 'form-control', 'id' => 'altura']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="frente" class="form-label text-uppercase">Frente</label>
                        {!! Form::text('frente', null, ['class' => 'form-control', 'id' => 'frente']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="fondo" class="form-label text-uppercase">Fondo<span class="text-danger">*</span></label>
                        {!! Form::text('fondo', null, ['class' => 'form-control text-uppercase', 'id' => 'fondo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_libre_mcuadrado" class="form-label text-uppercase">Área Libre M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_libre_mcuadrado', null, ['class' => 'form-control', 'id' => 'area_libre_mcuadrado', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="anio_cosntruccion" class="form-label text-uppercase">Año De Construcción<span class="text-danger">*</span></label>
                        {!! Form::text('anio_cosntruccion', null, ['class' => 'form-control', 'id' => 'anio_cosntruccion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_construida" class="form-label text-uppercase">Área Construida M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_construida', null, ['class' => 'form-control', 'id' => 'area_construida', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="area_patios_vacio" class="form-label text-uppercase">Área Patios - vacio M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_patios_vacio', null, ['class' => 'form-control', 'id' => 'area_patios_vacio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="condicion_inmueble" class="form-label text-uppercase">Condición Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('condicion_inmueble', collect(['' => 'Seleccionar...'])->union($condicion_inmueble), null, ['class' => 'form-control select2', 'id' => 'condicion_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="anio_remodelacion" class="form-label text-uppercase">Año Remodelación<span class="text-danger">*</span></label>
                        {!! Form::text('anio_remodelacion', null, ['class' => 'form-control', 'id' => 'anio_remodelacion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porcentaje_depreciacion" class="form-label text-uppercase">% depreciación<span class="text-danger">*</span></label>
                        {!! Form::text('porcentaje_depreciacion', null, ['class' => 'form-control', 'id' => 'porcentaje_depreciacion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="calificacion_fitto_corvini" class="form-label text-uppercase">CALIFICACIÓN (FITTO CORVINI)<span class="text-danger">*</span></label>
                        {!! Form::select('calificacion_fitto_corvini', collect(['' => 'Seleccionar...'])->union($calificacion_fitto_corvini), null, ['class' => 'form-control select2', 'id' => 'calificacion_fitto_corvini', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vida_util_anios" class="form-label text-uppercase">vida útil en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida_util_anios', null, ['class' => 'form-control', 'id' => 'vida_util_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vetustez_anios" class="form-label text-uppercase">vetustez en años<span class="text-danger">*</span></label>
                        {!! Form::text('vetustez_anios', null, ['class' => 'form-control', 'id' => 'vetustez_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vida permanente_anios" class="form-label text-uppercase">vida permanente en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida permanente_anios', null, ['class' => 'form-control', 'id' => 'vida permanente_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                {{-- ======================= --}}
                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="observaciones_info_inmueble" class="form-label text-uppercase">Observaciones Información Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_info_inmueble', null, ['class' => 'form-control', 'id' => 'observaciones_info_inmueble', 'required']) !!}
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
