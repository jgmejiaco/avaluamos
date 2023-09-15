{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">REGISTRO FOTOGRÁFICO</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_fachada" class="form-label text-uppercase">Fachada</label>
                        {!! Form::file('rf_fachada', null, ['class' => 'form-control add-file', 'id' => 'rf_fachada']) !!}
                        {{-- <label class="custom-file-label" for="rf_fachada">Elegir archivo</label> --}}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_entrada" class="form-label text-uppercase">Entrada</label>
                        {!! Form::file('rf_entrada', null, ['class' => 'form-control', 'id' => 'rf_entrada']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_sala1" class="form-label text-uppercase">sala 1</label>
                        {!! Form::file('rf_sala1', null, ['class' => 'form-control', 'id' => 'rf_sala1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_sala2" class="form-label text-uppercase">sala 2</label>
                        {!! Form::file('rf_sala2', null, ['class' => 'form-control', 'id' => 'rf_sala2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_sala3" class="form-label text-uppercase">sala 3</label>
                        {!! Form::file('rf_sala3', null, ['class' => 'form-control', 'id' => 'rf_sala3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_comedor1" class="form-label text-uppercase">comedor 1</label>
                        {!! Form::file('rf_comedor1', null, ['class' => 'form-control', 'id' => 'rf_comedor1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_comedor2" class="form-label text-uppercase">comedor 2</label>
                        {!! Form::file('rf_comedor2', null, ['class' => 'form-control', 'id' => 'rf_comedor2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_comedor3" class="form-label text-uppercase">comedor 3</label>
                        {!! Form::file('rf_comedor3', null, ['class' => 'form-control', 'id' => 'rf_comedor3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cocina1" class="form-label text-uppercase">cocina 1</label>
                        {!! Form::file('rf_cocina1', null, ['class' => 'form-control', 'id' => 'rf_cocina1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cocina2" class="form-label text-uppercase">cocina 2</label>
                        {!! Form::file('rf_cocina2', null, ['class' => 'form-control', 'id' => 'rf_cocina2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cocina3" class="form-label text-uppercase">cocina 3</label>
                        {!! Form::file('rf_cocina3', null, ['class' => 'form-control', 'id' => 'rf_cocina3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion1" class="form-label text-uppercase">habitación 1</label>
                        {!! Form::file('rf_habitacion1', null, ['class' => 'form-control', 'id' => 'rf_habitacion1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion2" class="form-label text-uppercase">habitación 2</label>
                        {!! Form::file('rf_habitacion2', null, ['class' => 'form-control', 'id' => 'rf_habitacion2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion3" class="form-label text-uppercase">habitación 3</label>
                        {!! Form::file('rf_habitacion3', null, ['class' => 'form-control', 'id' => 'rf_habitacion3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion4" class="form-label text-uppercase">habitación 4</label>
                        {!! Form::file('rf_habitacion4', null, ['class' => 'form-control', 'id' => 'rf_habitacion4']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion5" class="form-label text-uppercase">habitación 5</label>
                        {!! Form::file('rf_habitacion5', null, ['class' => 'form-control', 'id' => 'rf_habitacion5']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion6" class="form-label text-uppercase">habitación 6</label>
                        {!! Form::file('rf_habitacion6', null, ['class' => 'form-control', 'id' => 'rf_habitacion6']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_habitacion7" class="form-label text-uppercase">habitación 7</label>
                        {!! Form::file('rf_habitacion7', null, ['class' => 'form-control', 'id' => 'rf_habitacion7']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_bano1" class="form-label text-uppercase">baño 1</label>
                        {!! Form::file('rf_bano1', null, ['class' => 'form-control', 'id' => 'rf_bano1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_bano2" class="form-label text-uppercase">baño 2</label>
                        {!! Form::file('rf_bano2', null, ['class' => 'form-control', 'id' => 'rf_bano2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_bano3" class="form-label text-uppercase">baño 3</label>
                        {!! Form::file('rf_bano3', null, ['class' => 'form-control', 'id' => 'rf_bano3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_patio1" class="form-label text-uppercase">patio 1</label>
                        {!! Form::file('rf_patio1', null, ['class' => 'form-control', 'id' => 'rf_patio1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_patio2" class="form-label text-uppercase">patio 2</label>
                        {!! Form::file('rf_patio2', null, ['class' => 'form-control', 'id' => 'rf_patio2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_patio3" class="form-label text-uppercase">patio 3</label>
                        {!! Form::file('rf_patio3', null, ['class' => 'form-control', 'id' => 'rf_patio3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_estudio1" class="form-label text-uppercase">Estudio 1</label>
                        {!! Form::file('rf_estudio1', null, ['class' => 'form-control', 'id' => 'rf_estudio1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_estudio2" class="form-label text-uppercase">Estudio 2</label>
                        {!! Form::file('rf_estudio2', null, ['class' => 'form-control', 'id' => 'rf_estudio2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_estudio3" class="form-label text-uppercase">Estudio 3</label>
                        {!! Form::file('rf_estudio3', null, ['class' => 'form-control', 'id' => 'rf_estudio3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cuarto_util1" class="form-label text-uppercase">Cuarto Útil 1</label>
                        {!! Form::file('rf_cuarto_util1', null, ['class' => 'form-control', 'id' => 'rf_cuarto_util1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cuarto_util2" class="form-label text-uppercase">Cuarto Útil 2</label>
                        {!! Form::file('rf_cuarto_util2', null, ['class' => 'form-control', 'id' => 'rf_cuarto_util2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_cuarto_util3" class="form-label text-uppercase">Cuarto Útil 3</label>
                        {!! Form::file('rf_cuarto_util3', null, ['class' => 'form-control', 'id' => 'rf_cuarto_util3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_pasillo1" class="form-label text-uppercase">Pasillo 1</label>
                        {!! Form::file('rf_pasillo1', null, ['class' => 'form-control', 'id' => 'rf_pasillo1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_pasillo2" class="form-label text-uppercase">Pasillo 2</label>
                        {!! Form::file('rf_pasillo2', null, ['class' => 'form-control', 'id' => 'rf_pasillo2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_pasillo3" class="form-label text-uppercase">Pasillo 3</label>
                        {!! Form::file('rf_pasillo3', null, ['class' => 'form-control', 'id' => 'rf_pasillo3']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_zona_ropa1" class="form-label text-uppercase">Zona ropa 1</label>
                        {!! Form::file('rf_zona_ropa1', null, ['class' => 'form-control', 'id' => 'rf_zona_ropa1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_zona_ropa2" class="form-label text-uppercase">Zona ropa 2</label>
                        {!! Form::file('rf_zona_ropa2', null, ['class' => 'form-control', 'id' => 'rf_zona_ropa2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_zona_ropa3" class="form-label text-uppercase">Zona ropa 3</label>
                        {!! Form::file('rf_zona_ropa3', null, ['class' => 'form-control', 'id' => 'rf_zona_ropa3', 'accept' => 'image/*']) !!}
                        {{-- <label class="custom-file-label" for="rf_zona_ropa3">Elegir archivo</label> --}}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_balcon1" class="form-label text-uppercase">balcón 1</label>
                        {!! Form::file('rf_balcon1', null, ['class' => 'form-control', 'id' => 'rf_balcon1']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_balcon2" class="form-label text-uppercase">balcón 2</label>
                        {!! Form::file('rf_balcon2', null, ['class' => 'form-control', 'id' => 'rf_balcon2']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="rf_balcon3" class="form-label text-uppercase">balcón 3</label>
                        {!! Form::file('rf_balcon3', null, ['class' => 'form-control', 'id' => 'rf_balcon3']) !!}
                    </div>
                </div>
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
