<div class="modal-header">
    <h5 class="modal-title text-uppercase">Editar Rol</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
</div>

{!! Form::open([
    'route' => ['roles.update', $rol->id],
    'method' => 'PUT',
    'id' => 'formEditarRol_'.$rol->id,
    'autocomplete' => 'off'
]) !!}
    <div class="modal-body">
        <div class="form-group">
            <label for="name_{{ $rol->id }}" class="form-label">Nombre del rol <span class="text-danger">*</span></label>
            {!! Form::text('name', $rol->name, ['class' => 'form-control', 'id' => 'name_'.$rol->id, 'required']) !!}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
{!! Form::close() !!}
