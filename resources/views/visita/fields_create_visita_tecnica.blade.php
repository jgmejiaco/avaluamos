{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_crear_visita']) !!}
@csrf
    <div id="div_crear_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <h2 class="text-uppercase mb-5">VISITA TÉCNICA INMUEBLE</h2>

        {{-- @php
            dd($crearVisitaCliente);
        @endphp --}}

        <div class="row mb-1" id="div_campos_cliente">
            {!! Form::hidden('id_cliente', isset($crearVisitaCliente) ? $crearVisitaCliente->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_nombres" class="form-label text-uppercase">Nombre Solicitante
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('cli_nombres', (isset($crearVisitaCliente) ? $crearVisitaCliente->cli_nombres : null), ['class' => 'form-control text-uppercase select2', 'id' => 'cli_nombres', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_tipo_doc_crear" class="form-label text-uppercase">Tipo Documento Cliente</label>
                    {!! Form::select('cli_tipo_doc_crear', $tipo_documento, isset($crearVisitaCliente) ? $crearVisitaCliente->cli_tipo_doc : null, ['class' => 'form-control select2', 'id' => 'cli_tipo_doc_crear']) !!}
                    {{-- {!! Form::text('cli_tipo_doc_crear', isset($crearVisitaCliente) ? $crearVisitaCliente->cli_tipo_doc : null, ['class' => 'form-control', 'id' => 'cli_tipo_doc_crear']) !!} --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="documento_cliente" class="form-label text-uppercase">Documento Cliente</label>
                    {!! Form::text('documento_cliente', isset($crearVisitaCliente) ? $crearVisitaCliente->documento_cliente : null, ['class' => 'form-control text-uppercase', 'id' => 'documento_cliente']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="celular" class="form-label text-uppercase">Celular
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('celular', isset($crearVisitaCliente) ? $crearVisitaCliente->cli_celular : null, ['class' => 'form-control text-uppercase', 'id' => 'celular', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="correo" class="form-label text-uppercase">Email
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::email('correo', isset($crearVisitaCliente) ? $crearVisitaCliente->cli_email : null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="tipo_persona" class="form-label text-uppercase">Tipo Persona
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('tipo_persona', $tipo_persona, isset($crearVisitaCliente) ? $crearVisitaCliente->tipo_persona : null, ['class' => 'form-control select2', 'id' => 'tipo_persona', 'required']) !!}
                    {{-- {!! Form::text('tipo_persona', isset($crearVisitaCliente) ? $crearVisitaCliente->tipo_persona : null, ['class' => 'form-control', 'id' => 'tipo_persona', 'required']) !!} --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="id_referido_por" class="form-label text-uppercase">Referido Por:
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('referido_por', $referido_por, isset($crearVisitaCliente) ? $crearVisitaCliente->referido_por : null, ['class' => 'form-control select2', 'id' => 'referido_por', 'required']) !!}
                    {{-- {!! Form::text('referido_por', isset($crearVisitaCliente) ? $crearVisitaCliente->referido_por : null, ['class' => 'form-control', 'id' => 'referido_por', 'required']) !!} --}}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_red_social">
                <div class="form-group">
                    <label for="red_social" class="form-label text-uppercase">Red social
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('red_social', $red_social, isset($crearVisitaCliente) ? $crearVisitaCliente->red_social : null, ['class' => 'form-control select2', 'id' => 'red_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_nombre_refiere">
                <div class="form-group">
                    <label for="nombre_quien_refiere" class="form-label text-uppercase">Nombre quien refiere
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('nombre_quien_refiere', isset($crearVisitaCliente) ? $crearVisitaCliente->nombre_quien_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_quien_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_empresa_refiere">
                <div class="form-group">
                    <label for="empresa_que_refiere" class="form-label text-uppercase">Empresa que refiere
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('empresa_que_refiere', isset($crearVisitaCliente) ? $crearVisitaCliente->empresa_que_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'empresa_que_refiere']) !!}
                </div>
            </div>
        </div> {{-- FIN div_campos_cliente --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <hr style="border: 1px solid grey">

        <div class="row mb-2 mt-2" id="div_dirigido_a">
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="dirigido_a" class="form-label text-uppercase">Nombre Dirigido A
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('dirigido_a', $dirigido_a, null, ['class' => 'form-control select2', 'id' => 'dirigido_a', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_doc_empresa" class="form-label text-uppercase">Tipo Documento Dirigido A
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('tipo_doc_empresa', $tipo_documento, null, ['class' => 'form-control select2', 'id' => 'tipo_doc_empresa', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="doc_dirigido_a" class="form-label text-uppercase">Documento Dirigido A
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('doc_dirigido_a', null, ['class' => 'form-control text-uppercase', 'id' => 'doc_dirigido_a', 'readonly' => 'true', 'required']) !!}
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

                <div class="border rounded d-flex justify-content-around p-5">
                    <div>
                        <label for="comercial" class="form-label text-uppercase">comercial</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Comercial', null, ['class' => '', 'id' => 'comercial'])!!}
                    </div>

                    <div>
                        <label for="juridico" class="form-label text-uppercase">Jurídico</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Jurídico', null, ['class' => '', 'id' => 'juridico'])!!}
                    </div>

                    <div>
                        <label for="rentas" class="form-label text-uppercase">Rentas</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Rentas', null, ['class'=>'', 'id'=>'rentas'])!!}
                    </div>

                    <div>
                        <label for="contable" class="form-label text-uppercase">Contable</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Contable', null, ['class'=>'', 'id'=>'contable'])!!}
                    </div>

                    <div>
                        <label for="financiero" class="form-label text-uppercase">Financiero</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Financiero', null, ['class'=>'', 'id'=>'financiero'])!!}
                    </div>

                    <div>
                        <label for="reforma_vivienda" class="form-label text-uppercase">Reforma Vivienda</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Reforma Vivienda', null, ['class'=>'', 'id'=>'reforma_vivienda'])!!}
                    </div>

                    <div>
                        <label for="compra_vivienda" class="form-label text-uppercase">Compra Vivienda</label>
                        {!!Form::checkbox('objeto_avaluo[]', 'Compra Vivienda', null, ['class'=>'', 'id'=>'compra_vivienda'])!!}
                    </div>
                </div>
            </div>
        </div> {{-- FIN div_objeto_avaluo --}}

        <hr style="border: 1px solid grey">

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row mb-1" id="div_ubicacion_detalles">
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="pais" class="form-label text-uppercase">País</label>
                    {!! Form::select('pais', $pais, null, ['class' => 'form-control select2', 'id' => 'pais']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="departamento" class="form-label text-uppercase">Departamento</label>
                    {!! Form::select('departamento', $departamento_estado, null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="ciudad" class="form-label text-uppercase">Municipio
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('ciudad', $ciudad, null, ['class' => 'form-control select2', 'id' => 'ciudad', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="sector" class="form-label text-uppercase">Sector</label>
                    {!! Form::text('sector', null, ['class' => 'form-control text-uppercase', 'id' => 'sector']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="cerca_de" class="form-label text-uppercase">Cerca De</label>
                    {!! Form::text('cerca_de', null, ['class' => 'form-control select2', 'id' => 'cerca_de']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="barrio" class="form-label text-uppercase">Barrio</label>
                    {!! Form::text('barrio', null, ['class' => 'form-control text-uppercase', 'id' => 'barrio']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="unidad_edificio" class="form-label text-uppercase">Urb/Unidad/Edificio</label>
                    {!! Form::text('unidad_edificio', null, ['class' => 'form-control select2', 'id' => 'unidad_edificio']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="direccion" class="form-label text-uppercase">Dirección</label>
                    {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase', 'id' => 'direccion']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_inmueble" class="form-label text-uppercase">Tipo Inmueble
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('tipo_inmueble', $tipo_inmueble, null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="area" class="form-label text-uppercase">Área m<sup>2</sup><span class="text-danger">*</span></label>
                    {!! Form::text('area', null, ['class' => 'form-control text-uppercase', 'id' => 'area', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="estrato" class="form-label text-uppercase">Estrato<span class="text-danger">*</span></label>
                    {!! Form::select('estrato', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'estrato', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="numero_inmueble" class="form-label text-uppercase">Número Inmueble</label>
                    {!! Form::text('numero_inmueble', null, ['class' => 'form-control text-uppercase', 'id' => 'numero_inmueble']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_parqueaderos" class="form-label text-uppercase">Cantidad Parqueaderos</label>
                    {!! Form::select('cant_parqueaderos', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_parqueaderos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_cuarto_util" class="form-label text-uppercase">Cantidad Cuartos Útiles</label>
                    {!! Form::select('cant_cuarto_util', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_cuarto_util']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_kioscos" class="form-label text-uppercase">Cantidad Kioscos</label>
                    {!! Form::select('cant_kioscos', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_kioscos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_piscinas" class="form-label text-uppercase">Cantidad Piscinas</label>
                    {!! Form::select('cant_piscinas', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_piscinas']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_establos" class="form-label text-uppercase">Cantidad Establos</label>
                    {!! Form::select('cant_establos', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_establos']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cant_billares" class="form-label text-uppercase">Cantidad Billares</label>
                    {!! Form::select('cant_billares', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_billares']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="porcentaje_descuento" class="form-label text-uppercase">Porcentaje Descuento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::number('porcentaje_descuento', null, ['class' => 'form-control text-uppercase', 'id' => 'porcentaje_descuento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="valor_cotizacion" class="form-label text-uppercase">Valor Cotizacion
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::number('valor_cotizacion', null, ['class' => 'form-control text-uppercase', 'id' => 'valor_cotizacion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="latitud" class="form-label text-uppercase">Latitud</label>
                    {!! Form::text('latitud', null, ['class' => 'form-control select2', 'id' => 'latitud']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="longitud" class="form-label text-uppercase">Longitud</label>
                    {!! Form::text('longitud', null, ['class' => 'form-control select2', 'id' => 'longitud']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12" id="">
                <div class="form-group">
                    <label for="obser_visita_tecnica" class="form-label text-uppercase">Observaciones Visita Técnica Inmueble</label>
                    {!! Form::textarea('obser_visita_tecnica', null, ['class' => 'form-control select2', 'id' => 'obser_visita_tecnica']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitado" class="form-label text-uppercase">Visitado
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select('visitado', $si_no, 2, ['class' => 'form-control select2', 'id' => 'visitado', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_visita" class="form-label text-uppercase">Fecha Inspección</label>
                    {!! Form::date('fecha_visita', null, ['class' => 'form-control select2', 'id' => 'fecha_visita']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="hora_visita" class="form-label text-uppercase">Hora Visita</label>
                    {!! Form::time('hora_visita', null, ['class' => 'form-control', 'id' => 'hora_visita']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitador" class="form-label text-uppercase">visitador</label>
                    {!! Form::select('visitador', $avaluador, null, ['class' => 'form-control text-uppercase select2', 'id' => 'visitador']) !!}
                </div>
            </div>
        </div> {{-- FIN div_ubicacion_detalles --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Crear Visita Técnica" id="btn_crear_visita_tecnica" name="btn_crear_visita_tecnica">
            </div>
        </div>
    </div> {{-- FIN div_cliente_potencial --}}
{!! Form::close() !!}
