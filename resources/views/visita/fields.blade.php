<div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
    <div>
        <h2 class="text-uppercase">1 - DATOS DEL SOLICITANTE</h2>
        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="form-group wrap-input100 validate-input" data-validate="Required">
                    <label for="nombres" class="form-label text-uppercase" data-placeholder="nombres">Nombre<span class="text-danger">*</span></label>
                    {!! Form::text('nombres', old('nombres'), ['class' => 'form-control text-uppercase', 'id' => 'nombres', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="nombres"></span> --}}
                </div>
                {{-- {!! Form::hidden('id_usuario', isset($usuario) ? $usuario->id_user : null, ['class' => 'input100', 'id' => 'id_usuario']) !!} --}}
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group wrap-input100 validate-input" data-validate="Required">
                    <label for="cedula" class="form-label text-uppercase" data-placeholder="cedula">cédula<span class="text-danger">*</span></label>
                    {!! Form::text('cedula', null, ['class' => 'form-control text-uppercase', 'id' => 'cedula', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="apellidos"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_celular">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="celular" class="form-label text-uppercase" data-placeholder="celular">Celular<span class="text-danger">*</span></label>
                    {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'celular', 'required']) !!}
                    {{-- <span class="focus-input100 text-danger" data-placeholder="Whatsapp" id="celular"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_correo">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="correo" class="form-label text-uppercase" data-placeholder="correo">email<span class="text-danger">*</span></label>
                    {!! Form::email('correo', null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                    {{-- <span class="focus-input100 text-danger" data-placeholder="Email" id="correo"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="dirigido_a" class="form-label text-uppercase" data-placeholder="Roll">Dirigido A:<span class="text-danger">*</span></label>
                    {{-- {!! Form::select('id_rol', $rol, null, ['class' => 'form-control select2', 'id' => 'id_rol', 'required']) !!} --}}
                    {{-- <span class="focus-input100" data-placeholder="Role"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="nit" class="form-label text-uppercase" data-placeholder="nit">Nit<span class="text-danger">*</span></label>
                    {{-- {!! Form::select('id_cargo', $cargo, null, ['class' => 'form-control select2', 'id' => 'id_cargo', 'required']) !!} --}}
                    {{-- <span class="focus-input100" data-placeholder="Skype"></span> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div>
        <h2 class="text-uppercase">2 - DATOS GENERALES</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="avaluador" class="form-label text-uppercase" data-placeholder="avaluador">avaluador<span class="text-danger">*</span></label>
                    {{-- {!! Form::select('id_tipo_documento', $descripcion_documento, null, ['class' => 'form-control select2', 'id' => 'id_tipo_documento', 'required']) !!} --}}
                    {{-- <span class="focus-input100" data-placeholder="Document Type"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="fecha_elaboracion" class="form-label text-uppercase" data-placeholder="fecha_elaboracion">fecha de elaboración<span class="text-danger">*</span></label>
                    {!! Form::text('fecha_elaboracion', null, ['class' => 'form-control', 'id' => 'fecha_elaboracion', 'required']) !!}
                    <span class="focus-input100" data-placeholder="Document Number"></span>
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="codigo_interno" class="form-label text-uppercase" data-placeholder="codigo_interno">código interno</label>
                    {!! Form::text('codigo_interno', null, ['class' => 'form-control', 'id' => 'codigo_interno']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Date of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_inspeccion" class="form-label text-uppercase" data-placeholder="fecha_inspeccion">fecha inspección<span class="text-danger">*</span></label>
                    {!! Form::text('fecha_inspeccion', null, ['class' => 'form-control select2', 'id' => 'fecha_inspeccion', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="pais" class="form-label text-uppercase" data-placeholder="pais">país<span class="text-danger">*</span></label>
                    {!! Form::text('pais', null, ['class' => 'form-control select2', 'id' => 'pais', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>
            

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="departamento" class="form-label text-uppercase" data-placeholder="departamento">departamento<span class="text-danger">*</span></label>
                    {!! Form::text('departamento', null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="municipio" class="form-label text-uppercase" data-placeholder="municipio">municipio<span class="text-danger">*</span></label>
                    {!! Form::text('municipio', null, ['class' => 'form-control select2', 'id' => 'municipio', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
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
                    <label for="direccion" class="form-label text-uppercase" data-placeholder="direccion">Dirección<span class="text-danger">*</span></label>
                    {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase', 'id' => 'direccion', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Place of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="cerca_de" class="form-label text-uppercase" data-placeholder="cerca_de">cerca de</label>
                    {!! Form::text('cerca_de', null, ['class' => 'form-control', 'id' => 'cerca_de']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="edificio" class="form-label text-uppercase" data-placeholder="edificio">edificio</label>
                    {!! Form::text('edificio', null, ['class' => 'form-control', 'id' => 'edificio']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="estrato" class="form-label text-uppercase" data-placeholder="estrato">estrato</label>
                    {!! Form::text('estrato', null, ['class' => 'form-control', 'id' => 'estrato']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="apartamento" class="form-label text-uppercase" data-placeholder="apartamento">apartamento<span class="text-danger">*</span></label>
                    {!! Form::text('apartamento', null, ['class' => 'form-control select2', 'id' => 'apartamento', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="latitud" class="form-label text-uppercase" data-placeholder="latitud">latitud<span class="text-danger">*</span></label>
                    {!! Form::text('latitud', null, ['class' => 'form-control select2', 'id' => 'latitud', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="longitud" class="form-label text-uppercase" data-placeholder="longitud">latitud<span class="text-danger">*</span></label>
                    {!! Form::text('longitud', null, ['class' => 'form-control select2', 'id' => 'longitud', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones" class="form-label text-uppercase" data-placeholder="observaciones">observaciones<span class="text-danger">*</span></label>
                    {!! Form::text('observaciones', null, ['class' => 'form-control select2', 'id' => 'observaciones', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div>
        <h2 class="text-uppercase">3 - INFORMACIÓN JURÍDICA</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="propietario1" class="form-label text-uppercase" data-placeholder="avaluador">propietario1<span class="text-danger">*</span></label>
                    {!! Form::text('propietario1', null, ['class' => 'form-control select2', 'id' => 'propietario1', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Document Type"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="cedula_propietario1" class="form-label text-uppercase" data-placeholder="cedula_propietario1">cedula_propietario1<span class="text-danger">*</span></label>
                    {!! Form::text('cedula_propietario1', null, ['class' => 'form-control', 'id' => 'cedula_propietario1', 'required']) !!}
                    <span class="focus-input100" data-placeholder="Document Number"></span>
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="propietario2" class="form-label text-uppercase" data-placeholder="propietario2">propietario2</label>
                    {!! Form::text('propietario2', null, ['class' => 'form-control', 'id' => 'propietario2']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Date of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cedula_propietario2" class="form-label text-uppercase" data-placeholder="cedula_propietario2">cedula_propietario2<span class="text-danger">*</span></label>
                    {!! Form::text('cedula_propietario2', null, ['class' => 'form-control select2', 'id' => 'cedula_propietario2', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="matricula_apartamento" class="form-label text-uppercase" data-placeholder="matricula_apartamento">matricula_apartamento<span class="text-danger">*</span></label>
                    {!! Form::text('matricula_apartamento', null, ['class' => 'form-control select2', 'id' => 'matricula_apartamento', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>
            

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="coeficiente_copropiedad" class="form-label text-uppercase" data-placeholder="coeficiente_copropiedad">coeficiente_copropiedad<span class="text-danger">*</span></label>
                    {!! Form::text('departamento', null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="certificado_libertad" class="form-label text-uppercase" data-placeholder="certificado_libertad">certificado_libertad<span class="text-danger">*</span></label>
                    {!! Form::text('certificado_libertad', null, ['class' => 'form-control select2', 'id' => 'certificado_libertad', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_telefono">
                <div class="form-group">
                    <label for="escritura_publica" class="form-label text-uppercase" data-placeholder="escritura_publica">escritura_publica</label>
                    {!! Form::text('escritura_publica', null, ['class' => 'form-control', 'id' => 'escritura_publica']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Phone"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="notaria" class="form-label text-uppercase" data-placeholder="notaria">notaria<span class="text-danger">*</span></label>
                    {!! Form::text('notaria', null, ['class' => 'form-control text-uppercase', 'id' => 'notaria', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Place of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="impuesto_predial_anual" class="form-label text-uppercase" data-placeholder="impuesto_predial_anual">impuesto_predial_anual</label>
                    {!! Form::text('impuesto_predial_anual', null, ['class' => 'form-control', 'id' => 'impuesto_predial_anual']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="tiene_administracion" class="form-label text-uppercase" data-placeholder="tiene_administracion">tiene_administracion</label>
                    {!! Form::text('tiene_administracion', null, ['class' => 'form-control', 'id' => 'tiene_administracion']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="avaluo_catastral" class="form-label text-uppercase" data-placeholder="avaluo_catastral">avaluo_catastral</label>
                    {!! Form::text('avaluo_catastral', null, ['class' => 'form-control', 'id' => 'avaluo_catastral']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="normas_usos" class="form-label text-uppercase" data-placeholder="normas_usos">normas_usos<span class="text-danger">*</span></label>
                    {!! Form::text('normas_usos', null, ['class' => 'form-control select2', 'id' => 'normas_usos', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="mejor_mayor_uso" class="form-label text-uppercase" data-placeholder="mejor_mayor_uso">mejor_mayor_uso<span class="text-danger">*</span></label>
                    {!! Form::text('mejor_mayor_uso', null, ['class' => 'form-control select2', 'id' => 'mejor_mayor_uso', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones" class="form-label text-uppercase" data-placeholder="observaciones">observaciones<span class="text-danger">*</span></label>
                    {!! Form::text('observaciones', null, ['class' => 'form-control select2', 'id' => 'observaciones', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="area_cierta" class="form-label text-uppercase" data-placeholder="area_cierta">area_cierta<span class="text-danger">*</span></label>
                    {!! Form::text('area_cierta', null, ['class' => 'form-control select2', 'id' => 'area_cierta', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>
        </div>
    </div>

    

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div>
        <h2 class="text-uppercase">4 - INFORMACIÓN DEL INMUEBLE</h2>

        <div class="row mb-5">
            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="tipo_vivienda" class="form-label text-uppercase" data-placeholder="tipo_vivienda">tipo_vivienda<span class="text-danger">*</span></label>
                    {!! Form::text('tipo_vivienda', null, ['class' => 'form-control select2', 'id' => 'tipo_vivienda', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Document Type"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="area_construida" class="form-label text-uppercase" data-placeholder="area_construida">area_construida<span class="text-danger">*</span></label>
                    {!! Form::text('area_construida', null, ['class' => 'form-control', 'id' => 'area_construida', 'required']) !!}
                    <span class="focus-input100" data-placeholder="Document Number"></span>
                </div>
            </div>

            {{-- ======================= --}}
            {{-- @php
                use Carbon\Carbon;
                // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
            @endphp --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100">
                    <label for="tipo_suelo" class="form-label text-uppercase" data-placeholder="tipo_suelo">tipo_suelo</label>
                    {!! Form::text('tipo_suelo', null, ['class' => 'form-control', 'id' => 'tipo_suelo']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Date of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="area_patios_vacio" class="form-label text-uppercase" data-placeholder="area_patios_vacio">area_patios_vacio<span class="text-danger">*</span></label>
                    {!! Form::text('area_patios_vacio', null, ['class' => 'form-control select2', 'id' => 'area_patios_vacio', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_inmueble" class="form-label text-uppercase" data-placeholder="matricula_apartamento">tipo_inmueble<span class="text-danger">*</span></label>
                    {!! Form::text('tipo_inmueble', null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>
            

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="numero_pisos" class="form-label text-uppercase" data-placeholder="numero_pisos">numero_pisos<span class="text-danger">*</span></label>
                    {!! Form::text('numero_pisos', null, ['class' => 'form-control select2', 'id' => 'numero_pisos', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="uso_inmueble" class="form-label text-uppercase" data-placeholder="uso_inmueble">uso_inmueble<span class="text-danger">*</span></label>
                    {!! Form::text('uso_inmueble', null, ['class' => 'form-control select2', 'id' => 'uso_inmueblex', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_telefono">
                <div class="form-group">
                    <label for="escritura_publica" class="form-label text-uppercase" data-placeholder="escritura_publica">escritura_publica</label>
                    {!! Form::text('escritura_publica', null, ['class' => 'form-control', 'id' => 'escritura_publica']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Phone"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="Required">
                    <label for="notaria" class="form-label text-uppercase" data-placeholder="notaria">notaria<span class="text-danger">*</span></label>
                    {!! Form::text('notaria', null, ['class' => 'form-control text-uppercase', 'id' => 'notaria', 'required']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Place of Birth"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="impuesto_predial_anual" class="form-label text-uppercase" data-placeholder="impuesto_predial_anual">impuesto_predial_anual</label>
                    {!! Form::text('impuesto_predial_anual', null, ['class' => 'form-control', 'id' => 'impuesto_predial_anual']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="tiene_administracion" class="form-label text-uppercase" data-placeholder="tiene_administracion">tiene_administracion</label>
                    {!! Form::text('tiene_administracion', null, ['class' => 'form-control', 'id' => 'tiene_administracion']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="wrap-input100">
                    <label for="avaluo_catastral" class="form-label text-uppercase" data-placeholder="avaluo_catastral">avaluo_catastral</label>
                    {!! Form::text('avaluo_catastral', null, ['class' => 'form-control', 'id' => 'avaluo_catastral']) !!}
                    {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="normas_usos" class="form-label text-uppercase" data-placeholder="normas_usos">normas_usos<span class="text-danger">*</span></label>
                    {!! Form::text('normas_usos', null, ['class' => 'form-control select2', 'id' => 'normas_usos', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="mejor_mayor_uso" class="form-label text-uppercase" data-placeholder="mejor_mayor_uso">mejor_mayor_uso<span class="text-danger">*</span></label>
                    {!! Form::text('mejor_mayor_uso', null, ['class' => 'form-control select2', 'id' => 'mejor_mayor_uso', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="observaciones" class="form-label text-uppercase" data-placeholder="observaciones">observaciones<span class="text-danger">*</span></label>
                    {!! Form::text('observaciones', null, ['class' => 'form-control select2', 'id' => 'observaciones', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="wrap-input100 validate-input" data-validate="State Is Required">
                    <label for="area_cierta" class="form-label text-uppercase" data-placeholder="area_cierta">area_cierta<span class="text-danger">*</span></label>
                    {!! Form::text('area_cierta', null, ['class' => 'form-control select2', 'id' => 'area_cierta', 'required']) !!}
                    <span class="focus-input100" data-placeholder="State"></span>
                </div>
            </div>
        </div>
    </div>

   

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Visita" id="btn_guardar_visita" name="btn_guardar_visita">
        </div>
    </div>
</div>
