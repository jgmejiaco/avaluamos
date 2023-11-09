{!! Form::open(['method' => 'POST', 'route' => ['visita_reg_fotografico_update'], 'class' => 'mt-5', 'autocomplete' => 'off', 'id' => 'form_fotografias', 'enctype'=>'multipart/form-data']) !!}
@csrf
    <div id="div_formulario_visita" class="border border-dark-subtle w-100 mx-auto p-5 rounded-4">
        <div class="mb-5">
            {!! Form::hidden('id_visita', isset($editarVisita) ? $editarVisita->id_visita : null, ['class' => '', 'id' => 'id_visita']) !!}
            {!! Form::hidden('id_cliente', isset($editarVisita) ? $editarVisita->id_cliente : null, ['class' => '', 'id' => 'id_cliente']) !!}
            <h2 class="text-uppercase">REGISTRO FOTOGRÁFICO</h2>

            <div class="row mb-5">
                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_fachada" class="form-label text-uppercase">Fachada</label>
                        <div class="div-file">
                            {!! Form::file('rf_fachada', ['class' => 'form-control file', 'id' => 'rf_fachada', 'onchange' => 'displaySelectedFile("rf_fachada","selected_rf_fachada")']) !!}
                        </div>
                        @php
                            $rutaRfFachada = $editarVisita->rf_fachada;
                            $rf_fachada = str_replace("/storage/app/public/", "/storage/", $rutaRfFachada);
                        @endphp
                
                        @if ($rf_fachada != null || $rf_fachada != "")
                            <a href="{{$rf_fachada}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Fachada</a>
                        @endif
                        <span id="selected_rf_fachada" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_entrada" class="form-label text-uppercase">Entrada</label>
                        <div class="div-file">
                            {!! Form::file('rf_entrada', ['class' => 'form-control file', 'id' => 'rf_entrada', 'onchange' => 'displaySelectedFile("rf_entrada","selected_rf_entrada")']) !!}
                        </div>

                        @php
                            $rutaRfEntrada = $editarVisita->rf_entrada;
                            $rf_entrada = str_replace("/storage/app/public/", "/storage/", $rutaRfEntrada);
                        @endphp

                        @if ($rf_entrada != null || $rf_entrada != "")
                            <a href="{{$rf_entrada}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Entrada</a>
                        @endif
                        <span id="selected_rf_entrada" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_sala1" class="form-label text-uppercase">sala 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_sala1', ['class' => 'form-control file', 'id' => 'rf_sala1', 'onchange' => 'displaySelectedFile("rf_sala1","selected_rf_sala1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfSala1 = $editarVisita->rf_sala1;
                            $rf_sala1 = str_replace("/storage/app/public/", "/storage/", $rutaRfSala1);
                        @endphp
                        
                        @if ($rf_sala1 != null || $rf_sala1 != "")
                            <a href="{{$rf_sala1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Sala 1</a>
                        @endif
                        <span id="selected_rf_sala1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_sala2" class="form-label text-uppercase">sala 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_sala2', ['class' => 'form-control file', 'id' => 'rf_sala2', 'onchange' => 'displaySelectedFile("rf_sala2","selected_rf_sala2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfSala2 = $editarVisita->rf_sala2;
                            $rf_sala2 = str_replace("/storage/app/public/", "/storage/", $rutaRfSala2);
                        @endphp
                        
                        @if ($rf_sala2 != null || $rf_sala2 != "")
                            <a href="{{$rf_sala2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Sala 2</a>
                        @endif
                        <span id="selected_rf_sala2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_sala3" class="form-label text-uppercase">sala 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_sala3', ['class' => 'form-control file', 'id' => 'rf_sala3', 'onchange' => 'displaySelectedFile("rf_sala3","selected_rf_sala3")']) !!}
                        </div>

                        @php
                            $rutaRfSala3 = $editarVisita->rf_sala3;
                            $rf_sala3 = str_replace("/storage/app/public/", "/storage/", $rutaRfSala3);
                        @endphp
                        
                        @if ($rf_sala3 != null || $rf_sala3 != "")
                            <a href="{{$rf_sala3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Sala 3</a>
                        @endif
                        <span id="selected_rf_sala3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_comedor1" class="form-label text-uppercase">comedor 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_comedor1', ['class' => 'form-control file', 'id' => 'rf_comedor1', 'onchange' => 'displaySelectedFile("rf_comedor1","selected_rf_comedor1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfComedor1 = $editarVisita->rf_comedor1;
                            $rf_comedor1 = str_replace("/storage/app/public/", "/storage/", $rutaRfComedor1);
                        @endphp
                        
                        @if ($rf_comedor1 != null || $rf_comedor1 != "")
                            <a href="{{$rf_comedor1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Comedor 1</a>
                        @endif
                        <span id="selected_rf_comedor1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_comedor2" class="form-label text-uppercase">comedor 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_comedor2', ['class' => 'form-control file', 'id' => 'rf_comedor2', 'onchange' => 'displaySelectedFile("rf_comedor2","selected_rf_comedor2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfComedor2 = $editarVisita->rf_comedor2;
                            $rf_comedor2 = str_replace("/storage/app/public/", "/storage/", $rutaRfComedor2);
                        @endphp
                        
                        @if ($rf_comedor2 != null || $rf_comedor2 != "")
                            <a href="{{$rf_comedor2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Comedor 2</a>
                        @endif
                        <span id="selected_rf_comedor2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_comedor3" class="form-label text-uppercase">comedor 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_comedor3', ['class' => 'form-control file', 'id' => 'rf_comedor3', 'onchange' => 'displaySelectedFile("rf_comedor3","selected_rf_comedor3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfComedor3 = $editarVisita->rf_comedor3;
                            $rf_comedor3 = str_replace("/storage/app/public/", "/storage/", $rutaRfComedor3);
                        @endphp
                        
                        @if ($rf_comedor3 != null || $rf_comedor3 != "")
                            <a href="{{$rf_comedor3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Comedor 3</a>
                        @endif
                        <span id="selected_rf_comedor3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cocina1" class="form-label text-uppercase">cocina 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_cocina1', ['class' => 'form-control file', 'id' => 'rf_cocina1', 'onchange' => 'displaySelectedFile("rf_cocina1","selected_rf_cocina1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCocina1 = $editarVisita->rf_cocina1;
                            $rf_cocina1 = str_replace("/storage/app/public/", "/storage/", $rutaRfCocina1);
                        @endphp
                        
                        @if ($rf_cocina1 != null || $rf_cocina1 != "")
                            <a href="{{$rf_cocina1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cocina 1</a>
                        @endif
                        <span id="selected_rf_cocina1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cocina2" class="form-label text-uppercase">cocina 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_cocina2', ['class' => 'form-control file', 'id' => 'rf_cocina2', 'onchange' => 'displaySelectedFile("rf_cocina2","selected_rf_cocina2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCocina2 = $editarVisita->rf_cocina2;
                            $rf_cocina2 = str_replace("/storage/app/public/", "/storage/", $rutaRfCocina2);
                        @endphp
                        
                        @if ($rf_cocina2 != null || $rf_cocina2 != "")
                            <a href="{{$rf_cocina2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cocina 2</a>
                        @endif
                        <span id="selected_rf_cocina2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cocina3" class="form-label text-uppercase">cocina 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_cocina3', ['class' => 'form-control file', 'id' => 'rf_cocina3', 'onchange' => 'displaySelectedFile("rf_cocina3","selected_rf_cocina3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCocina3 = $editarVisita->rf_cocina3;
                            $rf_cocina3 = str_replace("/storage/app/public/", "/storage/", $rutaRfCocina3);
                        @endphp
                        
                        @if ($rf_cocina3 != null || $rf_cocina3 != "")
                            <a href="{{$rf_cocina3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cocina 3</a>
                        @endif
                        <span id="selected_rf_cocina3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion1" class="form-label text-uppercase">habitación 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion1', ['class' => 'form-control file', 'id' => 'rf_habitacion1', 'onchange' => 'displaySelectedFile("rf_habitacion1","selected_rf_habitacion1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion1 = $editarVisita->rf_habitacion1;
                            $rf_habitacion1 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion1);
                        @endphp
                        
                        @if ($rf_habitacion1 != null || $rf_habitacion1 != "")
                            <a href="{{$rf_habitacion1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 1</a>
                        @endif
                        <span id="selected_rf_habitacion1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion2" class="form-label text-uppercase">habitación 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion2', ['class' => 'form-control file', 'id' => 'rf_habitacion2', 'onchange' => 'displaySelectedFile("rf_habitacion2","selected_rf_habitacion2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion2 = $editarVisita->rf_habitacion2;
                            $rf_habitacion2 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion2);
                        @endphp
                        
                        @if ($rf_habitacion2 != null || $rf_habitacion2 != "")
                            <a href="{{$rf_habitacion2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 2</a>
                        @endif
                        <span id="selected_rf_habitacion2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion3" class="form-label text-uppercase">habitación 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion3', ['class' => 'form-control file', 'id' => 'rf_habitacion3', 'onchange' => 'displaySelectedFile("rf_habitacion3","selected_rf_habitacion3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion3 = $editarVisita->rf_habitacion3;
                            $rf_habitacion3 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion3);
                        @endphp
                        
                        @if ($rf_habitacion3 != null || $rf_habitacion3 != "")
                            <a href="{{$rf_habitacion3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 3</a>
                        @endif
                        <span id="selected_rf_habitacion3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion4" class="form-label text-uppercase">habitación 4</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion4', ['class' => 'form-control file', 'id' => 'rf_habitacion4', 'onchange' => 'displaySelectedFile("rf_habitacion4","selected_rf_habitacion4")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion4 = $editarVisita->rf_habitacion4;
                            $rf_habitacion4 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion4);
                        @endphp
                        
                        @if ($rf_habitacion4 != null || $rf_habitacion4 != "")
                            <a href="{{$rf_habitacion4}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 4</a>
                        @endif
                        <span id="selected_rf_habitacion4" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion5" class="form-label text-uppercase">habitación 5</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion5', ['class' => 'form-control file', 'id' => 'rf_habitacion5', 'onchange' => 'displaySelectedFile("rf_habitacion5","selected_rf_habitacion5")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion5 = $editarVisita->rf_habitacion5;
                            $rf_habitacion5 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion5);
                        @endphp
                        
                        @if ($rf_habitacion5 != null || $rf_habitacion5 != "")
                            <a href="{{$rf_habitacion5}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 5</a>
                        @endif
                        <span id="selected_rf_habitacion5" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion6" class="form-label text-uppercase">habitación 6</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion6', ['class' => 'form-control file', 'id' => 'rf_habitacion6', 'onchange' => 'displaySelectedFile("rf_habitacion6","selected_rf_habitacion6")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion6 = $editarVisita->rf_habitacion6;
                            $rf_habitacion6 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion6);
                        @endphp
                        
                        @if ($rf_habitacion6 != null || $rf_habitacion6 != "")
                            <a href="{{$rf_habitacion6}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 6</a>
                        @endif
                        <span id="selected_rf_habitacion6" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_habitacion7" class="form-label text-uppercase">habitación 7</label>
                        <div class="div-file">
                            {!! Form::file('rf_habitacion7', ['class' => 'form-control file', 'id' => 'rf_habitacion7', 'onchange' => 'displaySelectedFile("rf_habitacion7","selected_rf_habitacion7")']) !!}
                        </div>
                        
                        @php
                            $rutaRfHabitacion7 = $editarVisita->rf_habitacion7;
                            $rf_habitacion7 = str_replace("/storage/app/public/", "/storage/", $rutaRfHabitacion7);
                        @endphp
                        
                        @if ($rf_habitacion7 != null || $rf_habitacion7 != "")
                            <a href="{{$rf_habitacion7}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Habitación 7</a>
                        @endif
                        <span id="selected_rf_habitacion7" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_bano1" class="form-label text-uppercase">baño 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_bano1', ['class' => 'form-control file', 'id' => 'rf_bano1', 'onchange' => 'displaySelectedFile("rf_bano1","selected_rf_bano1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBano1 = $editarVisita->rf_bano1;
                            $rf_bano1 = str_replace("/storage/app/public/", "/storage/", $rutaRfBano1);
                        @endphp
                        
                        @if ($rf_bano1 != null || $rf_bano1 != "")
                            <a href="{{$rf_bano1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Baño 1</a>
                        @endif
                        <span id="selected_rf_bano1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_bano2" class="form-label text-uppercase">baño 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_bano2', ['class' => 'form-control file', 'id' => 'rf_bano2', 'onchange' => 'displaySelectedFile("rf_bano2","selected_rf_bano2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBano2 = $editarVisita->rf_bano2;
                            $rf_bano2 = str_replace("/storage/app/public/", "/storage/", $rutaRfBano2);
                        @endphp
                        
                        @if ($rf_bano2 != null || $rf_bano2 != "")
                            <a href="{{$rf_bano2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Baño 2</a>
                        @endif
                        <span id="selected_rf_bano2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_bano3" class="form-label text-uppercase">baño 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_bano3', ['class' => 'form-control file', 'id' => 'rf_bano3', 'onchange' => 'displaySelectedFile("rf_bano3","selected_rf_bano3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBano3 = $editarVisita->rf_bano3;
                            $rf_bano3 = str_replace("/storage/app/public/", "/storage/", $rutaRfBano3);
                        @endphp
                        
                        @if ($rf_bano3 != null || $rf_bano3 != "")
                            <a href="{{$rf_bano3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Baño 3</a>
                        @endif
                        <span id="selected_rf_bano3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_patio1" class="form-label text-uppercase">patio 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_patio1', ['class' => 'form-control file', 'id' => 'rf_patio1', 'onchange' => 'displaySelectedFile("rf_patio1","selected_rf_patio1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPatio1 = $editarVisita->rf_patio1;
                            $rf_patio1 = str_replace("/storage/app/public/", "/storage/", $rutaRfPatio1);
                        @endphp
                        
                        @if ($rf_patio1 != null || $rf_patio1 != "")
                            <a href="{{$rf_patio1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Patio 1</a>
                        @endif
                        <span id="selected_rf_patio1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_patio2" class="form-label text-uppercase">patio 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_patio2', ['class' => 'form-control file', 'id' => 'rf_patio2', 'onchange' => 'displaySelectedFile("rf_patio2","selected_rf_patio2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPatio2 = $editarVisita->rf_patio2;
                            $rf_patio2 = str_replace("/storage/app/public/", "/storage/", $rutaRfPatio2);
                        @endphp

                        @if ($rf_patio2 != null || $rf_patio2 != "")
                            <a href="{{$rf_patio2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Patio 2</a>
                        @endif
                        <span id="selected_rf_patio2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_patio3" class="form-label text-uppercase">patio 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_patio3', ['class' => 'form-control file', 'id' => 'rf_patio3', 'onchange' => 'displaySelectedFile("rf_patio3","selected_rf_patio3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPatio3 = $editarVisita->rf_patio3;
                            $rf_patio3 = str_replace("/storage/app/public/", "/storage/", $rutaRfPatio3);
                        @endphp
                        
                        @if ($rf_patio3 != null || $rf_patio3 != "")
                            <a href="{{$rf_patio3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Patio 3</a>
                        @endif
                        <span id="selected_rf_patio3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_estudio1" class="form-label text-uppercase">Estudio 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_estudio1', ['class' => 'form-control file', 'id' => 'rf_estudio1', 'onchange' => 'displaySelectedFile("rf_estudio1","selected_rf_estudio1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfEstudio1 = $editarVisita->rf_estudio1;
                            $rf_estudio1 = str_replace("/storage/app/public/", "/storage/", $rutaRfEstudio1);
                        @endphp
                        
                        @if ($rf_estudio1 != null || $rf_estudio1 != "")
                            <a href="{{$rf_estudio1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Estudio 1</a>
                        @endif
                        <span id="selected_rf_estudio1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_estudio2" class="form-label text-uppercase">Estudio 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_estudio2', ['class' => 'form-control file', 'id' => 'rf_estudio2', 'onchange' => 'displaySelectedFile("rf_estudio2","selected_rf_estudio2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfEstudio2 = $editarVisita->rf_estudio2;
                            $rf_estudio2 = str_replace("/storage/app/public/", "/storage/", $rutaRfEstudio2);
                        @endphp
                        
                        @if ($rf_estudio2 != null || $rf_estudio2 != "")
                            <a href="{{$rf_estudio2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Estudio 2</a>
                        @endif
                        <span id="selected_rf_estudio2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_estudio3" class="form-label text-uppercase">Estudio 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_estudio3', ['class' => 'form-control file', 'id' => 'rf_estudio3', 'onchange' => 'displaySelectedFile("rf_estudio3","selected_rf_estudio3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfEstudio3 = $editarVisita->rf_estudio3;
                            $rf_estudio3 = str_replace("/storage/app/public/", "/storage/", $rutaRfEstudio3);
                        @endphp
                        
                        @if ($rf_estudio3 != null || $rf_estudio3 != "")
                            <a href="{{$rf_estudio3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Estudio 3</a>
                        @endif
                        <span id="selected_rf_estudio3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cuarto_util1" class="form-label text-uppercase">Cuarto Útil 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_cuarto_util1', ['class' => 'form-control file', 'id' => 'rf_cuarto_util1', 'onchange' => 'displaySelectedFile("rf_cuarto_util1","selected_rf_cuarto_util1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCuartoUtil1 = $editarVisita->rf_cuarto_util1;
                            $rf_cuarto_util1 = str_replace("/storage/app/public/", "/storage/", $rutaRfCuartoUtil1);
                        @endphp
                        
                        @if ($rf_cuarto_util1 != null || $rf_cuarto_util1 != "")
                            <a href="{{$rf_cuarto_util1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cuato Útil 1</a>
                        @endif
                        <span id="selected_rf_cuarto_util1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cuarto_util2" class="form-label text-uppercase">Cuarto Útil 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_cuarto_util2', ['class' => 'form-control file', 'id' => 'rf_cuarto_util2', 'onchange' => 'displaySelectedFile("rf_cuarto_util2","selected_rf_cuarto_util2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCuartoUtil2 = $editarVisita->rf_cuarto_util2;
                            $rf_cuarto_util2 = str_replace("/storage/app/public/", "/storage/", $rutaRfCuartoUtil2);
                        @endphp
                        
                        @if ($rf_cuarto_util2 != null || $rf_cuarto_util2 != "")
                            <a href="{{$rf_cuarto_util2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cuato Útil 2</a>
                        @endif
                        <span id="selected_rf_cuarto_util2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_cuarto_util3" class="form-label text-uppercase">Cuarto Útil 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_cuarto_util3', ['class' => 'form-control file', 'id' => 'rf_cuarto_util3', 'onchange' => 'displaySelectedFile("rf_cuarto_util3","selected_rf_cuarto_util3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfCuartoUtil3 = $editarVisita->rf_cuarto_util3;
                            $rf_cuarto_util3 = str_replace("/storage/app/public/", "/storage/", $rutaRfCuartoUtil3);
                        @endphp
                        
                        @if ($rf_cuarto_util3 != null || $rf_cuarto_util3 != "")
                            <a href="{{$rf_cuarto_util3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Cuato Útil 3</a>
                        @endif
                        <span id="selected_rf_cuarto_util3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_pasillo1" class="form-label text-uppercase">Pasillo 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_pasillo1', ['class' => 'form-control file', 'id' => 'rf_pasillo1', 'onchange' => 'displaySelectedFile("rf_pasillo1","selected_rf_pasillo1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPasillo1 = $editarVisita->rf_pasillo1;
                            $rf_pasillo1 = str_replace("/storage/app/public/", "/storage/", $rutaRfPasillo1);
                        @endphp
                        
                        @if ($rf_pasillo1 != null || $rf_pasillo1 != "")
                            <a href="{{$rf_pasillo1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Pasillo 1</a>
                        @endif
                        <span id="selected_rf_pasillo1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_pasillo2" class="form-label text-uppercase">Pasillo 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_pasillo2', ['class' => 'form-control file', 'id' => 'rf_pasillo2', 'onchange' => 'displaySelectedFile("rf_pasillo2","selected_rf_pasillo2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPasillo2 = $editarVisita->rf_pasillo2;
                            $rf_pasillo2 = str_replace("/storage/app/public/", "/storage/", $rutaRfPasillo2);
                        @endphp
                        
                        @if ($rf_pasillo2 != null || $rf_pasillo2 != "")
                            <a href="{{$rf_pasillo2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Pasillo 2</a>
                        @endif
                        <span id="selected_rf_pasillo2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_pasillo3" class="form-label text-uppercase">Pasillo 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_pasillo3', ['class' => 'form-control file', 'id' => 'rf_pasillo3', 'onchange' => 'displaySelectedFile("rf_pasillo3","selected_rf_pasillo3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfPasillo3 = $editarVisita->rf_pasillo3;
                            $rf_pasillo3 = str_replace("/storage/app/public/", "/storage/", $rutaRfPasillo3);
                        @endphp
                        
                        @if ($rf_pasillo3 != null || $rf_pasillo3 != "")
                            <a href="{{$rf_pasillo3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Pasillo 3</a>
                        @endif
                        <span id="selected_rf_pasillo3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_zona_ropa1" class="form-label text-uppercase">Zona ropa 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_zona_ropa1', ['class' => 'form-control file', 'id' => 'rf_zona_ropa1', 'onchange' => 'displaySelectedFile("rf_zona_ropa1","selected_rf_zona_ropa1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfZonaRopa1 = $editarVisita->rf_zona_ropa1;
                            $rf_zona_ropa1 = str_replace("/storage/app/public/", "/storage/", $rutaRfZonaRopa1);
                        @endphp
                        
                        @if ($rf_zona_ropa1 != null || $rf_zona_ropa1 != "")
                            <a href="{{$rf_zona_ropa1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Zona Ropa 1</a>
                        @endif
                        <span id="selected_rf_zona_ropa1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_zona_ropa2" class="form-label text-uppercase">Zona ropa 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_zona_ropa2', ['class' => 'form-control file', 'id' => 'rf_zona_ropa2', 'onchange' => 'displaySelectedFile("rf_zona_ropa2","selected_rf_zona_ropa2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfZonaRopa2 = $editarVisita->rf_zona_ropa2;
                            $rf_zona_ropa2 = str_replace("/storage/app/public/", "/storage/", $rutaRfZonaRopa2);
                        @endphp
                        
                        @if ($rf_zona_ropa2 != null || $rf_zona_ropa2 != "")
                            <a href="{{$rf_zona_ropa2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Zona Ropa 2 </a>
                        @endif
                        <span id="selected_rf_zona_ropa2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_zona_ropa3" class="form-label text-uppercase">Zona ropa 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_zona_ropa3', ['class' => 'form-control file', 'id' => 'rf_zona_ropa3', 'onchange' => 'displaySelectedFile("rf_zona_ropa3","selected_rf_zona_ropa3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfZonaRopa3 = $editarVisita->rf_zona_ropa3;
                            $rf_zona_ropa3 = str_replace("/storage/app/public/", "/storage/", $rutaRfZonaRopa3);
                        @endphp
                        
                        @if ($rf_zona_ropa3 != null || $rf_zona_ropa3 != "")
                            <a href="{{$rf_zona_ropa3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Zona Ropa 3</a>
                        @endif
                        <span id="selected_rf_zona_ropa3" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_balcon1" class="form-label text-uppercase">balcón 1</label>
                        <div class="div-file">
                            {!! Form::file('rf_balcon1', ['class' => 'form-control file', 'id' => 'rf_balcon1', 'onchange' => 'displaySelectedFile("rf_balcon1","selected_rf_balcon1")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBalcon1 = $editarVisita->rf_balcon1;
                            $rf_balcon1 = str_replace("/storage/app/public/", "/storage/", $rutaRfBalcon1);
                        @endphp
                        
                        @if ($rf_balcon1 != null || $rf_balcon1 != "")
                            <a href="{{$rf_balcon1}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Balcón 1</a>
                        @endif
                        <span id="selected_rf_balcon1" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_balcon2" class="form-label text-uppercase">balcón 2</label>
                        <div class="div-file">
                            {!! Form::file('rf_balcon2', ['class' => 'form-control file', 'id' => 'rf_balcon2', 'onchange' => 'displaySelectedFile("rf_balcon2","selected_rf_balcon2")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBalcon2 = $editarVisita->rf_balcon2;
                            $rf_balcon2 = str_replace("/storage/app/public/", "/storage/", $rutaRfBalcon2);
                        @endphp
                        
                        @if ($rf_balcon2 != null || $rf_balcon2 != "")
                            <a href="{{$rf_balcon2}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Balcón 2</a>
                        @endif
                        <span id="selected_rf_balcon2" class="text-danger hidden"></span>
                    </div>
                </div>

                {{-- ======================= --}}

                <div class="col-12 col-sm-3 col-md-3 mb-5">
                    <div class="form-group d-flex flex-column file-container">
                        <label for="rf_balcon3" class="form-label text-uppercase">balcón 3</label>
                        <div class="div-file">
                            {!! Form::file('rf_balcon3', ['class' => 'form-control file', 'id' => 'rf_balcon3', 'onchange' => 'displaySelectedFile("rf_balcon3","selected_rf_balcon3")']) !!}
                        </div>
                        
                        @php
                            $rutaRfBalcon3 = $editarVisita->rf_balcon3;
                            $rf_balcon3 = str_replace("/storage/app/public/", "/storage/", $rutaRfBalcon3);
                        @endphp
                        
                        @if ($rf_balcon3 != null || $rf_balcon3 != "")
                            <a href="{{$rf_balcon3}}" target="_blank" rel="noopener noreferrer" class="text-primary">Foto Balcón 3</a>
                        @endif
                        <span id="selected_rf_balcon3" class="text-danger hidden"></span>
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
                <input class="btn btn-primary rounded-pill w-25 mt-5" type="submit" value="Guardar Registro Fotográfico">
            </div>
        </div>
    </div>
{!! Form::close() !!}
