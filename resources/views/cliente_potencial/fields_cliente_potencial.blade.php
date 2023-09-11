<div id="div_cliente_potencial" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
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
                <label for="id_doc_cliente" class="form-label text-uppercase">Tipo Documento Cliente</label>
                {!! Form::select('id_doc_cliente', $tipo_documento, null, ['class' => 'form-control select2', 'id' => 'id_doc_cliente', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="documento_cliente" class="form-label text-uppercase">Documento Cliente</label>
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
    </div> {{-- FIN div_campos_cliente_potencial --}}

    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- ========================================================= --}}

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Crear Cliente" id="btn_crear_visita_tecnica" name="btn_crear_visita_tecnica">
        </div>
    </div>
</div> {{-- FIN div_cliente_potencial --}}
