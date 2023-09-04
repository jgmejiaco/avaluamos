{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-1">
            <h2 class="text-uppercase">VISITA TÉCNICA INMUEBLE</h2>
            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="avaluador" class="form-label text-uppercase" data-placeholder="avaluador">visitador<span class="text-danger">*</span></label>
                        {!! Form::select('avaluador', $avaluador, old('avaluador'), ['class' => 'form-control text-uppercase', 'id' => 'avaluador', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="solicitante" class="form-label text-uppercase" data-placeholder="solicitante">solicitante<span class="text-danger">*</span></label>
                        {!! Form::text('solicitante', old('solicitante'), ['class' => 'form-control text-uppercase', 'id' => 'solicitante', 'required']) !!}
                    </div>
                    {{-- {!! Form::hidden('id_solicitante', isset($usuario) ? $usuario->id_solicitante : null, ['class' => 'input100', 'id' => 'id_solicitante']) !!} --}}
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group wrap-input100 validate-input" data-validate="Required">
                        <label for="numero_documento" class="form-label text-uppercase" data-placeholder="numero_documento">Número Documento<span class="text-danger">*</span></label>
                        {!! Form::text('numero_documento', null, ['class' => 'form-control text-uppercase', 'id' => 'numero_documento', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="div_celular">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="celular" class="form-label text-uppercase" data-placeholder="celular">Celular<span class="text-danger">*</span></label>
                        {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'celular', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="div_correo">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="correo" class="form-label text-uppercase" data-placeholder="correo">email<span class="text-danger">*</span></label>
                        {!! Form::email('correo', null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="div_correo">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="dirigido_a" class="form-label text-uppercase" data-placeholder="dirigido_a">Dirigido A<span class="text-danger">*</span></label>
                        {!! Form::select('dirigido_a', $dirigido_a,null, ['class' => 'form-control', 'id' => 'dirigido_a', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="div_correo">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="dirigido_a_nit" class="form-label text-uppercase" data-placeholder="dirigido_a_nit">nit<span class="text-danger">*</span></label>
                        {!! Form::text('dirigido_a_nit', null, ['class' => 'form-control', 'id' => 'dirigido_a_nit', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="empresa" class="form-label text-uppercase" data-placeholder="empresa">Empresa<span class="text-danger">*</span></label>
                        {!! Form::text('empresa', null, ['class' => 'form-control select2', 'id' => 'empresa', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="fecha_inspeccion" class="form-label text-uppercase" data-placeholder="fecha_inspeccion">Fecha Inspección<span class="text-danger">*</span></label>
                        {!! Form::text('fecha_inspeccion', null, ['class' => 'form-control select2', 'id' => 'fecha_inspeccion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="hora_visita" class="form-label text-uppercase" data-placeholder="hora_visita">Hora Visita<span class="text-danger">*</span></label>
                        {!! Form::text('hora_visita', null, ['class' => 'form-control select2', 'id' => 'hora_visita', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="pais" class="form-label text-uppercase" data-placeholder="pais">País<span class="text-danger">*</span></label>
                        {!! Form::select('pais', $pais,null, ['class' => 'form-control select2', 'id' => 'pais', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="departamento_estado" class="form-label text-uppercase" data-placeholder="departamento_estado">Departamento<span class="text-danger">*</span></label>
                        {!! Form::select('departamento_estado', $departamento_estado, null, ['class' => 'form-control select2', 'id' => 'departamento_estado', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="ciudad" class="form-label text-uppercase" data-placeholder="municipio">Municipio<span class="text-danger">*</span></label>
                        {!! Form::select('ciudad', $ciudad,null, ['class' => 'form-control select2', 'id' => 'ciudad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="barrio" class="form-label text-uppercase" data-placeholder="barrio">Barrio<span class="text-danger">*</span></label>
                        {!! Form::text('barrio', null, ['class' => 'form-control select2', 'id' => 'barrio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="sector" class="form-label text-uppercase" data-placeholder="sector">Sector<span class="text-danger">*</span></label>
                        {!! Form::text('sector', null, ['class' => 'form-control select2', 'id' => 'sector', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="cerca_de" class="form-label text-uppercase" data-placeholder="direccion">Cerca De<span class="text-danger">*</span></label>
                        {!! Form::text('cerca_de', null, ['class' => 'form-control select2', 'id' => 'cerca_de', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="direccion" class="form-label text-uppercase" data-placeholder="direccion">Dirección<span class="text-danger">*</span></label>
                        {!! Form::text('direccion', null, ['class' => 'form-control select2', 'id' => 'direccion', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="edificio" class="form-label text-uppercase" data-placeholder="direccion">Edificio<span class="text-danger">*</span></label>
                        {!! Form::text('edificio', null, ['class' => 'form-control select2', 'id' => 'edificio', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="apartamento_numero" class="form-label text-uppercase" data-placeholder="apartamento_numero">Apartamento Número<span class="text-danger">*</span></label>
                        {!! Form::text('apartamento_numero', null, ['class' => 'form-control select2', 'id' => 'apartamento_numero', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="numero_inmueble" class="form-label text-uppercase" data-placeholder="numero_inmueble">Número Inmueble<span class="text-danger">*</span></label>
                        {!! Form::text('numero_inmueble', null, ['class' => 'form-control select2', 'id' => 'numero_inmueble', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="unidad" class="form-label text-uppercase" data-placeholder="unidad">Unidad<span class="text-danger">*</span></label>
                        {!! Form::text('unidad', null, ['class' => 'form-control select2', 'id' => 'unidad', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="estrato" class="form-label text-uppercase" data-placeholder="estrato">Estrato<span class="text-danger">*</span></label>
                        {!! Form::text('estrato', null, ['class' => 'form-control select2', 'id' => 'estrato', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="latitud" class="form-label text-uppercase" data-placeholder="latitud">Latitud<span class="text-danger">*</span></label>
                        {!! Form::text('latitud', null, ['class' => 'form-control select2', 'id' => 'latitud', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="longitud" class="form-label text-uppercase" data-placeholder="longitud">Longitud<span class="text-danger">*</span></label>
                        {!! Form::text('longitud', null, ['class' => 'form-control select2', 'id' => 'longitud', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12" id="">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="observaciones_visita_tecnica_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_visita_tecnica_inmueble">Observaciones Visita Técnica Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_visita_tecnica_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_visita_tecnica_inmueble', 'required']) !!}
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
