{!! Form::open(['method' => 'POST', 'route' => ['avaluo_info_juridica_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_info_juridica']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-3 rounded-4">
        <div class="mb-5">
            {!! Form::hidden('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            
            <h4 class="text-uppercase">INFORMACIÓN JURÍDICA</h4>

            <div class="row mt-5 mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="propietario_1" class="form-label text-uppercase mb-0">propietario 1<span class="text-danger">*</span></label>
                        {!! Form::text('propietario_1', isset($calcularAvaluo) ? $calcularAvaluo->propietario1 : null, ['class' => 'form-control text-uppercase', 'id' => 'propietario_1', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cedula_propietario_1" class="form-label text-uppercase mb-0">documento propietario 1<span class="text-danger">*</span></label>
                        {!! Form::text('doc_propietario_1', isset($calcularAvaluo) ? $calcularAvaluo->doc_propietario1 : null, ['class' => 'form-control text-uppercase', 'id' => 'cedula_propietario_1', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="propietario_2" class="form-label text-uppercase mb-0">propietario 2<span class="text-danger">*</span></label>
                        {!! Form::text('propietario_2', isset($calcularAvaluo) ? $calcularAvaluo->propietario2 : null, ['class' => 'form-control text-uppercase', 'id' => 'propietario_2', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cedula_propietario_2" class="form-label text-uppercase mb-0">documento propietario 2<span class="text-danger">*</span></label>
                        {!! Form::text('doc_propietario_2', isset($calcularAvaluo) ? $calcularAvaluo->doc_propietario2 : null, ['class' => 'form-control text-uppercase', 'id' => 'cedula_propietario_2', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="matricula_inmueble" class="form-label text-uppercase mb-0">Matrícula Inmueble<span class="text-danger">*</span></label>
                        {!! Form::text('matricula_inmueble', isset($calcularAvaluo) ? $calcularAvaluo->matricula_inmueble : null, ['class' => 'form-control text-uppercase', 'id' => 'matricula_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="coeficiente_copropiedad" class="form-label text-uppercase mb-0">Coeficiente Copropiedad<span class="text-danger">*</span></label>
                        {!! Form::text('coeficiente_copropiedad', isset($calcularAvaluo) ? $calcularAvaluo->coeficiente_copropiedad : null, ['class' => 'form-control text-uppercase', 'id' => 'coeficiente_copropiedad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="certificado_libertad" class="form-label text-uppercase mb-0">Certificado Libertad<span class="text-danger">*</span></label>
                        {!! Form::text('certificado_libertad', isset($calcularAvaluo) ? $calcularAvaluo->certificado_libertad : null, ['class' => 'form-control text-uppercase', 'id' => 'certificado_libertad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="escritura_publica" class="form-label text-uppercase mb-0">Escritura Pública<span class="text-danger">*</span></label>
                        {!! Form::text('escritura_publica', isset($calcularAvaluo) ? $calcularAvaluo->escritura_publica : null, ['class' => 'form-control text-uppercase', 'id' => 'escritura_publica', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4">
                    <div class="form-group d-flex flex-column">
                        <label for="notaria" class="form-label text-uppercase mb-0">Notaría<span class="text-danger">*</span></label>
                        {!! Form::text('notaria', isset($calcularAvaluo) ? $calcularAvaluo->notaria : null, ['class' => 'form-control text-uppercase', 'id' => 'notaria', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="impuesto_predial_anual" class="form-label text-uppercase mb-0">Impuesto Predial Anual<span class="text-danger">*</span></label>
                        {!! Form::text('impuesto_predial_anual', isset($calcularAvaluo) ? $calcularAvaluo->imp_predial_anual : null, ['class' => 'form-control text-uppercase', 'id' => 'impuesto_predial_anual', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="administracion" class="form-label text-uppercase mb-0">Administración<span class="text-danger">*</span></label>
                        {!! Form::text('administracion', isset($calcularAvaluo) ? $calcularAvaluo->administracion : null, ['class' => 'form-control', 'id' => 'administracion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="avaluo_catastral" class="form-label text-uppercase mb-0">Avaluo Catastral<span class="text-danger">*</span></label>
                        {!! Form::text('avaluo_catastral', isset($calcularAvaluo) ? $calcularAvaluo->avaluo_catastral : null, ['class' => 'form-control', 'id' => 'avaluo_catastral', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="normas_usos" class="form-label text-uppercase mb-0">Normas y Usos<span class="text-danger">*</span></label>
                        {!! Form::textarea('normas_usos', isset($calcularAvaluo) ? $calcularAvaluo->normas_usos : null, ['class' => 'form-control', 'id' => 'normas_usos', 'rows' => 4, 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 mt-4" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="mejor_mayor_uso" class="form-label text-uppercase mb-0">Mejor y Mayor Uso<span class="text-danger">*</span></label>
                        {!! Form::textarea('mejor_mayor_uso', isset($calcularAvaluo) ? $calcularAvaluo->mejor_mayor_uso : null, ['class' => 'form-control', 'id' => 'mejor_mayor_uso', 'rows' => 4, 'required']) !!}
                    </div>
                </div>
            </div>
        </div>
        
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill" type="submit" value="Editar Info Jurídica" id="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
