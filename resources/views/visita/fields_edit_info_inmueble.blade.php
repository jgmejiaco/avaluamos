{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">3 - información del inmueble</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="tipo_vivienda" class="form-label text-uppercase" data-placeholder="tipo">Tipo Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_vivienda', $tipo_vivienda,null, ['class' => 'form-control select2', 'id' => 'tipo_vivienda', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="tipo_inmueble" class="form-label text-uppercase" data-placeholder="tipo_inmueble">Tipo Vivienda<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_inmueble', $tipo_inmueble,null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="uso_inmueble" class="form-label text-uppercase" data-placeholder="uso_inmueble">Uso Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('uso_inmueble', $uso_inmueble,null, ['class' => 'form-control', 'id' => 'uso_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="tipo_suelo" class="form-label text-uppercase" data-placeholder="tipo_suelo">Tipo Suelo<span class="text-danger">*</span></label>
                        {!! Form::select('tipo_suelo', $tipo_suelo, null, ['class' => 'form-control', 'id' => 'tipo_suelo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                {{-- @php
                    use Carbon\Carbon;
                    // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
                @endphp --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100">
                        <label for="topografia" class="form-label text-uppercase" data-placeholder="topografia">Topografía</label>
                        {!! Form::select('topografia', $topografia,null, ['class' => 'form-control', 'id' => 'topografia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="forma" class="form-label text-uppercase" data-placeholder="forma">Forma<span class="text-danger">*</span></label>
                        {!! Form::select('forma', $forma,null, ['class' => 'form-control select2', 'id' => 'forma', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="numero_pisos" class="form-label text-uppercase" data-placeholder="numero_pisos">Número Pisos<span class="text-danger">*</span></label>
                        {!! Form::select('numero_pisos', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'numero_pisos', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="frente" class="form-label text-uppercase" data-placeholder="frente">Frente<span class="text-danger">*</span></label>
                        {!! Form::text('frente', null, ['class' => 'form-control select2', 'id' => 'frente', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="valor_administracion" class="form-label text-uppercase" data-placeholder="valor_administracion">Valor Administracion<span class="text-danger">*</span></label>
                        {!! Form::text('valor_administracion', null, ['class' => 'form-control select2', 'id' => 'valor_administracion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group">
                        <label for="barrio" class="form-label text-uppercase" data-placeholder="barrio">barrio</label>
                        {!! Form::text('barrio', null, ['class' => 'form-control', 'id' => 'barrio']) !!}
                        {{-- <span class="focus-input100" data-placeholder="Phone"></span> --}}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="fondo" class="form-label text-uppercase" data-placeholder="fondo">Fondo<span class="text-danger">*</span></label>
                        {!! Form::text('fondo', null, ['class' => 'form-control text-uppercase', 'id' => 'fondo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="remodelado" class="form-label text-uppercase" data-placeholder="remodelado">Remodelado</label>
                        {!! Form::select('remodelado', $si_no,null, ['class' => 'form-control', 'id' => 'remodelado']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="altura" class="form-label text-uppercase" data-placeholder="altura">Altura</label>
                        {!! Form::text('altura', null, ['class' => 'form-control', 'id' => 'altura']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="altura" class="form-label text-uppercase" data-placeholder="altura">Altura</label>
                        {!! Form::text('altura', null, ['class' => 'form-control', 'id' => 'altura']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="area_libre_mcuadrado" class="form-label text-uppercase" data-placeholder="area_libre_mcuadrado">Área Libre M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_libre_mcuadrado', null, ['class' => 'form-control select2', 'id' => 'area_libre_mcuadrado', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="anio_cosntruccion" class="form-label text-uppercase" data-placeholder="anio_cosntruccion">Año De Construcción<span class="text-danger">*</span></label>
                        {!! Form::text('anio_cosntruccion', null, ['class' => 'form-control select2', 'id' => 'anio_cosntruccion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="area_construida" class="form-label text-uppercase" data-placeholder="area_construida">Área Construida M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_construida', null, ['class' => 'form-control select2', 'id' => 'area_construida', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="area_patios_vacio" class="form-label text-uppercase" data-placeholder="area_patios_vacio">Área Patios - vacio M<sup>2</sup><span class="text-danger">*</span></label>
                        {!! Form::text('area_patios_vacio', null, ['class' => 'form-control select2', 'id' => 'area_patios_vacio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="condicion_inmueble" class="form-label text-uppercase" data-placeholder="condicion_inmueble">Condición Inmueble<span class="text-danger">*</span></label>
                        {!! Form::select('condicion_inmueble', $condicion_inmueble, null, ['class' => 'form-control select2', 'id' => 'condicion_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="anio_remodelacion" class="form-label text-uppercase" data-placeholder="anio_remodelacion">Año Remodelación<span class="text-danger">*</span></label>
                        {!! Form::text('anio_remodelacion', null, ['class' => 'form-control select2', 'id' => 'anio_remodelacion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="porcentaje_depreciacion" class="form-label text-uppercase" data-placeholder="porcentaje_depreciacion">% depreciación<span class="text-danger">*</span></label>
                        {!! Form::text('porcentaje_depreciacion', null, ['class' => 'form-control select2', 'id' => 'porcentaje_depreciacion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="calificacion_fitto_corvini" class="form-label text-uppercase" data-placeholder="calificacion_fitto_corvini">CALIFICACIÓN (FITTO CORVINI)<span class="text-danger">*</span></label>
                        {!! Form::select('calificacion_fitto_corvini', $calificacion_fitto_corvini,null, ['class' => 'form-control select2', 'id' => 'calificacion_fitto_corvini', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="vida_util_anios" class="form-label text-uppercase" data-placeholder="vida_util_anios">vida útil en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida_util_anios', null, ['class' => 'form-control select2', 'id' => 'vida_util_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="vetustez_anios" class="form-label text-uppercase" data-placeholder="vetustez_anios">vetustez en años<span class="text-danger">*</span></label>
                        {!! Form::text('vetustez_anios', null, ['class' => 'form-control select2', 'id' => 'vetustez_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="vida permanente_anios" class="form-label text-uppercase" data-placeholder="vida permanente_anios">vida permanente en años<span class="text-danger">*</span></label>
                        {!! Form::text('vida permanente_anios', null, ['class' => 'form-control select2', 'id' => 'vida permanente_anios', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                {{-- ======================= --}}
                {{-- ======================= --}}

                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="observaciones_info_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_info_inmueble">Observaciones Información Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_info_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_info_inmueble', 'required']) !!}
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
