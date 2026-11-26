{{-- INICIO Modal CREAR EMPRESA --}}
{!! Form::open([
    'method' => 'POST',
    'route' => ['dirigido_empresa.store'],
    'class' => 'mt-2',
    'autocomplete' => 'off',
    'id' => 'form_dirigido_empresa',
]) !!}
@csrf

    <div class="rounded-top text-center" style="background-color: #337AB7; border: solid 1px #337AB7;">
        <h5 class="m-0 pt-1 pb-1 text-white ">Crear Empresa</h5>
    </div>

    {{-- ====================================================== --}}

    <div class="modal-body p-0 m-0 rounded-bottom" style="border: solid 1px #337AB7;">
        {{-- Tipo Documento / Número Documento --}}
        <div class="row m-2">
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="id_tipo_documento" class="form-label text-uppercase">Tipo Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::select(
                        'id_tipo_documento',
                        collect(['' => 'Seleccionar...'])->union($tipo_documento),
                        null,
                        ['class' => 'form-select', 'id' => 'id_tipo_documento', 'required' => 'required', 'data-doc-tipo' => 'empresa']
                    ) !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group d-flex flex-column">
                    <label for="numero_documento" class="form-label text-uppercase">Número Documento
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('numero_documento', null, [
                        'class' => 'form-control',
                        'id' => 'numero_documento',
                        'required' => 'required',
                        'data-doc-numero' => 'empresa',
                    ]) !!}
                </div>
            </div>
        </div>

        {{-- Nombre Empresa --}}
        <div class="row m-2">
            <div class="col-12">
                <div class="form-group d-flex flex-column">
                    <label for="nombre_empresa" class="form-label text-uppercase">Nombre Empresa
                        <span class="text-danger">*</span>
                    </label>
                    {!! Form::text('nombre_empresa', null, [
                        'class' => 'form-control',
                        'id' => 'nombre_empresa',
                        'required' => 'required',
                    ]) !!}
                </div>
            </div>
        </div>
    </div> {{-- FIN modal-body --}}

    {{-- ====================================================== --}}

    <div class="modal-footer d-block mt-0 mb-0 border border-0 pb-0">
        <div class="d-flex justify-content-center mt-0 mb-0">
            <button id="btn_crear_empresa" type="submit" class="btn btn-success me-3 rounded" title="Crear">
                <i class="fa fa-floppy-o" aria-hidden="true"> Crear</i>
            </button>

            <button id="btn_cancelar_crear_empresa" type="button" class="btn btn-secondary rounded"
                title="Cancelar" data-bs-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true"> Cancelar</i>
            </button>
        </div>
    </div> {{-- modal-footer --}}

{!! Form::close() !!}
{{-- FINAL Modal CREAR EMPRESA --}}
