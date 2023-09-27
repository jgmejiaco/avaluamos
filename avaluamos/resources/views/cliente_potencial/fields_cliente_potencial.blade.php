<div id="div_cliente_potencial" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
    <div class="row mb-1" id="div_campos_cliente_potencial">
        {{-- ======================= --}}
        

        {!! Form::hidden('id_cliente', isset($cliente) ? $cliente->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

        {{-- ======================= --}}

        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="nombre_solicitante" class="form-label text-uppercase">Nombre Cliente<span class="text-danger">*</span></label>
                {!! Form::text('nombre_solicitante', isset($cliente) ? $cliente->cli_nombres : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_solicitante', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_doc_cliente" class="form-label text-uppercase">Tipo Documento Cliente</label>
                {!! Form::select('id_doc_cliente', collect(['' => 'Seleccionar...'])->union($tipo_documento), isset($cliente) ? $cliente->id_doc_cliente : null, ['class' => 'form-control select2', 'id' => 'id_doc_cliente']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="documento_cliente" class="form-label text-uppercase">Documento Cliente</label>
                {!! Form::text('documento_cliente', isset($cliente) ? $cliente->documento_cliente : null, ['class' => 'form-control text-uppercase', 'id' => 'documento_cliente']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        {{-- @php
            dd($cliente->fecha_nacimiento);
        @endphp --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label text-uppercase">Fecha Nacimiento</label>
                {!! Form::date('fecha_nacimiento', isset($cliente) ? $cliente->fecha_nacimiento : null, ['class' => 'form-control text-uppercase', 'id' => 'fecha_nacimiento']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="celular" class="form-label text-uppercase">Celular<span class="text-danger">*</span></label>
                {!! Form::text('celular', isset($cliente) ? $cliente->cli_celular : null, ['class' => 'form-control text-uppercase', 'id' => 'celular', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="correo" class="form-label text-uppercase">Email<span class="text-danger">*</span></label>
                {!! Form::email('correo', isset($cliente) ? $cliente->cli_email : null, ['class' => 'form-control', 'id' => 'correo', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="tipo_persona" class="form-label text-uppercase">Tipo Persona<span class="text-danger">*</span></label>
                {!! Form::select('tipo_persona', collect(['' => 'Seleccionar...'])->union($tipo_persona), isset($cliente) ? $cliente->id_tipo_persona : null, ['class' => 'form-control select2', 'id' => 'tipo_persona', 'required']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="pais" class="form-label text-uppercase">País residencia</label>
                {!! Form::select('pais', collect(['' => 'Seleccionar...'])->union($paises), isset($cliente) ? $cliente->id_pais : null, ['class' => 'form-control select2', 'id' => 'pais']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="departamento" class="form-label text-uppercase">Departamento residencia</label>
                {!! Form::select('departamento', collect(['' => 'Seleccionar...'])->union($departamentos), isset($cliente) ? $cliente->id_dpto_estado : null, ['class' => 'form-control select2', 'id' => 'departamento']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="municipio" class="form-label text-uppercase">Ciudad residencia</label>
                {!! Form::select('municipio', collect(['' => 'Seleccionar...'])->union($ciudades), isset($cliente) ? $cliente->id_ciudad : null, ['class' => 'form-control select2', 'id' => 'municipio']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
        
        <div class="col-12 col-md-3">
            <div class="form-group">
                <label for="id_referido_por" class="form-label text-uppercase">Referido Por:<span class="text-danger">*</span></label>
                {!! Form::select('id_referido_por', collect(['' => 'Seleccionar...'])->union($referido_por), isset($cliente) ? $cliente->id_referido_por : null, ['class' => 'form-control select2', 'id' => 'id_referido_por', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="div_red_social">
            <div class="form-group">
                <label for="id_red_social" class="form-label text-uppercase">Red social<span class="text-danger">*</span></label>
                {!! Form::select('id_red_social', collect(['' => 'Seleccionar...'])->union($red_social), isset($cliente) ? $cliente->id_red_social : null, ['class' => 'form-control select2', 'id' => 'id_red_social']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="div_nombre_refiere">
            <div class="form-group">
                <label for="nombre_quien_refiere" class="form-label text-uppercase">Nombre quien refiere<span class="text-danger">*</span></label>
                {!! Form::text('nombre_quien_refiere', isset($cliente) ? $cliente->nombre_quien_refiere : null, ['class' => 'form-control', 'id' => 'nombre_quien_refiere']) !!}
            </div>
        </div>

        {{-- ======================= --}}
        
        <div class="col-12 col-md-3" id="div_empresa_refiere">
            <div class="form-group">
                <label for="empresa_que_refiere" class="form-label text-uppercase">Empresa que refiere<span class="text-danger">*</span></label>
                {!! Form::text('empresa_que_refiere', isset($cliente) ? $cliente->empresa_que_refiere : null, ['class' => 'form-control', 'id' => 'empresa_que_refiere']) !!}
            </div>
        </div>
    </div> {{-- FIN div_campos_cliente_potencial --}}
</div> {{-- FIN div_cliente_potencial --}}
