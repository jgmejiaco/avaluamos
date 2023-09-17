{!! Form::open(['method' => 'POST', 'route' => ['visita_tecnica_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_visita_tecnica']) !!}
@csrf
    <div id="div_ppal_cliente_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
        {!! Form::hidden('id_cliente', isset($editarVisita) ? $editarVisita->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

        <h2 class="text-uppercase">VISITA TÉCNICA INMUEBLE</h2>

        <div class="row mb-2 mt-2" id="div_dirigido_a">
            <div class="col-12 col-md-4" id="">
                <div class="form-group">
                    <label for="dirigido_a" class="form-label text-uppercase">Nombre Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('dirigido_a', $dirigido_a, isset($editarVisita) ? $editarVisita->id_dirigido_a : null, ['class' => 'form-control select2', 'id' => 'dirigido_a', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="tipo_doc_empresa" class="form-label text-uppercase">Tipo Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_doc_empresa', $tipo_documento, isset($editarVisita) ? $editarVisita->id_doc_empresa : null, ['class' => 'form-control select2', 'id' => 'tipo_doc_empresa', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="doc_dirigido_a" class="form-label text-uppercase">Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::text('doc_dirigido_a', isset($editarVisita) ? $editarVisita->documento_empresa : null, ['class' => 'form-control text-uppercase', 'id' => 'doc_dirigido_a', 'readonly' => 'true', 'required']) !!}
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
                <label for="objeto_avaluo" class="form-label text-uppercase">Objeto Avalúo<span class="text-danger">*</span></label>

                @php
                    $arrayObjetoAvaluo = isset($editarVisita) ? explode(', ', $editarVisita->objeto_avaluo) : [];
                @endphp

                <div class="border rounded d-flex justify-content-around p-5">
                    @foreach(['Comercial', 'Jurídico', 'Rentas', 'Contable', 'Financiero', 'Reforma Vivienda', 'Compra Vivienda'] as $valor)
                        <div>
                            <label for="{{ strtoupper($valor) }}" class="form-label text-uppercase">{{ $valor }}</label>
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
                <div class="form-group">
                    <label for="pais" class="form-label text-uppercase">País<span class="text-danger">*</span></label>
                    {!! Form::select('pais', $paises, isset($editarVisita) ? $editarVisita->id_pais : null, ['class' => 'form-control select2', 'id' => 'pais', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="departamento" class="form-label text-uppercase">Departamento<span class="text-danger">*</span></label>
                    {!! Form::select('departamento', $departamentos, isset($editarVisita) ? $editarVisita->id_departamento : null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="ciudad" class="form-label text-uppercase">Municipio<span class="text-danger">*</span></label>
                    {!! Form::select('ciudad', $ciudades, isset($editarVisita) ? $editarVisita->id_ciudad : null, ['class' => 'form-control select2', 'id' => 'ciudad', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="sector" class="form-label text-uppercase">Sector</label>
                    {!! Form::text('sector', isset($editarVisita) ? $editarVisita->sector : null, ['class' => 'form-control text-uppercase', 'id' => 'sector']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="cerca_de" class="form-label text-uppercase">Cerca De<span class="text-danger">*</span></label>
                    {!! Form::text('cerca_de', isset($editarVisita) ? $editarVisita->cerca_de : null, ['class' => 'form-control select2', 'id' => 'cerca_de', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="barrio" class="form-label text-uppercase">Barrio<span class="text-danger">*</span></label>
                    {!! Form::text('barrio', isset($editarVisita) ? $editarVisita->barrio : null, ['class' => 'form-control text-uppercase', 'id' => 'barrio']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="unidad_edificio" class="form-label text-uppercase">Urb/Unidad/Edificio<span class="text-danger">*</span></label>
                    {!! Form::text('unidad_edificio', isset($editarVisita) ? $editarVisita->unidad_edificio : null, ['class' => 'form-control select2', 'id' => 'unidad_edificio', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="direccion" class="form-label text-uppercase">Dirección<span class="text-danger">*</span></label>
                    {!! Form::text('direccion', isset($editarVisita) ? $editarVisita->direccion : null, ['class' => 'form-control text-uppercase', 'id' => 'direccion']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_inmueble" class="form-label text-uppercase">Tipo Inmueble<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_inmueble', $tipo_inmueble, isset($editarVisita) ? $editarVisita->id_tipo_inmueble : null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="area" class="form-label text-uppercase">Área<span class="text-danger">*</span></label>
                    {!! Form::text('area', isset($editarVisita) ? $editarVisita->area : null, ['class' => 'form-control text-uppercase', 'id' => 'area', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="estrato" class="form-label text-uppercase">Estrato<span class="text-danger">*</span></label>
                    {!! Form::select('estrato', $indicador_numerico, isset($editarVisita) ? $editarVisita->estrato : null, ['class' => 'form-control select2', 'id' => 'estrato', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="numero_inmueble" class="form-label text-uppercase">Número Inmueble</label>
                    {!! Form::text('numero_inmueble', isset($editarVisita) ? $editarVisita->numero_inmueble : null, ['class' => 'form-control text-uppercase', 'id' => 'numero_inmueble']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_parqueaderos" class="form-label text-uppercase">Cantidad Parqueaderos</label>
                    {!! Form::select('cant_parqueaderos', $indicador_numerico, isset($editarVisita) ? $editarVisita->parqueaderos : null, ['class' => 'form-control select2', 'id' => 'cant_parqueaderos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_cuarto util" class="form-label text-uppercase">Cantidad Cuartos Útiles</label>
                    {!! Form::select('cant_cuarto_util', $indicador_numerico, isset($editarVisita) ? $editarVisita->cuarto_util : null, ['class' => 'form-control select2', 'id' => 'cant_cuarto util']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_kioscos" class="form-label text-uppercase">Cantidad Kioscos</label>
                    {!! Form::select('cant_kioscos', $indicador_numerico, isset($editarVisita) ? $editarVisita->kioskos : null, ['class' => 'form-control select2', 'id' => 'cant_kioscos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_piscinas" class="form-label text-uppercase">Cantidad Piscinas</label>
                    {!! Form::select('cant_piscinas', $indicador_numerico, isset($editarVisita) ? $editarVisita->piscinas : null, ['class' => 'form-control select2', 'id' => 'cant_piscinas']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_establos" class="form-label text-uppercase">Cantidad Establos</label>
                    {!! Form::select('cant_establos', $indicador_numerico, isset($editarVisita) ? $editarVisita->establos : null, ['class' => 'form-control select2', 'id' => 'cant_establos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_billares" class="form-label text-uppercase">Cantidad Billares</label>
                    {!! Form::select('cant_billares', $indicador_numerico, isset($editarVisita) ? $editarVisita->billares : null, ['class' => 'form-control select2', 'id' => 'cant_billares']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="porcentaje_descuento" class="form-label text-uppercase">Porcentaje Descuento<span class="text-danger">*</span></label>
                    {!! Form::number('porcentaje_descuento', isset($editarVisita) ? $editarVisita->porcentaje_descuento : null, ['class' => 'form-control text-uppercase', 'id' => 'porcentaje_descuento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="valor_cotizacion" class="form-label text-uppercase">Valor Cotizacion<span class="text-danger">*</span></label>
                    {!! Form::number('valor_cotizacion', isset($editarVisita) ? $editarVisita->valor_cotizacion : null, ['class' => 'form-control text-uppercase', 'id' => 'valor_cotizacion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="latitud" class="form-label text-uppercase">Latitud<span class="text-danger">*</span></label>
                    {!! Form::text('latitud', isset($editarVisita) ? $editarVisita->latitud : null, ['class' => 'form-control select2', 'id' => 'latitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="longitud" class="form-label text-uppercase">Longitud<span class="text-danger">*</span></label>
                    {!! Form::text('longitud', isset($editarVisita) ? $editarVisita->longitud : null, ['class' => 'form-control select2', 'id' => 'longitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12" id="">
                <div class="form-group">
                    <label for="obser_visita_tecnica" class="form-label text-uppercase">Observaciones Visita Técnica<span class="text-danger">*</span></label>
                    {!! Form::textarea('obser_visita_tecnica', isset($editarVisita) ? $editarVisita->obser_visita : null, ['class' => 'form-control select2', 'id' => 'obser_visita_tecnica', 'required']) !!}
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitado" class="form-label text-uppercase">Visitado<span class="text-danger">*</span></label>
                    {!! Form::select('visitado', $si_no, isset($editarVisita) ? $editarVisita->id_visitado : null, ['class' => 'form-control select2', 'id' => 'visitado', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_visita" class="form-label text-uppercase">Fecha Inspección<span class="text-danger">*</span></label>
                    {!! Form::date('fecha_visita', isset($editarVisita) ? $editarVisita->fecha_visita : null, ['class' => 'form-control select2', 'id' => 'fecha_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="hora_visita" class="form-label text-uppercase">Hora Visita<span class="text-danger">*</span></label>
                    {!! Form::time('hora_visita', isset($editarVisita) ? $editarVisita->hora_visita : null, ['class' => 'form-control', 'id' => 'hora_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitador" class="form-label text-uppercase">visitador<span class="text-danger">*</span></label>
                    {!! Form::select('visitador', $avaluador, isset($editarVisita) ? $editarVisita->id_visitador : null, ['class' => 'form-control text-uppercase select2', 'id' => 'visitador', 'required']) !!}
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
