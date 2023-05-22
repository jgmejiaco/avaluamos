<div id="div_formulario_creacion_usuario" class="border border-dark-subtle w-75 mx-auto p-5 rounded-4">
    <div class="row mb-5">
        <div class="col-12 col-md-3">
            <div class="form-group wrap-input100 validate-input" data-validate="Required">
                <label for="nombres" class="form-label" data-placeholder="nombres">Nombres<span class="text-danger">*</span></label>
                {!! Form::text('nombres', old('nombres'), ['class' => 'form-control text-uppercase', 'id' => 'nombres', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="nombres"></span> --}}
            </div>
            {{-- {!! Form::hidden('id_usuario', isset($usuario) ? $usuario->id_user : null, ['class' => 'input100', 'id' => 'id_usuario']) !!} --}}
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group wrap-input100 validate-input" data-validate="Required">
                <label for="apellidos" class="form-label" data-placeholder="apellidos">Apellidos<span class="text-danger">*</span></label>
                {!! Form::text('apellidos', null, ['class' => 'form-control text-uppercase', 'id' => 'apellidos', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="apellidos"></span> --}}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3" id="">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="id_cargo" class="form-label" data-placeholder="Municipio">Cargo<span class="text-danger">*</span></label>
                {!! Form::select('id_cargo', $cargo, null, ['class' => 'form-control select2', 'id' => 'id_cargo', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Skype"></span> --}}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="id_rol" class="form-label" data-placeholder="Roll">Rol<span class="text-danger">*</span></label>
                {!! Form::select('id_rol', $rol, null, ['class' => 'form-control select2', 'id' => 'id_rol', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Role"></span> --}}
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row mb-5">
        <div class="col-12 col-md-3">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="id_tipo_documento" class="form-label" data-placeholder="id_tipo_documento">Tipo de Documento<span class="text-danger">*</span></label>
                {!! Form::select('id_tipo_documento', $descripcion_documento, null, ['class' => 'form-control select2', 'id' => 'id_tipo_documento', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Document Type"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="numero_documento" class="form-label" data-placeholder="numero_documento">Número Documento<span class="text-danger">*</span></label>
                {!! Form::text('numero_documento', null, ['class' => 'form-control', 'id' => 'numero_documento', 'required']) !!}
                <span class="focus-input100" data-placeholder="Document Number"></span>
            </div>
        </div>
        {{-- @php
            use Carbon\Carbon;
            // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
        @endphp --}}

        <div class="col-12 col-md-3">
            <div class="wrap-input100">
                <label for="fecha_nacimiento" class="form-label" data-placeholder="fecha_nacimiento">Fecha Nacimiento</label>
                {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'id' => 'fecha_nacimiento']) !!}
                {{-- <span class="focus-input100" data-placeholder="Date of Birth"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_lugar_nacimiento" class="form-label" data-placeholder="Municipio">Ciudad Nacimiento<span class="text-danger">*</span></label>
                {!! Form::select('id_lugar_nacimiento', $ciudad, null, ['class' => 'form-control select2', 'id' => 'id_lugar_nacimiento', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_ciudad" class="form-label" data-placeholder="Municipio">Ciudad Residencia<span class="text-danger">*</span></label>
                {!! Form::select('id_ciudad', $ciudad, null, ['class' => 'form-control select2', 'id' => 'id_ciudad', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Residence City"></span> --}}
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row mb-5">
        <div class="col-12 col-md-3" id="div_correo">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="correo" class="form-label" data-placeholder="correo">Correo<span class="text-danger">*</span></label>
                {!! Form::email('correo', null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                {{-- <span class="focus-input100 text-danger" data-placeholder="Email" id="correo"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="direccion" class="form-label" data-placeholder="direccion">Dirección<span class="text-danger">*</span></label>
                {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase', 'id' => 'direccion', 'required']) !!}
                {{-- <span class="focus-input100" data-placeholder="Place of Birth"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3" id="div_celular_whatsapp">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="celular" class="form-label" data-placeholder="celular">Celular<span class="text-danger">*</span></label>
                {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'celular', 'required']) !!}
                {{-- <span class="focus-input100 text-danger" data-placeholder="Whatsapp" id="celular"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3" id="div_telefono">
            <div class="wrap-input100 validate-input" data-validate="Required">
                <label for="telefono_fijo" class="form-label" data-placeholder="telefono_fijo">Teléfono Fijo</label>
                {!! Form::text('telefono_fijo', null, ['class' => 'form-control', 'id' => 'telefono_fijo']) !!}
                {{-- <span class="focus-input100" data-placeholder="Phone"></span> --}}
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row mb-5">
        <div class="col-12 col-md-3" id="">
            <div class="wrap-input100">
                <label for="nombre_contacto" class="form-label" data-placeholder="nombre_contacto">Nombre Contacto</label>
                {!! Form::text('nombre_contacto', null, ['class' => 'form-control', 'id' => 'nombre_contacto']) !!}
                {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3" id="">
            <div class="wrap-input100">
                <label for="telefono_contacto" class="form-label" data-placeholder="telefono_contacto">Teléfono Contacto</label>
                {!! Form::text('telefono_contacto', null, ['class' => 'form-control', 'id' => 'telefono_contacto']) !!}
                {{-- <span class="focus-input100" data-placeholder="Optional Contact"></span> --}}
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="wrap-input100 validate-input" data-validate="State Is Required">
                <label for="estado" class="form-label" data-placeholder="Estado">Estado<span class="text-danger">*</span></label>
                {!! Form::select('id_estado', $estado, null, ['class' => 'form-control select2', 'id' => 'id_estado', 'required']) !!}
                <span class="focus-input100" data-placeholder="State"></span>
            </div>
        </div>
    </div>

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Crear Usuario" id="btn_save_user" name="btn_save_user">
        </div>
    </div>
</div>
