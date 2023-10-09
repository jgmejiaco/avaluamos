{!! Form::open(['method' => 'POST', 'route' => ['avaluo_caracteristicas_inmueble_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_caracteristicas_inmueble']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        {!! Form::hidden('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
        <div class="mb-5">
            <h2 class="text-uppercase">CARACTERÍSTICAS DEL INMUEBLE</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cocinas" class="form-label text-uppercase">Cocina</label>
                        {!! Form::select('cocinas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cocinas : null, ['class' => 'select2', 'id' => 'cocinas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="habitaciones" class="form-label text-uppercase">Número Habitaciones</label>
                        {!! Form::select('habitaciones', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->habitaciones : null, ['class' => 'select2', 'id' => 'habitaciones']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="salas" class="form-label text-uppercase">Sala</label>
                        {!! Form::select('salas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->salas : null, ['class' => 'form-control select2', 'id' => 'salas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="habitaciones_servicio" class="form-label text-uppercase">Habitacion Servicio</label>
                        {!! Form::select('habitaciones_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->habitaciones_servicio : null, ['class' => 'form-control select2', 'id' => 'habitaciones_servicio']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="comedores" class="form-label text-uppercase">Comedor</label>
                        {!! Form::select('comedores', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->comedores : null, ['class' => 'form-control select2', 'id' => 'comedores']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_servicio" class="form-label text-uppercase">Baño Servicio</label>
                        {!! Form::select('banios_servicio', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->banios_servicio : null, ['class' => 'form-control select2', 'id' => 'banios_servicio']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_social" class="form-label text-uppercase">Baño Social</label>
                        {!! Form::select('banios_social', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->banios_social : null, ['class' => 'form-control select2', 'id' => 'banios_social']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="banios_privado" class="form-label text-uppercase">Baño Privado</label>
                        {!! Form::select('banios_privado', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->banios_privado : null, ['class' => 'form-control select2', 'id' => 'banios_privado']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="balcones" class="form-label text-uppercase">Balcón</label>
                        {!! Form::select('balcones', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->balcones : null, ['class' => 'form-control select2', 'id' => 'balcones']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_ropa" class="form-label text-uppercase">Zona Ropas</label>
                        {!! Form::select('zona_ropa', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->zona_ropa : null, ['class' => 'form-control select2', 'id' => 'zona_ropa']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="estudios" class="form-label text-uppercase">Estudio</label>
                        {!! Form::select('estudios', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->estudios : null, ['class' => 'form-control select2', 'id' => 'estudios']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                

                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="patios" class="form-label text-uppercase">Patios</label>
                        {!! Form::select('patios', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->patios : null, ['class' => 'form-control select2', 'id' => 'patios']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="vestier" class="form-label text-uppercase">Vestier</label>
                        {!! Form::select('vestier', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->vestier : null, ['class' => 'form-control select2', 'id' => 'vestier']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="escala_emergencia" class="form-label text-uppercase">Escalas Emergencia</label>
                        {!! Form::select('escala_emergencia', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->escala_emergencia : null, ['class' => 'form-control select2', 'id' => 'escala_emergencia']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="closets" class="form-label text-uppercase">Closet</label>
                        {!! Form::select('closets', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->closets : null, ['class' => 'form-control select2', 'id' => 'closets']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="shut_basura" class="form-label text-uppercase">Shut de Basuras</label>
                        {!! Form::select('shut_basura', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->shut_basura : null, ['class' => 'form-control select2', 'id' => 'shut_basura']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_parqueaderos" class="form-label text-uppercase">Cantidad Parqueaderos</label>
                        {!! Form::select('cant_parqueaderos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_parqueaderos : null, ['class' => 'form-control select2', 'id' => 'cant_parqueaderos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_cuarto_util" class="form-label text-uppercase">Cantidad Cuartos Útiles</label>
                        {!! Form::select('cant_cuarto_util', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_cuarto_util : null, ['class' => 'form-control select2', 'id' => 'cant_cuarto util']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_kioscos" class="form-label text-uppercase">Cantidad Kioscos</label>
                        {!! Form::select('cant_kioscos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_kioskos : null, ['class' => 'form-control select2', 'id' => 'cant_kioscos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_piscinas" class="form-label text-uppercase">Cantidad Piscinas</label>
                        {!! Form::select('cant_piscinas', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_piscinas : null, ['class' => 'form-control select2', 'id' => 'cant_piscinas']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_establos" class="form-label text-uppercase">Cantidad Establos</label>
                        {!! Form::select('cant_establos', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_establos : null, ['class' => 'form-control select2', 'id' => 'cant_establos']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_billares" class="form-label text-uppercase">Cantidad Billares</label>
                        {!! Form::select('cant_billares', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_billares : null, ['class' => 'form-control select2', 'id' => 'cant_billares']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="cant_ascensores" class="form-label text-uppercase">Cantidad Ascensores</label>
                        {!! Form::select('cant_ascensores', collect(['' => 'Seleccionar...'])->union($indicador_numerico), isset($calcularAvaluo) ? $calcularAvaluo->cant_ascensores : null, ['class' => 'form-control select2', 'id' => 'cant_ascensores']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12">
                    <div class="form-group d-flex flex-column" data-validate="State Is Required">
                        <label for="obs_caract_inmueble" class="form-label text-uppercase">Observaciones Características del Inmueble<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_caract_inmueble', isset($calcularAvaluo) ? $calcularAvaluo->obs_caract_inmueble : null, ['class' => 'form-control', 'id' => 'obs_caract_inmueble', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Características Inmueble" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
