{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">EQUIPAMIENTO Y DOTACIÓN COMUNAL</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porteria_24_horas" class="form-label text-uppercase">Porteria 24 Horas<span class="text-danger">*</span></label>
                        {!! Form::select('porteria_24_horas', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'porteria_24_horas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="parqueo_comun" class="form-label text-uppercase">Parqueo Común<span class="text-danger">*</span></label>
                        {!! Form::select('parqueo_comun', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'parqueo_comun', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="juegos_infantiles" class="form-label text-uppercase">Juegos Infantiles</label>
                        {!! Form::select('juegos_infantiles', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'juegos_infantiles']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_mascotas" class="form-label text-uppercase">Zona Mascotas<span class="text-danger">*</span></label>
                        {!! Form::select('zona_mascotas', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'zona_mascotas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="piscina" class="form-label text-uppercase">Piscina<span class="text-danger">*</span></label>
                        {!! Form::select('piscina', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'piscina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="zonas_verdes" class="form-label text-uppercase">Zonas Verdes<span class="text-danger">*</span></label>
                        {!! Form::select('zonas_verdes', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'zonas_verdes', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="sauna" class="form-label text-uppercase">Sauna<span class="text-danger">*</span></label>
                        {!! Form::select('sauna', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'sauna', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="salon_social" class="form-label text-uppercase">Salon Social</label>
                        {!! Form::select('salon_social', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'salon_social']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="turco" class="form-label text-uppercase">Turco<span class="text-danger">*</span></label>
                        {!! Form::select('turco', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'turco', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="canchas" class="form-label text-uppercase">canchas</label>
                        {!! Form::select('canchas', collect(['' => 'Seleccionar...'])->union($si_no), null, ['class' => 'form-control select2', 'id' => 'canchas']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="observaciones_equipamiento_comunal" class="form-label text-uppercase">Observaciones Equipamiento y Dotación Comunal<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_equipamiento_comunal', null, ['class' => 'form-control', 'id' => 'observaciones_equipamiento_comunal', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Dotación Comunal" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
