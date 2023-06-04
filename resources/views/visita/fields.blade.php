<div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
    <div class="mb-5">
        <h2 class="text-uppercase">0 - DATOS AVALUADOR</h2>
        <div class="row mb-5">
            <div class="col-12">
                <div class="form-group wrap-input100 validate-input" data-validate="Required">
                    <label for="avaluador" class="form-label text-uppercase" data-placeholder="avaluador">avaluador<span class="text-danger">*</span></label>
                    {!! Form::select('avaluador', $avaluador, old('avaluador'), ['class' => 'form-control text-uppercase', 'id' => 'avaluador', 'required']) !!}
                </div>
                {{-- {!! Form::text('id_solicitante', isset($usuario) ? $usuario->id_solicitante : null, ['class' => 'input100', 'id' => 'id_solicitante']) !!} --}}
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">1 - VISITA TÉCNICA INMUEBLE</h2>
        <div class="row mb-5">
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
                    <label for="dirigido_a_empresa" class="form-label text-uppercase" data-placeholder="dirigido_a_empresa">Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('dirigido_a_empresa', $dirigido_a_empresa,null, ['class' => 'form-control', 'id' => 'dirigido_a_empresa', 'required']) !!}
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

    <div class="mb-5">
        <h2 class="text-uppercase">2 - INFORMACIÓN JURÍDICA</h2>
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

    <div class="mb-5">
        <h2 class="text-uppercase">3 - información del inmueble</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="tipo_vivienda" class="form-label text-uppercase" data-placeholder="tipo">Tipo Vivienda<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_vivienda', $tipo_vivienda,null, ['class' => 'form-control select2', 'id' => 'tipo_vivienda', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="tipo_inmueble" class="form-label text-uppercase" data-placeholder="tipo_inmueble">Tipo Inmueble<span class="text-danger">*</span></label>
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

    <div class="mb-5">
        <h2 class="text-uppercase">4 - CARACTERÍSTICAS DEL INMUEBLE</h2>

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

    <div class="mb-5">
        <h2 class="text-uppercase">5 - ACABADOS  Y EVALUACIÓN TÉCNICA DEL INMUEBLE</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="sistema_constructivo" class="form-label text-uppercase" data-placeholder="sistema_constructivo">Sistema Constructivo<span class="text-danger">*</span></label>
                    {!! Form::select('sistema_constructivo', $sistema_constructivo,null, ['class' => 'form-control select2', 'id' => 'sistema_constructivo', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="porton_principal" class="form-label text-uppercase" data-placeholder="porton_principal">Portón Principal<span class="text-danger">*</span></label>
                    {!! Form::select('porton_principal', $puertas_material,null, ['class' => 'form-control', 'id' => 'porton_principal', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="fachada" class="form-label text-uppercase" data-placeholder="fachada">Fachada</label>
                    {!! Form::select('fachada', $tipo_fachada,null, ['class' => 'form-control', 'id' => 'fachada']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="puertas" class="form-label text-uppercase" data-placeholder="puertas">Puertas<span class="text-danger">*</span></label>
                    {!! Form::select('puertas', $puertas_material,null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="muros" class="form-label text-uppercase" data-placeholder="muros">Muros<span class="text-danger">*</span></label>
                    {!! Form::select('muros', $tipo_muro, null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="ventaneria" class="form-label text-uppercase" data-placeholder="ventaneria">Ventaneria<span class="text-danger">*</span></label>
                    {!! Form::select('ventaneria', $ventaneria,null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="techos" class="form-label text-uppercase" data-placeholder="techos">Techos<span class="text-danger">*</span></label>
                    {!! Form::select('techos', $tipo_techo,null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_telefono">
                <div class="form-group">
                    <label for="servicios_publicos" class="form-label text-uppercase" data-placeholder="servicios_publicos">Servicios Públicos</label>
                    {!! Form::text('servicios_publicos', null, ['class' => 'form-control', 'id' => 'servicios_publicos']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="pisos" class="form-label text-uppercase" data-placeholder="pisos">Pisos<span class="text-danger">*</span></label>
                    {!! Form::text('pisos', null, ['class' => 'form-control text-uppercase', 'id' => 'pisos', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="telefono" class="form-label text-uppercase" data-placeholder="telefono">Teléfono</label>
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="bano" class="form-label text-uppercase" data-placeholder="bano">Baños</label>
                    {!! Form::text('bano', null, ['class' => 'form-control', 'id' => 'bano']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="energia" class="form-label text-uppercase" data-placeholder="energia">Energía</label>
                    {!! Form::text('energia', null, ['class' => 'form-control', 'id' => 'energia']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="cocina" class="form-label text-uppercase" data-placeholder="cocina">Cocina<span class="text-danger">*</span></label>
                    {!! Form::text('cocina', null, ['class' => 'form-control select2', 'id' => 'cocina', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="agua" class="form-label text-uppercase" data-placeholder="agua">Agua<span class="text-danger">*</span></label>
                    {!! Form::text('agua', null, ['class' => 'form-control select2', 'id' => 'agua', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="meson" class="form-label text-uppercase" data-placeholder="meson">Mesón<span class="text-danger">*</span></label>
                    {!! Form::text('meson', null, ['class' => 'form-control select2', 'id' => 'meson', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="gas" class="form-label text-uppercase" data-placeholder="gas">Gas<span class="text-danger">*</span></label>
                    {!! Form::text('gas', null, ['class' => 'form-control select2', 'id' => 'gas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones_acabados_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_acabados_inmueble">Observaciones Acabados Inmueble<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_acabados_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_acabados_inmueble', 'required']) !!}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">6 - CALIFICACIÓN DEL INMUEBLE</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="estructura" class="form-label text-uppercase" data-placeholder="estructura">Estructura<span class="text-danger">*</span></label>
                    {!! Form::text('estructura', null, ['class' => 'form-control select2', 'id' => 'estructura', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="porton_principal" class="form-label text-uppercase" data-placeholder="porton_principal">Portón Principal<span class="text-danger">*</span></label>
                    {!! Form::text('porton_principal', null, ['class' => 'form-control', 'id' => 'porton_principal', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="fachada" class="form-label text-uppercase" data-placeholder="fachada">Fachada</label>
                    {!! Form::text('fachada', null, ['class' => 'form-control', 'id' => 'fachada']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="puertas" class="form-label text-uppercase" data-placeholder="puertas">Puertas<span class="text-danger">*</span></label>
                    {!! Form::text('puertas', null, ['class' => 'form-control select2', 'id' => 'puertas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="muros" class="form-label text-uppercase" data-placeholder="muros">Muros<span class="text-danger">*</span></label>
                    {!! Form::text('muros', null, ['class' => 'form-control select2', 'id' => 'muros', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="ventaneria" class="form-label text-uppercase" data-placeholder="ventaneria">Ventaneria<span class="text-danger">*</span></label>
                    {!! Form::text('ventaneria', null, ['class' => 'form-control select2', 'id' => 'ventaneria', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="techos" class="form-label text-uppercase" data-placeholder="techos">Techos<span class="text-danger">*</span></label>
                    {!! Form::text('techos', null, ['class' => 'form-control select2', 'id' => 'techos', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_telefono">
                <div class="form-group">
                    <label for="carpinteria" class="form-label text-uppercase" data-placeholder="carpinteria">Carpintería</label>
                    {!! Form::text('carpinteria', null, ['class' => 'form-control', 'id' => 'carpinteria']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="pisos" class="form-label text-uppercase" data-placeholder="pisos">Pisos<span class="text-danger">*</span></label>
                    {!! Form::text('pisos', null, ['class' => 'form-control text-uppercase', 'id' => 'pisos', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="ventilacion" class="form-label text-uppercase" data-placeholder="ventilacion">Ventilación</label>
                    {!! Form::text('ventilacion', null, ['class' => 'form-control', 'id' => 'ventilacion']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="cocina" class="form-label text-uppercase" data-placeholder="cocina">Cocina</label>
                    {!! Form::text('cocina', null, ['class' => 'form-control', 'id' => 'cocina']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="iluminacion" class="form-label text-uppercase" data-placeholder="iluminacion">Iluminación</label>
                    {!! Form::text('iluminacion', null, ['class' => 'form-control', 'id' => 'iluminacion']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="banos" class="form-label text-uppercase" data-placeholder="banos">Baños<span class="text-danger">*</span></label>
                    {!! Form::text('banos', null, ['class' => 'form-control select2', 'id' => 'banos', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="distribucion" class="form-label text-uppercase" data-placeholder="distribucion">Distribución<span class="text-danger">*</span></label>
                    {!! Form::text('distribucion', null, ['class' => 'form-control select2', 'id' => 'distribucion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="zona_ropas" class="form-label text-uppercase" data-placeholder="zona_ropas">Zona Ropas<span class="text-danger">*</span></label>
                    {!! Form::text('zona_ropas', null, ['class' => 'form-control select2', 'id' => 'zona_ropas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="humedades" class="form-label text-uppercase" data-placeholder="humedades">Humedades<span class="text-danger">*</span></label>
                    {!! Form::text('humedades', null, ['class' => 'form-control select2', 'id' => 'humedades', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones_calificacion_inmueble" class="form-label text-uppercase" data-placeholder="observaciones_calificacion_inmueble">Observaciones Calificacion del Inmueble<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_calificacion_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_calificacion_inmueble', 'required']) !!}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">7 - EQUIPAMIENTO Y DOTACIÓN COMUNAL</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="porteria_24_horas" class="form-label text-uppercase" data-placeholder="porteria_24_horas">Porteria 24 Horas<span class="text-danger">*</span></label>
                    {!! Form::text('porteria_24_horas', null, ['class' => 'form-control select2', 'id' => 'porteria_24_horas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="parqueo_comun" class="form-label text-uppercase" data-placeholder="parqueo_comun">Parqueo Común<span class="text-danger">*</span></label>
                    {!! Form::text('parqueo_comun', null, ['class' => 'form-control', 'id' => 'parqueo_comun', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="juegos_infantiles" class="form-label text-uppercase" data-placeholder="juegos_infantiles">Juegos Infantiles</label>
                    {!! Form::text('juegos_infantiles', null, ['class' => 'form-control', 'id' => 'juegos_infantiles']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="zona_mascotas" class="form-label text-uppercase" data-placeholder="zona_mascotas">Zona Mascotas<span class="text-danger">*</span></label>
                    {!! Form::text('zona_mascotas', null, ['class' => 'form-control select2', 'id' => 'zona_mascotas', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="piscina" class="form-label text-uppercase" data-placeholder="piscina">Piscina<span class="text-danger">*</span></label>
                    {!! Form::text('piscina', null, ['class' => 'form-control select2', 'id' => 'piscina', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="zonas_verdes" class="form-label text-uppercase" data-placeholder="zonas_verdes">Zonas Verdes<span class="text-danger">*</span></label>
                    {!! Form::text('zonas_verdes', null, ['class' => 'form-control select2', 'id' => 'zonas_verdes', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="sauna" class="form-label text-uppercase" data-placeholder="sauna">Sauna<span class="text-danger">*</span></label>
                    {!! Form::text('sauna', null, ['class' => 'form-control select2', 'id' => 'sauna', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_telefono">
                <div class="form-group">
                    <label for="salon_social" class="form-label text-uppercase" data-placeholder="salon_social">Salon Social</label>
                    {!! Form::text('salon_social', null, ['class' => 'form-control', 'id' => 'salon_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="turco" class="form-label text-uppercase" data-placeholder="turco">Turco<span class="text-danger">*</span></label>
                    {!! Form::text('turco', null, ['class' => 'form-control text-uppercase', 'id' => 'turco', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="canchas" class="form-label text-uppercase" data-placeholder="canchas">canchas</label>
                    {!! Form::text('canchas', null, ['class' => 'form-control', 'id' => 'canchas']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones_equipamiento_comunal" class="form-label text-uppercase" data-placeholder="observaciones_equipamiento_comunal">Observaciones Equipamiento y Dotación Comunal<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_equipamiento_comunal', null, ['class' => 'form-control select2', 'id' => 'observaciones_equipamiento_comunal', 'required']) !!}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">8- INFORMACIÓN DEL SECTOR</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="barrios_sectores" class="form-label text-uppercase" data-placeholder="barrios_sectores">Barrios/Sectores<span class="text-danger">*</span></label>
                    {!! Form::text('barrios_sectores', null, ['class' => 'form-control select2', 'id' => 'barrios_sectores', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="actividad_predominante" class="form-label text-uppercase" data-placeholder="actividad_predominante">Actividad Predominante<span class="text-danger">*</span></label>
                    {!! Form::text('actividad_predominante', null, ['class' => 'form-control', 'id' => 'actividad_predominante', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="transporte" class="form-label text-uppercase" data-placeholder="transporte">Transporte</label>
                    {!! Form::text('transporte', null, ['class' => 'form-control', 'id' => 'transporte']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="vias_acceso" class="form-label text-uppercase" data-placeholder="vias_acceso">Vias de Acceso<span class="text-danger">*</span></label>
                    {!! Form::text('vias_acceso', null, ['class' => 'form-control select2', 'id' => 'vias_acceso', 'required']) !!}
                </div>
            </div>
        </div>
    </div>

     {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">9- CONDICIONES URBANISTICAS</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="valorizacion" class="form-label text-uppercase">valorización<span class="text-danger">*</span></label>
                    {!! Form::text('valorizacion', null, ['class' => 'form-control select2', 'id' => 'valorizacion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="alumbrado_publico" class="form-label text-uppercase">alumbrado público<span class="text-danger">*</span></label>
                    {!! Form::text('alumbrado_publico', null, ['class' => 'form-control', 'id' => 'alumbrado_publico', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="transporte" class="form-label text-uppercase" data-placeholder="transporte">Transporte</label>
                    {!! Form::text('transporte', null, ['class' => 'form-control', 'id' => 'transporte']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="orden_publico" class="form-label text-uppercase">orden público<span class="text-danger">*</span></label>
                    {!! Form::text('orden_publico', null, ['class' => 'form-control select2', 'id' => 'orden_publico', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="seguridad" class="form-label text-uppercase">seguridad<span class="text-danger">*</span></label>
                    {!! Form::text('seguridad', null, ['class' => 'form-control select2', 'id' => 'seguridad', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="salubridad" class="form-label text-uppercase">salubridad<span class="text-danger">*</span></label>
                    {!! Form::text('salubridad', null, ['class' => 'form-control select2', 'id' => 'salubridad', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="vias" class="form-label text-uppercase">vías<span class="text-danger">*</span></label>
                    {!! Form::text('vias', null, ['class' => 'form-control select2', 'id' => 'vias_acces
                    o', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_vias" class="form-label text-uppercase">tipo de vías<span class="text-danger">*</span></label>
                    {!! Form::text('tipo_vias', null, ['class' => 'form-control select2', 'id' => 'tipo_vias', 'required']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="barrios_sectores" class="form-label text-uppercase" data-placeholder="barrios_sectores">Barrios/Sectores<span class="text-danger">*</span></label>
                    {!! Form::text('barrios_sectores', null, ['class' => 'form-control select2', 'id' => 'barrios_sectores', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="tipo_edificaciones" class="form-label text-uppercase">tipo edificaciones<span class="text-danger">*</span></label>
                    {!! Form::text('tipo_edificaciones', null, ['class' => 'form-control select2', 'id' => 'tipo_edificaciones', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones_condiciones_urbanisticas" class="form-label text-uppercase">Observaciones condiciones urbanisticas<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_condiciones_urbanisticas', null, ['class' => 'form-control select2', 'id' => 'observaciones_condiciones_urbanisticas', 'required']) !!}
                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">10 - VALOR ESTIMADO AVALÚO</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="valor_estimado_inmueble" class="form-label text-uppercase" data-placeholder="valor_estimado_inmueble">Valor Estimado Inmueble<span class="text-danger">*</span></label>
                    {!! Form::text('valor_estimado_inmueble', null, ['class' => 'form-control select2', 'id' => 'valor_estimado_inmueble', 'required']) !!}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="mb-5">
        <h2 class="text-uppercase">11 - OBSERVACIONES GENERALES</h2>

        <div class="row mb-5">
            <div class="col-12">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="observaciones_generales" class="form-label text-uppercase" data-placeholder="observaciones_generales">Valor Observaciones Generales<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_generales', null, ['class' => 'form-control select2', 'id' => 'observaciones_generales', 'required']) !!}
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
