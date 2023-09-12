{!! Form::model($editarVisita,['method' => 'PUT', 'route' => ['visita.update',$editarVisita->id_visita], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    {{-- @php
        dd($editarVisita);
    @endphp --}}
    <div id="div_ppal_cliente_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <h2 class="text-uppercase">VISITA TÉCNICA INMUEBLE</h2>
        <div class="row mb-1 mt-5" id="div_editar_cliente">
            {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => 'input100', 'id' => 'id_visita']) !!}
            {!! Form::hidden('id_cliente', isset($editarVisita) ? $editarVisita->id_cliente : null, ['class' => 'input100', 'id' => 'id_cliente']) !!}

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="nombre_solicitante" class="form-label text-uppercase">Nombre Solicitante<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_solicitante', isset($editarVisita) ? $editarVisita->cli_nombres : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_solicitante', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_tipo_doc" class="form-label text-uppercase">Tipo Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::select('cli_tipo_doc', $tipo_documento, isset($editarVisita) ? $editarVisita->cli_tipo_doc : null, ['class' => 'form-control select2', 'id' => 'cli_tipo_doc', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="documento_cliente" class="form-label text-uppercase">Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::text('documento_cliente', isset($editarVisita) ? $editarVisita->documento_cliente : null, ['class' => 'form-control text-uppercase', 'id' => 'documento_cliente', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="celular" class="form-label text-uppercase">Celular<span class="text-danger">*</span></label>
                    {!! Form::text('celular', isset($editarVisita) ? $editarVisita->cli_celular : null, ['class' => 'form-control text-uppercase', 'id' => 'celular', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="correo" class="form-label text-uppercase">Email<span class="text-danger">*</span></label>
                    {!! Form::email('correo', isset($editarVisita) ? $editarVisita->cli_email : null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="tipo_persona" class="form-label text-uppercase">Tipo Persona<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_persona', $tipo_persona, isset($editarVisita) ? $editarVisita->tipo_persona : null, ['class' => 'form-control select2', 'id' => 'tipo_persona', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="referido_por" class="form-label text-uppercase">Referido Por:<span class="text-danger">*</span></label>
                    {!! Form::select('referido_por', $referido_por, isset($editarVisita) ? $editarVisita->referido_por : null, ['class' => 'form-control select2', 'id' => 'referido_por', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_red_social">
                <div class="form-group">
                    <label for="red_social" class="form-label text-uppercase">Red social<span class="text-danger">*</span></label>
                    {!! Form::select('red_social', $red_social, isset($editarVisita) ? $editarVisita->red_social : null, ['class' => 'form-control select2', 'id' => 'red_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_nombre_refiere">
                <div class="form-group">
                    <label for="nombre_quien_refiere" class="form-label text-uppercase">Nombre quien refiere<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_quien_refiere', isset($editarVisita) ? $editarVisita->nombre_quien_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_quien_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_empresa_refiere">
                <div class="form-group">
                    <label for="empresa_que_refiere" class="form-label text-uppercase">Empresa que refiere<span class="text-danger">*</span></label>
                    {!! Form::text('empresa_que_refiere', isset($editarVisita) ? $editarVisita->empresa_que_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'empresa_que_refiere']) !!}
                </div>
            </div>
        </div> {{-- FIN div_editar_cliente --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <hr style="border: 1px solid grey">

        <div class="row mb-2 mt-2" id="div_dirigido_a">
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="dirigido_a" class="form-label text-uppercase">Nombre Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('dirigido_a', $dirigido_a, isset($editarVisita) ? $editarVisita->dirigido_a : null, ['class' => 'form-control select2', 'id' => 'dirigido_a', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="empresa_tipo_doc" class="form-label text-uppercase">Tipo Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('empresa_tipo_doc', $tipo_documento, isset($editarVisita) ? $editarVisita->empresa_tipo_doc : null, ['class' => 'form-control select2', 'id' => 'empresa_tipo_doc', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="documento_dirigido_a" class="form-label text-uppercase">Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::text('documento_dirigido_a', isset($editarVisita) ? $editarVisita->documento_empresa : null, ['class' => 'form-control text-uppercase', 'id' => 'documento_dirigido_a', 'readonly' => 'true', 'required']) !!}
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
                    {!! Form::select('pais', $pais, isset($editarVisita) ? $editarVisita->descripcion_pais : null, ['class' => 'form-control select2', 'id' => 'pais', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="departamento" class="form-label text-uppercase">Departamento<span class="text-danger">*</span></label>
                    {!! Form::select('departamento', $departamento_estado, isset($editarVisita) ? $editarVisita->descripcion_departamento : null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="municipio" class="form-label text-uppercase">Municipio<span class="text-danger">*</span></label>
                    {!! Form::select('municipio', $ciudad, isset($editarVisita) ? $editarVisita->descripcion_ciudad : null, ['class' => 'form-control select2', 'id' => 'municipio', 'required']) !!}
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
                    {!! Form::select('tipo_inmueble', $tipo_inmueble, isset($editarVisita) ? $editarVisita->tipo_inmueble : null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
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
                    <label for="observaciones_inmueble" class="form-label text-uppercase">Observaciones Visita Técnica Inmueble<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_inmueble', isset($editarVisita) ? $editarVisita->obser_visita : null, ['class' => 'form-control select2', 'id' => 'observaciones_inmueble', 'required']) !!}
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitado" class="form-label text-uppercase">Visitado<span class="text-danger">*</span></label>
                    {!! Form::select('visitado', $si_no, isset($editarVisita) ? $editarVisita->descripcion_si_no : null, ['class' => 'form-control select2', 'id' => 'visitado', 'required']) !!}
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
                    <label for="avaluador" class="form-label text-uppercase">visitador<span class="text-danger">*</span></label>
                    {!! Form::select('avaluador', $avaluador, isset($editarVisita) ? $editarVisita->nombres_visitador : null, ['class' => 'form-control text-uppercase select2', 'id' => 'avaluador', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Visita Técnica" id="btn_crear_visita_tecnica" name="btn_crear_visita_tecnica">
            </div>
        </div>
    </div> {{-- FIN div_ppal_cliente_visita --}}
{!! Form::close() !!}
