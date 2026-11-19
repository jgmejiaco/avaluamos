{{-- INICIO Modal EDITAR EMPRESA --}}
{!! Form::open([
    'method' => 'PUT',
    'route' => ['dirigido_empresa.update', $empresa->id_dirigido_a],
    'class' => 'mt-2',
    'autocomplete' => 'off',
    'id' => 'formEditarEmpresa_' . $empresa->id_dirigido_a,
]) !!}
@csrf

    <div class="rounded-top text-white text-center" style="background-color: #337AB7; border: solid 1px #337AB7;">
        <h5 class="m-0 pt-1 pb-1">Editar Empresa</h5>
    </div>

    {{ Form::hidden('id_empresa_editar', $empresa->id_dirigido_a ?? null, ['id' => 'id_empresa_editar']) }}

    {{-- ====================================================== --}}

    <div class="modal-body p-0 m-0" style="border: solid 1px #337AB7;">
        {{-- Tipo Documento / Número Documento --}}
        <div class="row m-2">
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="id_tipo_documento_editar" class="form-label text-uppercase">Tipo Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'id_tipo_documento_editar',
                        collect(['' => 'Seleccionar...'])->union($tipo_documento),
                        $empresa->id_tipo_documento ?? null,
                        ['class' => 'form-select', 'id' => 'id_tipo_documento_editar', 'required' => 'required']
                    ) !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="numero_documento_editar" class="form-label text-uppercase">Número Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('numero_documento_editar', $empresa->numero_documento ?? null, [
                        'class' => 'form-control',
                        'id' => 'numero_documento_editar',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
        </div>

        {{-- Nombre Empresa --}}
        <div class="row m-2">
            <div class="col-12">
                <div class="form-group d-flex flex-column">
                    <label for="nombre_empresa_editar" class="form-label text-uppercase">Nombre Empresa
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('nombre_empresa_editar', $empresa->dirigido_a ?? null, [
                        'class' => 'form-control',
                        'id' => 'nombre_empresa_editar',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
        </div>
    </div> {{-- FIN modal-body --}}

    {{-- ====================================================== --}}

    <div class="modal-footer d-block mt-0 border border-0">
        {{-- <div id="loadingIndicatorEditEmpresa_{{ $empresa->id_dirigido_a }}" class="loadingIndicator">
            <img src="{{ asset('img/loading.gif') }}" alt="Procesando...">
        </div> --}}

        <div class="d-flex justify-content-center mt-3">
            <button id="btn_editar_empresa_{{ $empresa->id_dirigido_a }}" type="submit" class="btn btn-success me-3"
                title="Guardar">
                <i class="fa fa-floppy-o" aria-hidden="true"> Editar</i>
            </button>

            <button id="btn_cancelar_empresa_{{ $empresa->id_dirigido_a }}" type="button" class="btn btn-secondary"
                title="Cancelar" data-bs-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true"> Cancelar</i>
            </button>
        </div>
    </div> {{-- modal-footer --}}

{!! Form::close() !!}
{{-- FINAL Modal EDITAR EMPRESA --}}
