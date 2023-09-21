{!! Form::open(['method' => 'POST', 'route' => ['visita_info_sector_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_info_sector']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase mb-5">INFORMACIÓN DEL SECTOR</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="barrios_sectores" class="form-label text-uppercase">Barrios/Sectores<span class="text-danger">*</span></label>
                        {!! Form::text('barrios_sectores', isset($editarVisita) ? $editarVisita->barrios_sectores : null, ['class' => 'form-control', 'id' => 'barrios_sectores', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="actividad_predominante" class="form-label text-uppercase">Actividad Predominante<span class="text-danger">*</span></label>
                        {!! Form::select('actividad_predominante', collect(['' => 'Seleccionar...'])->union($uso_inmueble), isset($editarVisita) ? $editarVisita->actividad_predominante : null, ['class' => 'form-control select2', 'id' => 'actividad_predominante', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="transporte" class="form-label text-uppercase">Transporte</label>
                        {!! Form::text('transporte', isset($editarVisita) ? $editarVisita->transporte : null, ['class' => 'form-control', 'id' => 'transporte']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vias_acceso" class="form-label text-uppercase">Vias de Acceso<span class="text-danger">*</span></label>
                        {!! Form::text('vias_acceso', isset($editarVisita) ? $editarVisita->vias_acceso : null, ['class' => 'form-control', 'id' => 'vias_acceso', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Info Sector" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
