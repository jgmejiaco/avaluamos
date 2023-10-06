{!! Form::open(['method' => 'POST', 'route' => ['visita_estado_conservacion_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_estado_conservacion']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">ESTADO CONSERVACIÓN</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_factor_calidad" class="form-label text-uppercase">Factor de calidad</label>
                        {!! Form::select('id_factor_calidad', collect(['' => 'Seleccionar...'])->union($factor_calidad), isset($calcularAvaluo) ? $calcularAvaluo->id_factor_calidad : null, ['class' => 'form-control select2', 'id' => 'id_factor_calidad']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_factor_zona" class="form-label text-uppercase">Factor de zona</label>
                        {!! Form::select('id_factor_zona', collect(['' => 'Seleccionar...'])->union($factor_zona), isset($calcularAvaluo) ? $calcularAvaluo->id_factor_zona : null, ['class' => 'form-control select2', 'id' => 'id_factor_zona']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_factor_tiempo" class="form-label text-uppercase">Factor de tiempo a vía ppal</label>
                        {!! Form::select('id_factor_tiempo', collect(['' => 'Seleccionar...'])->union($factor_tiempo), isset($calcularAvaluo) ? $calcularAvaluo->id_factor_tiempo : null, ['class' => 'form-control select2', 'id' => 'id_factor_tiempo']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_factor_pendiente" class="form-label text-uppercase">Factor de pendiente</label>
                        {!! Form::select('id_factor_pendiente', collect(['' => 'Seleccionar...'])->union($factor_pendiente), isset($calcularAvaluo) ? $calcularAvaluo->id_factor_pendiente : null, ['class' => 'form-control select2', 'id' => 'id_factor_pendiente']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_valor_pendiente">
                    <div class="form-group d-flex flex-column">
                        <label for="valor_pendiente" class="form-label text-uppercase">Valor de pendiente</label>
                        {!! Form::text('valor_pendiente', isset($calcularAvaluo) ? $calcularAvaluo->valor_pendiente : null, ['class' => 'form-control', 'id' => 'valor_pendiente']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_factor_ubicacion" class="form-label text-uppercase">Factor de ubicación</label>
                        {!! Form::select('id_factor_ubicacion', collect(['' => 'Seleccionar...'])->union($factor_ubicacion), isset($calcularAvaluo) ? $calcularAvaluo->id_factor_ubicacion : null, ['class' => 'form-control select2', 'id' => 'id_factor_ubicacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_valor_ubicacion">
                    <div class="form-group d-flex flex-column">
                        <label for="valor_ubicacion" class="form-label text-uppercase">Valor de ubicación</label>
                        {!! Form::text('valor_ubicacion', isset($calcularAvaluo) ? $calcularAvaluo->valor_ubicacion : null, ['class' => 'form-control', 'id' => 'valor_ubicacion']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="id_estado_conservacion_opciones" class="form-label text-uppercase">estado de conservación</label>
                        {!! Form::select('id_estado_conservacion_opciones', collect(['' => 'Seleccionar...'])->union($estado_conservacion_opciones), isset($calcularAvaluo) ? $calcularAvaluo->id_estado_conservacion_opciones : null, ['class' => 'form-control select2', 'id' => 'id_estado_conservacion_opciones']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Estado Conservación">
            </div>
        </div>
    </div>
{!! Form::close() !!}
