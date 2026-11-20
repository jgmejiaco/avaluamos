{!! Form::hidden('id_visita_calendario_editar', null, ['id' => 'id_visita_calendario_editar']) !!}

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="nombre_cliente_editar" class="fs-14">Nombre cliente
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('nombre_cliente_editar', null, ['class' => 'form-control', 'id' => 'nombre_cliente_editar', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="celular_editar" class="fs-14">Celular
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('celular_editar', null, ['class' => 'form-control', 'id' => 'celular_editar', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="tipo_inmueble_editar" class="fs-14">Tipo Inmueble
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('tipo_inmueble_editar', collect(['' => 'Seleccionar...'])->union($tipo_inmueble), null, ['class' => 'form-select w-100', 'id' => 'tipo_inmueble_editar', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="ciudad_editar" class="fs-14">Municipio
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('ciudad_editar', collect(['' => 'Seleccionar...'])->union($ciudades_dpto), null, ['class' => 'form-select w-100', 'id' => 'ciudad_editar', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="barrio_editar" class="fs-14">Barrio
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('barrio_editar', null, ['class' => 'form-control', 'id' => 'barrio_editar', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="direccion_editar" class="fs-14">Dirección
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('direccion_editar', null, ['class' => 'form-control', 'id' => 'direccion_editar', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="fecha_visita_editar" class="fs-14">Fecha Visita
            <span class="text-danger">*</span>
        </label>
        {!! Form::input('datetime-local', 'fecha_visita_editar', null, ['class' => 'form-control', 'id' => 'fecha_visita_editar', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="visitado_editar" class="fs-14">Visitado
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('visitado_editar', collect(['' => 'Seleccionar...'])->union($si_no_calendario), null, ['class' => 'form-select', 'id' => 'visitado_editar', 'required']) !!}
    </div>
</div>
