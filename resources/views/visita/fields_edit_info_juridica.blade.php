{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">INFORMACIÓN JURÍDICA</h2>
            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="propietario_1" class="form-label text-uppercase" data-placeholder="propietario_1">propietario 1<span class="text-danger">*</span></label>
                        {!! Form::text('propietario_1', old('propietario_1'), ['class' => 'form-control text-uppercase', 'id' => 'propietario_1', 'required']) !!}
                    </div>
                    {{-- {!! Form::hidden('id_solicitante', isset($usuario) ? $usuario->id_solicitante : null, ['class' => 'input100', 'id' => 'id_solicitante']) !!} --}}
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="cedula_propietario_1" class="form-label text-uppercase" data-placeholder="cedula_propietario_1">cédula propietario 1<span class="text-danger">*</span></label>
                        {!! Form::text('cedula_propietario_1', old('cedula_propietario_1'), ['class' => 'form-control text-uppercase', 'id' => 'cedula_propietario_1', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="propietario_2" class="form-label text-uppercase" data-placeholder="propietario_2">propietario 2<span class="text-danger">*</span></label>
                        {!! Form::text('propietario_2', old('propietario_2'), ['class' => 'form-control text-uppercase', 'id' => 'propietario_2', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="cedula_propietario_2" class="form-label text-uppercase" data-placeholder="cedula_propietario_2">cédula propietario 2<span class="text-danger">*</span></label>
                        {!! Form::text('cedula_propietario_2', old('cedula_propietario_2'), ['class' => 'form-control text-uppercase', 'id' => 'cedula_propietario_2', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="matricula_inmueble" class="form-label text-uppercase" data-placeholder="matricula_inmueble">Matrícula Inmueble<span class="text-danger">*</span></label>
                        {!! Form::text('matricula_inmueble', null, ['class' => 'form-control select2', 'id' => 'matricula_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="coeficiente_copropiedad" class="form-label text-uppercase" data-placeholder="coeficiente_copropiedad">Coeficiente Copropiedad<span class="text-danger">*</span></label>
                        {!! Form::text('coeficiente_copropiedad', null, ['class' => 'form-control select2', 'id' => 'coeficiente_copropiedad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="certificado_libertad" class="form-label text-uppercase" data-placeholder="certificado_libertad">Certificado Libertad<span class="text-danger">*</span></label>
                        {!! Form::text('certificado_libertad', null, ['class' => 'form-control select2', 'id' => 'certificado_libertad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="escritura_publica" class="form-label text-uppercase" data-placeholder="escritura_publica">Escritura Pública<span class="text-danger">*</span></label>
                        {!! Form::text('escritura_publica', null, ['class' => 'form-control select2', 'id' => 'escritura_publica', 'required']) !!}
                        {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="notaria" class="form-label text-uppercase" data-placeholder="notaria">Notaría<span class="text-danger">*</span></label>
                        {!! Form::text('notaria', null, ['class' => 'form-control select2', 'id' => 'notaria', 'required']) !!}
                        {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="impuesto_predial_anual" class="form-label text-uppercase" data-placeholder="impuesto_predial_anual">Impuesto Predial Anual<span class="text-danger">*</span></label>
                        {!! Form::text('impuesto_predial_anual', null, ['class' => 'form-control select2', 'id' => 'impuesto_predial_anual', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="administracion" class="form-label text-uppercase" data-placeholder="administracion">Administración<span class="text-danger">*</span></label>
                        {!! Form::text('administracion', null, ['class' => 'form-control select2', 'id' => 'administracion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="avaluo_catastral" class="form-label text-uppercase" data-placeholder="avaluo_catastral">Avaluo Catastral<span class="text-danger">*</span></label>
                        {!! Form::text('avaluo_catastral', null, ['class' => 'form-control select2', 'id' => 'avaluo_catastral', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="normas_usos" class="form-label text-uppercase" data-placeholder="normas_usos">Normas y Usos<span class="text-danger">*</span></label>
                        {!! Form::textarea('normas_usos', null, ['class' => 'form-control select2', 'id' => 'normas_usos', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="mejor_mayor_uso" class="form-label text-uppercase" data-placeholder="mejor_mayor_uso">Mejor y Mayor Uso<span class="text-danger">*</span></label>
                        {!! Form::textarea('mejor_mayor_uso', null, ['class' => 'form-control select2', 'id' => 'mejor_mayor_uso', 'required']) !!}
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
