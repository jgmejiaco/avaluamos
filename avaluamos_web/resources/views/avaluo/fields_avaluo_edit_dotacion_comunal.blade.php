{!! Form::open(['method' => 'POST', 'route' => ['visita_dotacion_comunal_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_dotacion_comunal']) !!}
@csrf
    <div id="div_dotacion_comunal" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::text('id_visita', isset($calcularAvaluo) ? $calcularAvaluo->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            <h2 class="text-uppercase">EQUIPAMIENTO Y DOTACIÓN COMUNAL</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="porteria_24" class="form-label text-uppercase">Porteria 24 Horas<span class="text-danger">*</span></label>
                        {!! Form::select('porteria_24', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->porteria_24 : null, ['class' => 'form-control select2', 'id' => 'porteria_24', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="parqueo_comun" class="form-label text-uppercase">Parqueo Común<span class="text-danger">*</span></label>
                        {!! Form::select('parqueo_comun', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->parqueo_comun : null, ['class' => 'form-control select2', 'id' => 'parqueo_comun', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="juegos_infantiles" class="form-label text-uppercase">Juegos Infantiles</label>
                        {!! Form::select('juegos_infantiles', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->juegos_infantiles : null, ['class' => 'form-control select2', 'id' => 'juegos_infantiles']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="zona_mascotas" class="form-label text-uppercase">Zona Mascotas<span class="text-danger">*</span></label>
                        {!! Form::select('zona_mascotas', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->zona_mascotas : null, ['class' => 'form-control select2', 'id' => 'zona_mascotas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="piscinas" class="form-label text-uppercase">Piscina<span class="text-danger">*</span></label>
                        {!! Form::select('piscinas', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->piscinas : null, ['class' => 'form-control select2', 'id' => 'piscinas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="zonas_verdes" class="form-label text-uppercase">Zonas Verdes<span class="text-danger">*</span></label>
                        {!! Form::select('zonas_verdes', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->zonas_verdes : null, ['class' => 'form-control select2', 'id' => 'zonas_verdes', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="sauna" class="form-label text-uppercase">Sauna<span class="text-danger">*</span></label>
                        {!! Form::select('sauna', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->sauna : null, ['class' => 'form-control select2', 'id' => 'sauna', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group d-flex flex-column">
                        <label for="salon_social" class="form-label text-uppercase">Salon Social</label>
                        {!! Form::select('salon_social', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->salon_social : null, ['class' => 'form-control select2', 'id' => 'salon_social']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group d-flex flex-column">
                        <label for="turco" class="form-label text-uppercase">Turco<span class="text-danger">*</span></label>
                        {!! Form::select('turco', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->turco : null, ['class' => 'form-control select2', 'id' => 'turco', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="canchas" class="form-label text-uppercase">canchas</label>
                        {!! Form::select('canchas', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->canchas : null, ['class' => 'form-control select2', 'id' => 'canchas']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="gimnasio" class="form-label text-uppercase">Gimnasio</label>
                        {!! Form::select('gimnasio', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->gimnasio : null, ['class' => 'form-control select2', 'id' => 'gimnasio']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="playground" class="form-label text-uppercase">Playground</label>
                        {!! Form::select('playground', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->playground : null, ['class' => 'form-control select2', 'id' => 'playground']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="barbecue" class="form-label text-uppercase">Barbecue</label>
                        {!! Form::select('barbecue', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->barbecue : null, ['class' => 'form-control select2', 'id' => 'barbecue']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="supermercado" class="form-label text-uppercase">Supermercado</label>
                        {!! Form::select('supermercado', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->supermercado : null, ['class' => 'form-control select2', 'id' => 'supermercado']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="sala_cine" class="form-label text-uppercase">Sala Cine</label>
                        {!! Form::select('sala_cine', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->sala_cine : null, ['class' => 'form-control select2', 'id' => 'sala_cine']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="cafeteria" class="form-label text-uppercase">Cafeteria</label>
                        {!! Form::select('cafeteria', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->cafeteria : null, ['class' => 'form-control select2', 'id' => 'cafeteria']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="restaurante" class="form-label text-uppercase">Restaurante</label>
                        {!! Form::select('restaurante', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->restaurante : null, ['class' => 'form-control select2', 'id' => 'restaurante']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="form-group d-flex flex-column">
                        <label for="squash" class="form-label text-uppercase">Squash</label>
                        {!! Form::select('squash', collect(['' => 'Seleccionar...'])->union($si_no), isset($calcularAvaluo) ? $calcularAvaluo->squash : null, ['class' => 'form-control select2', 'id' => 'squash']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="form-group d-flex flex-column">
                        <label for="obs_dotacion_comunal" class="form-label text-uppercase">Observaciones Equipamiento y Dotación Comunal<span class="text-danger">*</span></label>
                        {!! Form::textarea('obs_dotacion_comunal', isset($calcularAvaluo) ? $calcularAvaluo->obs_dotacion_comunal : null, ['class' => 'form-control', 'id' => 'obs_dotacion_comunal', 'required']) !!}
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
