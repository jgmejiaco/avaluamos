{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">REGISTRO FOTOGRÁFICO</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="entrada" class="form-label text-uppercase">Entrada</label>
                        {!! Form::file('entrada', null, ['class' => 'form-control', 'id' => 'entrada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="sala" class="form-label text-uppercase">sala</label>
                        {!! Form::file('sala', null, ['class' => 'form-control', 'id' => 'sala']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="comedor" class="form-label text-uppercase">comedor</label>
                        {!! Form::file('comedor', null, ['class' => 'form-control', 'id' => 'comedor']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="habitacion1" class="form-label text-uppercase">habitación 1</label>
                        {!! Form::file('habitacion1', null, ['class' => 'form-control', 'id' => 'habitacion1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="habitacion2" class="form-label text-uppercase">habitación 2</label>
                        {!! Form::file('habitacion2', null, ['class' => 'form-control', 'id' => 'habitacion2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="habitacion3" class="form-label text-uppercase">habitación 3</label>
                        {!! Form::file('habitacion3', null, ['class' => 'form-control', 'id' => 'habitacion3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="bano1" class="form-label text-uppercase">baño 1</label>
                        {!! Form::file('bano1', null, ['class' => 'form-control', 'id' => 'bano1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="bano2" class="form-label text-uppercase">baño 2</label>
                        {!! Form::file('bano2', null, ['class' => 'form-control', 'id' => 'bano2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="">
                        <label for="bano3" class="form-label text-uppercase">baño 3</label>
                        {!! Form::file('bano3', null, ['class' => 'form-control', 'id' => 'bano3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}
        {{-- ========================================================= --}}

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Registro Fotográfico" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
