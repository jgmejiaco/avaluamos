{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_cliente_potencial" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <h2 class="text-uppercase">VISITA TÉCNICA INMUEBLE</h2>
        <div class="row mb-1" id="div_campos_cliente_potencial">
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="nombre_solicitante" class="form-label text-uppercase">Nombre Solicitante<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_solicitante', old('nombre_solicitante'), ['class' => 'form-control text-uppercase', 'id' => 'nombre_solicitante', 'required']) !!}
                </div>
                {{-- {!! Form::hidden('id_solicitante', isset($usuario) ? $usuario->id_solicitante : null, ['class' => 'input100', 'id' => 'id_solicitante']) !!} --}}
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="id_doc_cliente" class="form-label text-uppercase">Tipo Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::select('id_doc_cliente', $tipo_documento, null, ['class' => 'form-control select2', 'id' => 'id_doc_cliente', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="documento_cliente" class="form-label text-uppercase">Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::text('documento_cliente', null, ['class' => 'form-control text-uppercase', 'id' => 'documento_cliente', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="celular" class="form-label text-uppercase">Celular<span class="text-danger">*</span></label>
                    {!! Form::text('celular', old('celular'), ['class' => 'form-control text-uppercase', 'id' => 'celular', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="correo" class="form-label text-uppercase">Email<span class="text-danger">*</span></label>
                    {!! Form::email('correo', null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="tipo_persona" class="form-label text-uppercase">Tipo Persona<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_persona', $tipo_persona, null, ['class' => 'form-control select2', 'id' => 'tipo_persona', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_correo">
                <div class="form-group">
                    <label for="dirigido_a" class="form-label text-uppercase">Nombre Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('dirigido_a', $dirigido_a, null, ['class' => 'form-control select2', 'id' => 'dirigido_a', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_documento" class="form-label text-uppercase">Tipo Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_documento', $tipo_documento, null, ['class' => 'form-control select2', 'id' => 'tipo_documento', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="documento_dirigido_a" class="form-label text-uppercase">Documento Dirigido A<span class="text-danger">*</span></label>
                    {!! Form::text('documento_dirigido_a', null, ['class' => 'form-control text-uppercase', 'id' => 'documento_dirigido_a', 'readonly' => 'true', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

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

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="pais" class="form-label text-uppercase">País<span class="text-danger">*</span></label>
                    {!! Form::select('pais', $pais, null, ['class' => 'form-control select2', 'id' => 'pais', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="departamento" class="form-label text-uppercase">Departamento<span class="text-danger">*</span></label>
                    {!! Form::select('departamento', $departamento_estado, null, ['class' => 'form-control select2', 'id' => 'departamento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="municipio" class="form-label text-uppercase">Municipio<span class="text-danger">*</span></label>
                    {!! Form::select('municipio', $ciudad, null, ['class' => 'form-control select2', 'id' => 'municipio', 'required']) !!}
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
                    <label for="cerca_de" class="form-label text-uppercase">Cerca De<span class="text-danger">*</span></label>
                    {!! Form::text('cerca_de', null, ['class' => 'form-control select2', 'id' => 'cerca_de', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="barrio" class="form-label text-uppercase">Barrio<span class="text-danger">*</span></label>
                    {!! Form::text('barrio', null, ['class' => 'form-control text-uppercase', 'id' => 'barrio']) !!}
                </div>
            </div>
            
            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="unidad_edificio" class="form-label text-uppercase">Urb/Unidad/Edificio<span class="text-danger">*</span></label>
                    {!! Form::text('unidad_edificio', null, ['class' => 'form-control select2', 'id' => 'unidad_edificio', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="direccion" class="form-label text-uppercase">Dirección<span class="text-danger">*</span></label>
                    {!! Form::text('direccion', null, ['class' => 'form-control text-uppercase', 'id' => 'direccion']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="tipo_inmueble" class="form-label text-uppercase">Tipo Inmueble<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_inmueble', $tipo_inmueble, null, ['class' => 'form-control select2', 'id' => 'tipo_inmueble', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="area" class="form-label text-uppercase">Área<span class="text-danger">*</span></label>
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
                    <label for="cant_cuarto util" class="form-label text-uppercase">Cantidad Cuartos Útiles</label>
                    {!! Form::select('cant_cuarto_util', $indicador_numerico, null, ['class' => 'form-control select2', 'id' => 'cant_cuarto util']) !!}
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
                    <label for="id_referido_por" class="form-label text-uppercase">Referido Por:<span class="text-danger">*</span></label>
                    {!! Form::select('id_referido_por', $referido_por, null, ['class' => 'form-control select2', 'id' => 'id_referido_por', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_red_social">
                <div class="form-group">
                    <label for="id_red_social" class="form-label text-uppercase">Red social<span class="text-danger">*</span></label>
                    {!! Form::select('id_red_social', $red_social, null, ['class' => 'form-control select2', 'id' => 'id_red_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_nombre_refiere">
                <div class="form-group">
                    <label for="nombre_quien_refiere" class="form-label text-uppercase">Nombre quien refiere<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_quien_refiere', null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_quien_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="div_empresa_refiere">
                <div class="form-group">
                    <label for="empresa_que_refiere" class="form-label text-uppercase">Empresa que refiere<span class="text-danger">*</span></label>
                    {!! Form::text('empresa_que_refiere', null, ['class' => 'form-control text-uppercase', 'id' => 'empresa_que_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="porcentaje_descuento" class="form-label text-uppercase">Porcentaje Descuento<span class="text-danger">*</span></label>
                    {!! Form::number('porcentaje_descuento', null, ['class' => 'form-control text-uppercase', 'id' => 'porcentaje_descuento', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="valor_cotizacion" class="form-label text-uppercase">Valor Cotizacion<span class="text-danger">*</span></label>
                    {!! Form::number('valor_cotizacion', null, ['class' => 'form-control text-uppercase', 'id' => 'valor_cotizacion', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="latitud" class="form-label text-uppercase">Latitud<span class="text-danger">*</span></label>
                    {!! Form::text('latitud', null, ['class' => 'form-control select2', 'id' => 'latitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="longitud" class="form-label text-uppercase">Longitud<span class="text-danger">*</span></label>
                    {!! Form::text('longitud', null, ['class' => 'form-control select2', 'id' => 'longitud', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12" id="">
                <div class="form-group">
                    <label for="observaciones_inmueble" class="form-label text-uppercase">Observaciones Visita Técnica Inmueble<span class="text-danger">*</span></label>
                    {!! Form::textarea('observaciones_inmueble', null, ['class' => 'form-control select2', 'id' => 'observaciones_inmueble', 'required']) !!}
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="visitado" class="form-label text-uppercase">Visitado<span class="text-danger">*</span></label>
                    {!! Form::select('visitado', $si_no, null, ['class' => 'form-control select2', 'id' => 'visitado', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_visita" class="form-label text-uppercase">Fecha Inspección<span class="text-danger">*</span></label>
                    {!! Form::date('fecha_visita', null, ['class' => 'form-control select2', 'id' => 'fecha_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="hora_visita" class="form-label text-uppercase">Hora Visita<span class="text-danger">*</span></label>
                    {!! Form::time('hora_visita', null, ['class' => 'form-control', 'id' => 'hora_visita', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="avaluador" class="form-label text-uppercase">visitador<span class="text-danger">*</span></label>
                    {!! Form::select('avaluador', $avaluador, null, ['class' => 'form-control text-uppercase select2', 'id' => 'avaluador', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
        </div> {{-- FIN div_campos_cliente_potencial --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Visita Técnica" id="btn_crear_visita_tecnica" name="btn_crear_visita_tecnica">
            </div>
        </div>
    </div> {{-- FIN div_cliente_potencial --}}
{!! Form::close() !!}
