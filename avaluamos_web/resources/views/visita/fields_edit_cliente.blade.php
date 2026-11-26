{!! Form::open(['method' => 'POST', 'route' => ['visita_cliente_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_cli_visita']) !!}
@csrf
    <div id="div_ppal_cliente_visita" class="border border-dark-subtle w-100 mx-auto p-3 rounded-4">
        <h4 class="text-uppercase">CLIENTE</h4>
        <div class="row mb-1 mt-5" id="div_editar_cliente">
            {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            {!! Form::hidden('id_cliente', isset($editarVisita) ? $editarVisita->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_nombres" class="form-label text-uppercase mb-0">Nombre Solicitante<span class="text-danger">*</span></label>
                    {!! Form::text('cli_nombres', isset($editarVisita) ? $editarVisita->cli_nombres : null, ['class' => 'form-control text-uppercase', 'id' => 'cli_nombres', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_tipo_doc" class="form-label text-uppercase mb-0">Tipo Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::select('cli_tipo_doc',  collect(['' => 'Seleccionar...'])->union($tipo_documento), isset($editarVisita) ? $editarVisita->id_doc_cliente : null, ['class' => 'form-select', 'id' => 'cli_tipo_doc', 'required', 'data-doc-tipo' => 'cliente-visita']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="doc_cliente" class="form-label text-uppercase mb-0">Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::text('doc_cliente', isset($editarVisita) ? $editarVisita->documento_cliente : null, ['class' => 'form-control text-uppercase', 'id' => 'doc_cliente', 'required', 'data-doc-numero' => 'cliente-visita']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            @php
                use Carbon\Carbon;
                $fechaNacTimeStamp = $editarVisita->fecha_nacimiento;
                $fechaNacimiento = isset($fechaNacTimeStamp) ? Carbon::parse($editarVisita->fecha_nacimiento)->toDateString() : null;
            @endphp
            
            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_nacimiento" class="form-label text-uppercase mb-0">Fecha Nacimiento</label>
                    {!! Form::date('fecha_nacimiento', isset($editarVisita) ? $fechaNacimiento  : null, ['class' => 'form-control text-uppercase', 'id' => 'doc_cliente']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4">
                <div class="form-group">
                    <label for="cli_celular" class="form-label text-uppercase mb-0">Celular<span class="text-danger">*</span></label>
                    {!! Form::text('cli_celular', isset($editarVisita) ? $editarVisita->cli_celular : null, ['class' => 'form-control', 'id' => 'cli_celular', 'required', 'data-validar-celular' => '1']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4" id="">
                <div class="form-group">
                    <label for="cli_correo" class="form-label text-uppercase mb-0">Email<span class="text-danger">*</span></label>
                    {!! Form::email('cli_correo', isset($editarVisita) ? $editarVisita->cli_email : null, ['class' => 'form-control', 'id' => 'cli_correo', 'required', 'data-validar-correo' => '1']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4" id="">
                <div class="form-group">
                    <label for="tipo_persona" class="form-label text-uppercase mb-0">Tipo Persona<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_persona', collect(['' => 'Seleccionar...'])->union($tipo_persona), isset($editarVisita) ? $editarVisita->id_tipo_persona : null, ['class' => 'form-select', 'id' => 'tipo_persona', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
        <div class="col-12 col-md-3 mt-4" id="">
            <div class="form-group">
                <label for="cli_pais" class="form-label text-uppercase mb-0">País residencia</label>
                {!! Form::select('cli_pais', collect(['' => 'Seleccionar...'])->union($paises), isset($editarVisita) ? $editarVisita->cli_pais : null, ['class' => 'form-select', 'id' => 'cli_pais']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}

        <div class="col-12 col-md-3 mt-4" id="">
            <div class="form-group">
                <label for="cli_dpto" class="form-label text-uppercase mb-0">Departamento residencia</label>
                {!! Form::select('cli_dpto', collect(['' => 'Seleccionar...'])->union($departamentos), isset($editarVisita) ? $editarVisita->cli_dpto : null, ['class' => 'form-select', 'id' => 'cli_dpto']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
        
        <div class="col-12 col-md-3 mt-4" id="">
            <div class="form-group">
                <label for="cli_ciudad" class="form-label text-uppercase mb-0">Ciudad residencia</label>
                {!! Form::select('cli_ciudad', collect(['' => 'Seleccionar...'])->union($ciudades), isset($editarVisita) ? $editarVisita->cli_ciudad : null, ['class' => 'form-select', 'id' => 'cli_ciudad', 'required']) !!}
            </div>
        </div>
        
        {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4">
                <div class="form-group">
                    <label for="referido_por" class="form-label text-uppercase mb-0">Referido Por:<span class="text-danger">*</span></label>
                    {!! Form::select('referido_por', collect(['' => 'Seleccionar...'])->union($referido_por), isset($editarVisita) ? $editarVisita->id_referido_por : null, ['class' => 'form-select', 'id' => 'referido_por', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4" id="div_red_social">
                <div class="form-group">
                    <label for="red_social" class="form-label text-uppercase mb-0">Red social<span class="text-danger">*</span></label>
                    {!! Form::select('red_social', collect(['' => 'Seleccionar...'])->union($red_social), isset($editarVisita) ? $editarVisita->id_red_social : null, ['class' => 'form-select', 'id' => 'red_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4" id="div_nombre_refiere">
                <div class="form-group">
                    <label for="nombre_quien_refiere" class="form-label text-uppercase mb-0">Nombre quien refiere<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_quien_refiere', isset($editarVisita) ? $editarVisita->nombre_quien_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_quien_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}
            
            <div class="col-12 col-md-3 mt-4" id="div_empresa_refiere">
                <div class="form-group">
                    <label for="empresa_que_refiere" class="form-label text-uppercase mb-0">Empresa que refiere<span class="text-danger">*</span></label>
                    {!! Form::text('empresa_que_refiere', isset($editarVisita) ? $editarVisita->empresa_que_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'empresa_que_refiere']) !!}
                </div>
            </div>
        </div> {{-- FIN div_editar_cliente --}}

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Editar Cliente" id="btn_editar_cliente">
            </div>
        </div>
    </div> {{-- FIN div_ppal_cliente_visita --}}
{!! Form::close() !!}
