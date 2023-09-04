{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">CARACTERÍSTICAS DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="cocina" class="form-label text-uppercase" data-placeholder="cocina">Cocina<span class="text-danger">*</span></label>
                        {!! Form::select('cocina', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'cocina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="numero_habitaciones" class="form-label text-uppercase" data-placeholder="numero_habitaciones">Número Habitaciones<span class="text-danger">*</span></label>
                        {!! Form::select('numero_habitaciones', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'numero_habitaciones', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                {{-- @php
                    use Carbon\Carbon;
                    // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
                @endphp --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100">
                        <label for="sala" class="form-label text-uppercase" data-placeholder="sala">Sala</label>
                        {!! Form::select('sala', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'sala']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="habitacion_servicio" class="form-label text-uppercase" data-placeholder="habitacion_servicio">Habitacion Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('habitacion_servicio', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'habitacion_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="comedor" class="form-label text-uppercase" data-placeholder="comedor">Comedor<span class="text-danger">*</span></label>
                        {!! Form::select('comedor', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'comedor', 'required']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="bano_servicio" class="form-label text-uppercase" data-placeholder="bano_servicio">Baño Servicio<span class="text-danger">*</span></label>
                        {!! Form::select('bano_servicio', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'bano_servicio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="balcon" class="form-label text-uppercase" data-placeholder="balcon">Balcón<span class="text-danger">*</span></label>
                        {!! Form::select('balcon', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'balcon', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group">
                        <label for="zona_ropas" class="form-label text-uppercase" data-placeholder="zona_ropas">Zona Ropas</label>
                        {!! Form::select('zona_ropas', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'zona_ropas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="bano_social" class="form-label text-uppercase" data-placeholder="bano_social">Baño Social<span class="text-danger">*</span></label>
                        {!! Form::select('bano_social', $indicador_numerico,null, ['class' => 'form-control text-uppercase', 'id' => 'bano_social', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="estudio" class="form-label text-uppercase" data-placeholder="estudio">Estudio</label>
                        {!! Form::select('estudio', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'estudio']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="bano_privado" class="form-label text-uppercase" data-placeholder="bano_privado">Baño Privado</label>
                        {!! Form::select('bano_privado', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'bano_privado']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="patios" class="form-label text-uppercase" data-placeholder="patios">Patios</label>
                        {!! Form::select('patios', $indicador_numerico,null, ['class' => 'form-control', 'id' => 'patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="vestier" class="form-label text-uppercase" data-placeholder="vestier">Vestier<span class="text-danger">*</span></label>
                        {!! Form::select('vestier', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'vestier', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="escalas_emergencia" class="form-label text-uppercase" data-placeholder="escalas_emergencia">Escalas Emergencia<span class="text-danger">*</span></label>
                        {!! Form::select('escalas_emergencia', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'escalas_emergencia', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="closet" class="form-label text-uppercase" data-placeholder="closet">Closet<span class="text-danger">*</span></label>
                        {!! Form::select('closet', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'closet', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="shut_basura" class="form-label text-uppercase" data-placeholder="shut_basura">Shut de Basuras<span class="text-danger">*</span></label>
                        {!! Form::select('shut_basura', $indicador_numerico,null, ['class' => 'form-control select2', 'id' => 'shut_basura', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="observaciones_caracteristicas_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_caracteristicas_inmueble">Observaciones Características del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_caracteristicas_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_caracteristicas_inmueble', 'required']) !!}
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
