<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="nombre_cliente" class="fs-14">Nombre cliente
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('nombre_cliente', null, ['class' => 'form-control', 'id' => 'nombre_cliente', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="celular" class="fs-14">Celular
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('celular', null, ['class' => 'form-control', 'id' => 'celular', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="tipo_inmueble" class="fs-14">Tipo Inmueble
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('tipo_inmueble', collect(['' => 'Seleccionar...'])->union($tipo_inmueble), null, ['class' => 'form-select w-100', 'id' => 'tipo_inmueble', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="ciudad" class="fs-14">Municipio
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('ciudad', collect(['' => 'Seleccionar...'])->union($ciudades_dpto), null, ['class' => 'form-select w-100', 'id' => 'ciudad', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="barrio" class="fs-14">Barrio
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('barrio', null, ['class' => 'form-control', 'id' => 'barrio', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="direccion" class="fs-14">Dirección
            <span class="text-danger">*</span>
        </label>
        {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion', 'required']) !!}
    </div>
</div>

<div class="flex-row-edit mt-2">
    <div class="form-group flex-column-edit">
        <label for="fecha_visita" class="fs-14">Fecha Visita
            <span class="text-danger">*</span>
        </label>
        {!! Form::input('datetime-local', 'fecha_visita', null, ['class' => 'form-control', 'id' => 'fecha_visita', 'required']) !!}
    </div>

    <div class="form-group flex-column-edit">
        <label for="visitado" class="fs-14">Visitado
            <span class="text-danger">*</span>
        </label>
        {!! Form::select('visitado', collect(['' => 'Seleccionar...'])->union($si_no_calendario), null, ['class' => 'form-select', 'id' => 'visitado', 'required']) !!}
    </div>
</div>
