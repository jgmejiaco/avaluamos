{{-- INICIO Modal EDITAR USUARIO --}}
{!! Form::open([
    'method' => 'PUT',
    'route' => ['usuarios.update', $usuario->id_usuario],
    'class' => 'mt-2',
    'autocomplete' => 'off',
    'id' => 'formEditarUsuario_' . $usuario->id_usuario,
]) !!}
@csrf

    <div class="rounded-top text-center" style="background-color: #337AB7; border: solid 1px #337AB7;">
        <h5 class="text-white m-0 pt-1 pb-1">Editar Usuario</h5>
    </div>

    {{ Form::hidden('id_usuario', $usuario->id_usuario ?? null, ['id' => 'id_usuario']) }}

    {{-- ====================================================== --}}

    <div class="modal-body p-0 m-0 rounded-bottom" style="border: solid 1px #337AB7;">
        {{-- Nombres / Apellidos --}}
        <div class="row m-2">
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="usu_nombres" class="form-label text-uppercase mb-0">Nombres
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('usu_nombres', $usuario->nombres ?? null, [
                        'class' => 'form-control',
                        'id' => 'usu_nombres',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="usu_apellidos" class="form-label text-uppercase mb-0">Apellidos
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('usu_apellidos', $usuario->apellidos ?? null, [
                        'class' => 'form-control',
                        'id' => 'usu_apellidos',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
        </div>

        {{-- Cargo / Rol --}}
        <div class="row m-2">
            <div class="col-12 col-md-6 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_cargo" class="form-label text-uppercase mb-0">Cargo
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'usu_cargo',
                        collect(['' => 'Seleccionar...'])->union($cargo),
                        $usuario->id_cargo ?? null,
                        ['class' => 'form-select', 'id' => 'usu_cargo', 'required' => 'required']
                    ) !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_rol" class="form-label text-uppercase mb-0">Rol
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'usu_rol',
                        collect(['' => 'Seleccionar...'])->union($rol),
                        $usuario->id_rol ?? null,
                        ['class' => 'form-select', 'id' => 'usu_rol', 'required' => 'required']
                    ) !!}
                </div>
            </div>
        </div>

        {{-- Tipo Documento / Número Documento --}}
        <div class="row m-2">
            <div class="col-12 col-md-6 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_id_doc" class="form-label text-uppercase mb-0">Tipo Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'usu_id_doc',
                        collect(['' => 'Seleccionar...'])->union($descripcion_documento),
                        $usuario->id_tipo_documento ?? null,
                        ['class' => 'form-select', 'id' => 'usu_id_doc', 'required' => 'required', 'data-doc-tipo' => 'usuario-editar']
                    ) !!}
                </div>
            </div>
            <div class="col-12 col-md-6 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_documento" class="form-label text-uppercase mb-0">Número Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('usu_documento', $usuario->numero_documento ?? null, [
                        'class' => 'form-control',
                        'id' => 'usu_documento',
                        'required' => 'required',
                        'data-doc-numero' => 'usuario-editar',
                    ]) !!}
                </div>
            </div>
        </div>

        {{-- Correo / Celular --}}
        <div class="row m-2">
            <div class="col-12 col-md-4 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_correo" class="form-label text-uppercase mb-0">Correo
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::email('usu_correo', $usuario->correo ?? null, [
                        'class' => 'form-control',
                        'id' => 'usu_correo',
                        'required' => 'required',
                        'data-validar-correo' => '1',
                    ]) !!}
                </div>
            </div>
            <div class="col-12 col-md-4 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_celular" class="form-label text-uppercase mb-0">Celular
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('usu_celular', $usuario->celular ?? null, [
                        'class' => 'form-control',
                        'id' => 'usu_celular',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
            <div class="col-12 col-md-4 mt-2">
                <div class="form-group d-flex flex-column">
                    <label for="usu_estado" class="form-label text-uppercase mb-0">Estado
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'usu_estado',
                        collect(['' => 'Seleccionar...'])->union($estado),
                        $usuario->id_estado ?? null,
                        ['class' => 'form-select', 'id' => 'usu_estado_' . $usuario->id_usuario, 'required' => 'required']
                    ) !!}
                </div>
            </div>
        </div>
    </div> {{-- FIN modal-body --}}

    {{-- ====================================================== --}}

    <div class="modal-footer d-block mt-0 border border-0">
        <div class="d-flex justify-content-center mt-3">
            <button id="btn_editar_user_{{ $usuario->id_usuario }}" type="submit" class="btn btn-success me-3 rounded"
                title="Guardar Configuración">
                <i class="fa fa-floppy-o" aria-hidden="true"> Editar</i>
            </button>

            <button id="btn_cancelar_user_{{ $usuario->id_usuario }}" type="button" class="btn btn-secondary rounded"
                title="Cancelar" data-bs-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true"> Cancelar</i>
            </button>
        </div>
    </div> {{-- modal-footer --}}

{!! Form::close() !!}
{{-- FINAL Modal EDITAR USUARIO --}}
