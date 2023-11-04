{!! Form::open(['method' => 'POST', 'route' => ['avaluo_cliente_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_cli_avaluo']) !!}
@csrf
    <div id="div_ppal_cliente_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <h2 class="text-uppercase">CLIENTE</h2>
        <div class="row mb-1 mt-5" id="div_editar_cliente">
            {!! Form::hidden('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            {!! Form::hidden('id_cliente', isset($calcularAvaluo) ? $calcularAvaluo->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_nombres" class="form-label text-uppercase">Nombre Solicitante<span class="text-danger">*</span></label>
                    {!! Form::text('cli_nombres', isset($calcularAvaluo) ? $calcularAvaluo->cliente->cli_nombres : null, ['class' => 'form-control text-uppercase', 'id' => 'cli_nombres', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_tipo_doc" class="form-label text-uppercase">Tipo Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::select('cli_tipo_doc',  collect(['' => 'Seleccionar...'])->union($tipo_documento), isset($calcularAvaluo) ? $calcularAvaluo->tipoDocCliente->id_tipo_documento : null, ['class' => 'form-control select2', 'id' => 'cli_tipo_doc', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="doc_cliente" class="form-label text-uppercase">Documento Cliente<span class="text-danger">*</span></label>
                    {!! Form::text('doc_cliente', isset($calcularAvaluo) ? $calcularAvaluo->documento_cliente : null, ['class' => 'form-control text-uppercase', 'id' => 'doc_cliente', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            @php
                use Carbon\Carbon;
                $fechaNacTimeStamp = $calcularAvaluo->fecha_nacimiento;
                $fechaNacimiento = isset($fechaNacTimeStamp) ? Carbon::parse($calcularAvaluo->fecha_nacimiento)->toDateString() : null;
            @endphp

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="fecha_nacimiento" class="form-label text-uppercase">Fecha Nacimiento</label>
                    {!! Form::date('fecha_nacimiento', isset($calcularAvaluo) ? $fechaNacimiento : null, ['class' => 'form-control text-uppercase', 'id' => 'fecha_nacimiento']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="cli_celular" class="form-label text-uppercase">Celular<span class="text-danger">*</span></label>
                    {!! Form::text('cli_celular', isset($calcularAvaluo) ? $calcularAvaluo->cli_celular : null, ['class' => 'form-control text-uppercase', 'id' => 'cli_celular', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="cli_correo" class="form-label text-uppercase">Email<span class="text-danger">*</span></label>
                    {!! Form::email('cli_correo', isset($calcularAvaluo) ? $calcularAvaluo->cli_email : null, ['class' => 'form-control', 'id' => 'cli_correo', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="">
                <div class="form-group">
                    <label for="tipo_persona" class="form-label text-uppercase">Tipo Persona<span class="text-danger">*</span></label>
                    {!! Form::select('tipo_persona', collect(['' => 'Seleccionar...'])->union($tipo_persona), isset($calcularAvaluo) ? $calcularAvaluo->id_tipo_persona : null, ['class' => 'form-control select2', 'id' => 'tipo_persona', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="cli_pais" class="form-label text-uppercase">País residencia</label>
                {!! Form::select('cli_pais', collect(['' => 'Seleccionar...'])->union($paises), isset($calcularAvaluo) ? $calcularAvaluo->cli_pais : null, ['class' => 'form-control select2', 'id' => 'cli_pais']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="cli_dpto" class="form-label text-uppercase">Departamento residencia</label>
                {!! Form::select('cli_dpto', collect(['' => 'Seleccionar...'])->union($departamentos), isset($calcularAvaluo) ? $calcularAvaluo->cli_dpto : null, ['class' => 'form-control select2', 'id' => 'cli_dpto']) !!}
            </div>
        </div>

        {{-- ======================= --}}

        <div class="col-12 col-md-3" id="">
            <div class="form-group">
                <label for="cli_ciudad" class="form-label text-uppercase">Ciudad residencia</label>
                {!! Form::select('cli_ciudad', collect(['' => 'Seleccionar...'])->union($ciudades), isset($calcularAvaluo) ? $calcularAvaluo->cli_ciudad : null, ['class' => 'form-control select2', 'id' => 'cli_ciudad', 'required']) !!}
            </div>
        </div>

        {{-- ======================= --}}

            <div class="col-12 col-md-3">
                <div class="form-group">
                    <label for="referido_por" class="form-label text-uppercase">Referido Por:<span class="text-danger">*</span></label>
                    {!! Form::select('referido_por', collect(['' => 'Seleccionar...'])->union($referido_por), isset($calcularAvaluo) ? $calcularAvaluo->id_referido_por : null, ['class' => 'form-control select2', 'id' => 'referido_por', 'required']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_red_social">
                <div class="form-group">
                    <label for="red_social" class="form-label text-uppercase">Red social<span class="text-danger">*</span></label>
                    {!! Form::select('red_social', collect(['' => 'Seleccionar...'])->union($red_social), isset($calcularAvaluo) ? $calcularAvaluo->id_red_social : null, ['class' => 'form-control select2', 'id' => 'red_social']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_nombre_refiere">
                <div class="form-group">
                    <label for="nombre_quien_refiere" class="form-label text-uppercase">Nombre quien refiere<span class="text-danger">*</span></label>
                    {!! Form::text('nombre_quien_refiere', isset($calcularAvaluo) ? $calcularAvaluo->nombre_quien_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'nombre_quien_refiere']) !!}
                </div>
            </div>

            {{-- ======================= --}}

            <div class="col-12 col-md-3" id="div_empresa_refiere">
                <div class="form-group">
                    <label for="empresa_que_refiere" class="form-label text-uppercase">Empresa que refiere<span class="text-danger">*</span></label>
                    {!! Form::text('empresa_que_refiere', isset($calcularAvaluo) ? $calcularAvaluo->empresa_que_refiere : null, ['class' => 'form-control text-uppercase', 'id' => 'empresa_que_refiere']) !!}
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
