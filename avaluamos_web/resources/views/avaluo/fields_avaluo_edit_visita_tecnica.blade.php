{!! Form::open(['method' => 'POST', 'route' => ['avaluo_visita_tecnica_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_visita_tecnica']) !!}
@csrf
    <div id="div_ppal_cliente_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        {!! Form::hidden('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
        {!! Form::hidden('id_cliente', isset($calcularAvaluo) ? $calcularAvaluo->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

        <h2 class="text-uppercase">VISITA TÉCNICA INMUEBLE</h2>

        <div class="row mb-2 mt-2" id="div_dirigido_a">
            <div class="col-12 col-md-4" id="">
                <div class="form-group d-flex flex-column">
                    <label for="dirigido_a" class="form-label text-uppercase mb-0">Nombre Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('dirigido_a', collect(['' => 'Seleccionar...'])->union($dirigido_a), isset($calcularAvaluo) ? $calcularAvaluo->id_dirigido_a : null, ['class' => 'form-select', 'id' => 'dirigido_a', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-4">
                <div class="form-group d-flex flex-column">
                    <label for="tipo_doc_empresa" class="form-label text-uppercase mb-0">Tipo Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_doc_empresa', collect(['' => 'Seleccionar...'])->union($tipo_documento), isset($calcularAvaluo) ? $calcularAvaluo->id_doc_empresa : '', ['class' => 'form-select', 'id' => 'tipo_doc_empresa', 'readonly'=>'true','required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-4">
                <div class="form-group d-flex flex-column">
                    <label for="doc_dirigido_a" class="form-label text-uppercase mb-0">Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::text('doc_dirigido_a', isset($calcularAvaluo) ? $calcularAvaluo->documento_empresa : null, ['class' => 'form-control text-uppercase', 'id' => 'doc_dirigido_a', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>
        </div> {{-- FIN div_dirigido_a --}}

        <hr style="border: 1px solid grey">

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row mb-1" id="div_objeto_avaluo">
            <div class="col-12 mt-5 mb-5">
                <label for="objeto_avaluo" class="form-label text-uppercase mb-0">Objeto Avalúo<span class="text-danger">*</span></label>

                @php
                    $arrayObjetoAvaluo = isset($calcularAvaluo) ? explode(', ', $calcularAvaluo->objeto_avaluo) : [];
                @endphp

                <div class="border rounded d-flex justify-content-around p-5">
                    @foreach(['Comercial', 'Jurídico', 'Rentas', 'Contable', 'Financiero', 'Reforma Vivienda', 'Compra Vivienda'] as $valor)
                        <div>
                            <label for="{{ strtoupper($valor) }}" class="form-label text-uppercase mb-0">{{ $valor }}</label>
                            {!! Form::checkbox('objeto_avaluo[]', $valor, in_array($valor, $arrayObjetoAvaluo), ['class' => '', 'id' => strtoupper($valor)]) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div> {{-- FIN div_objeto_avaluo --}}
        
        <hr style="border: 1px solid grey">

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row mb-1" id="div_visita_tecnica">
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="pais" class="form-label text-uppercase mb-0">País<span class="text-danger">*</span></label>
                    {!! Form::select('pais', collect(['' => 'Seleccionar...'])->union($paises), isset($calcularAvaluo) ? $calcularAvaluo->visita_pais : null, ['class' => 'form-select', 'id' => 'pais', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="departamento" class="form-label text-uppercase mb-0">Departamento<span class="text-danger">*</span></label>
                    {!! Form::select('departamento', collect(['' => 'Seleccionar...'])->union($departamentos), isset($calcularAvaluo) ? $calcularAvaluo->id_vis_dpto : null, ['class' => 'form-select', 'id' => 'vis_dpto', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="ciudad" class="form-label text-uppercase mb-0">Municipio<span class="text-danger">*</span></label>
                    {!! Form::select('ciudad', collect(['' => 'Seleccionar...'])->union($ciudades), isset($calcularAvaluo) ? $calcularAvaluo->vis_ciudad : null, ['class' => 'form-select', 'id' => 'vis_ciudad', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="comuna" class="form-label text-uppercase mb-0">Comuna</label>
                    {!! Form::select('comuna', collect(['' => 'Seleccionar...'])->union($comunas), isset($calcularAvaluo) ? $calcularAvaluo->id_comuna : null, ['class' => 'form-select', 'id' => 'comuna']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="sector" class="form-label text-uppercase mb-0">Sector</label>
                    {!! Form::text('sector', isset($calcularAvaluo) ? $calcularAvaluo->sector : null, ['class' => 'form-control text-uppercase', 'id' => 'sector']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group d-flex flex-column">
                    <label for="cerca_de" class="form-label text-uppercase mb-0">Cerca De</label>
                    {!! Form::text('cerca_de', isset($calcularAvaluo) ? $calcularAvaluo->cerca_de : null, ['class' => 'form-control', 'id' => 'cerca_de']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="barrio" class="form-label text-uppercase mb-0">Barrio</label>
                    {!! Form::text('barrio', isset($calcularAvaluo) ? $calcularAvaluo->barrio : null, ['class' => 'form-control text-uppercase', 'id' => 'barrio']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="unidad_edificio" class="form-label text-uppercase mb-0">Urb/Unidad/Edificio</label>
                    {!! Form::text('unidad_edificio', isset($calcularAvaluo) ? $calcularAvaluo->unidad_edificio : null, ['class' => 'form-control', 'id' => 'unidad_edificio']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="direccion" class="form-label text-uppercase mb-0">Dirección</label>
                    {!! Form::text('direccion', isset($calcularAvaluo) ? $calcularAvaluo->direccion : null, ['class' => 'form-control text-uppercase', 'id' => 'direccion']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="tipo_inmueble" class="form-label text-uppercase mb-0">Tipo Inmueble<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_inmueble', collect(['' => 'Seleccionar...'])->union($tipo_inmueble), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_inmueble : null, ['class' => 'form-select', 'id' => 'tipo_inmueble', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="area" class="form-label text-uppercase mb-0">Área</label>
                    {!! Form::text('area', isset($calcularAvaluo) ? $calcularAvaluo->area : null, ['class' => 'form-control text-uppercase', 'id' => 'area']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="estrato" class="form-label text-uppercase mb-0">Estrato<span class="text-danger">*</span></label>
                    {!! Form::select('estrato', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->estrato : null, ['class' => 'form-select', 'id' => 'estrato', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="numero_inmueble" class="form-label text-uppercase mb-0">Número Inmueble</label>
                    {!! Form::text('numero_inmueble', isset($calcularAvaluo) ? $calcularAvaluo->numero_inmueble : null, ['class' => 'form-control text-uppercase', 'id' => 'numero_inmueble']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="porcentaje_descuento" class="form-label text-uppercase mb-0">Porcentaje Descuento<span class="text-danger">*</span></label>
                    {!! Form::number('porcentaje_descuento', isset($calcularAvaluo) ? $calcularAvaluo->porcentaje_descuento : null, ['class' => 'form-control text-uppercase', 'id' => 'porcentaje_descuento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="valor_cotizacion" class="form-label text-uppercase mb-0">Valor Cotizacion<span class="text-danger">*</span></label>
                    {!! Form::number('valor_cotizacion', isset($calcularAvaluo) ? $calcularAvaluo->valor_cotizacion : null, ['class' => 'form-control text-uppercase', 'id' => 'valor_cotizacion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="latitud" class="form-label text-uppercase mb-0">Latitud<span class="text-danger">*</span></label>
                    {!! Form::text('latitud', isset($calcularAvaluo) ? $calcularAvaluo->latitud : null, ['class' => 'form-control', 'id' => 'latitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="longitud" class="form-label text-uppercase mb-0">Longitud<span class="text-danger">*</span></label>
                    {!! Form::text('longitud', isset($calcularAvaluo) ? $calcularAvaluo->longitud : null, ['class' => 'form-control', 'id' => 'longitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12" id="">
                <div class="form-group d-flex flex-column">
                    <label for="obser_visita_tecnica" class="form-label text-uppercase mb-0">Observaciones Visita Técnica<span class="text-danger">*</span></label>
                    {!! Form::textarea('obser_visita_tecnica', isset($calcularAvaluo) ? $calcularAvaluo->obser_visita : null, ['class' => 'form-control', 'id' => 'obser_visita_tecnica', 'required']) !!}
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="visitado" class="form-label text-uppercase mb-0">Visitado<span class="text-danger">*</span></label>
                    {!! Form::select('visitado', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->id_visitado : null, ['class' => 'form-select', 'id' => 'visitado', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            @php
                use Carbon\Carbon;
                $fechaVisitaTimeStamp = $calcularAvaluo->fecha_visita;
                $fechaVisita = isset($fechaVisitaTimeStamp) ? Carbon::parse($calcularAvaluo->fecha_visita)->toDateString() : null;
            @endphp
            
            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="fecha_visita" class="form-label text-uppercase mb-0">Fecha Inspección<span class="text-danger">*</span></label>
                    {!! Form::date('fecha_visita', isset($calcularAvaluo) ? $fechaVisita : null, ['class' => 'form-control', 'id' => 'fecha_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group d-flex flex-column">
                    <label for="hora_visita" class="form-label text-uppercase mb-0">Hora Visita<span class="text-danger">*</span></label>
                    {!! Form::time('hora_visita', isset($calcularAvaluo) ? $calcularAvaluo->hora_visita : null, ['class' => 'form-control', 'id' => 'hora_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            

            <div class="col-12 col-md-3">
                <div class="form-group d-flex flex-column">
                    <label for="visitador" class="form-label text-uppercase mb-0">visitador<span class="text-danger">*</span></label>
                    {!! Form::select('visitador', collect(['' => 'Seleccionar...'])->union($avaluador), isset($calcularAvaluo) ? $calcularAvaluo->id_visitador : null, ['class' => 'form-select text-uppercase', 'id' => 'visitador', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
        </div> {{-- FIN div_visita_tecnica --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Editar Visita Técnica" id="btn_editar_visita_tecnica">
            </div>
        </div>
    </div> {{-- FIN div_ppal_cliente_visita --}}
{!! Form::close() !!}
