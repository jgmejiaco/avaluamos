<div id="div_formulario_creacion_usuario" class="border border-dark-subtle w-75 mx-auto p-5 rounded-4">
    <div class="row mb-5">
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="nombres" class="form-label">Nombres
                    <span class="text-danger">*</span>
                </label>
                {!! Form::text('nombres', old('nombres'), ['class' => 'form-control text-uppercase', 'id' => 'nombres', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="apellidos" class="form-label">Apellidos
                    <span class="text-danger">*</span>
                </label>
                {!! Form::text('apellidos', null, ['class' => 'form-control text-uppercase', 'id' => 'apellidos', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="id_cargo" class="form-label">Cargo
                    <span class="text-danger">*</span>
                </label>
                {!! Form::select('id_cargo', $cargo, null, ['class' => 'form-control select2', 'id' => 'id_cargo', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_rol" class="form-label">Rol
                    <span class="text-danger">*</span>
                </label>
                {!! Form::select('id_rol', $rol, null, ['class' => 'form-control select2', 'id' => 'id_rol', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_tipo_documento" class="form-label">Tipo de Documento
                    <span class="text-danger">*</span>
                </label>
                {!! Form::select('id_tipo_documento', $descripcion_documento, null, ['class' => 'form-control select2', 'id' => 'id_tipo_documento', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="numero_documento" class="form-label">Número Documento
                    <span class="text-danger">*</span>
                </label>
                {!! Form::text('numero_documento', null, ['class' => 'form-control', 'id' => 'numero_documento', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        {{-- @php
            use Carbon\Carbon;
            // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
        @endphp --}}
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="correo" class="form-label">Correo
                    <span class="text-danger">*</span>
                </label>
                {!! Form::email('correo', null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3" id="div_celular_whatsapp">
            <div class="form-group">
                <label for="celular" class="form-label" data-placeholder="celular">Celular
                    <span class="text-danger">*</span>
                </label>
                {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'celular', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="estado" class="form-label" data-placeholder="Estado">Estado
                    <span class="text-danger">*</span>
                </label>
                {!! Form::select('id_estado', $estado, null, ['class' => 'form-control select2', 'id' => 'id_estado', 'required']) !!}
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
