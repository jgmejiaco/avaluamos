{!! Form::open(['method' => 'POST', 'route' => ['visita.store'], 'class' => 'login100-form validate-form mt-5', 'autocomplete' => 'off', 'id' => 'form_visita']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            <h2 class="text-uppercase">7 - EQUIPAMIENTO Y DOTACIÓN COMUNAL</h2>

            <div class="row mb-5">
                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="porteria_24_horas" class="form-label text-uppercase" data-placeholder="porteria_24_horas">Porteria 24 Horas<span class="text-danger">*</span></label>
                        {!! Form::text('porteria_24_horas', null, ['class' => 'form-control select2', 'id' => 'porteria_24_horas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="parqueo_comun" class="form-label text-uppercase" data-placeholder="parqueo_comun">Parqueo Común<span class="text-danger">*</span></label>
                        {!! Form::text('parqueo_comun', null, ['class' => 'form-control', 'id' => 'parqueo_comun', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                {{-- @php
                    use Carbon\Carbon;
                    // $fecha_nacimiento_formato = isset($usuario) ? Carbon::parse($usuario->fecha_nacimiento) : null;
                @endphp --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100">
                        <label for="juegos_infantiles" class="form-label text-uppercase" data-placeholder="juegos_infantiles">Juegos Infantiles</label>
                        {!! Form::text('juegos_infantiles', null, ['class' => 'form-control', 'id' => 'juegos_infantiles']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="zona_mascotas" class="form-label text-uppercase" data-placeholder="zona_mascotas">Zona Mascotas<span class="text-danger">*</span></label>
                        {!! Form::text('zona_mascotas', null, ['class' => 'form-control select2', 'id' => 'zona_mascotas', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="piscina" class="form-label text-uppercase" data-placeholder="piscina">Piscina<span class="text-danger">*</span></label>
                        {!! Form::text('piscina', null, ['class' => 'form-control select2', 'id' => 'piscina', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="zonas_verdes" class="form-label text-uppercase" data-placeholder="zonas_verdes">Zonas Verdes<span class="text-danger">*</span></label>
                        {!! Form::text('zonas_verdes', null, ['class' => 'form-control select2', 'id' => 'zonas_verdes', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="sauna" class="form-label text-uppercase" data-placeholder="sauna">Sauna<span class="text-danger">*</span></label>
                        {!! Form::text('sauna', null, ['class' => 'form-control select2', 'id' => 'sauna', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="div_telefono">
                    <div class="form-group">
                        <label for="salon_social" class="form-label text-uppercase" data-placeholder="salon_social">Salon Social</label>
                        {!! Form::text('salon_social', null, ['class' => 'form-control', 'id' => 'salon_social']) !!}
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-md-3">
                    <div class="wrap-input100 validate-input" data-validate="Required">
                        <label for="turco" class="form-label text-uppercase" data-placeholder="turco">Turco<span class="text-danger">*</span></label>
                        {!! Form::text('turco', null, ['class' => 'form-control text-uppercase', 'id' => 'turco', 'required']) !!}
                    </div>
                </div>

                {{-- ======================= --}}
                
                <div class="col-12 col-md-3" id="">
                    <div class="wrap-input100">
                        <label for="canchas" class="form-label text-uppercase" data-placeholder="canchas">canchas</label>
                        {!! Form::text('canchas', null, ['class' => 'form-control', 'id' => 'canchas']) !!}
                    </div>
                </div>
                
                {{-- ======================= --}}
                
                <div class="col-12">
                    <div class="wrap-input100 validate-input" data-validate="State Is Required">
                        <label for="observaciones_equipamiento_comunal" class="form-label text-uppercase" data-placeholder="observaciones_equipamiento_comunal">Observaciones Equipamiento y Dotación Comunal<span class="text-danger">*</span></label>
                        {!! Form::textarea('observaciones_equipamiento_comunal', null, ['class' => 'form-control select2', 'id' => 'observaciones_equipamiento_comunal', 'required']) !!}
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Visita" id="btn_guardar_visita" name="btn_guardar_visita">
            </div>
        </div>
    </div>
{!! Form::close() !!}
