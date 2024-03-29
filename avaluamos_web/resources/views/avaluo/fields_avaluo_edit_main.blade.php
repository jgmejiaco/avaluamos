<div class="pt-4 pb-0 py-0">
    <div class="panel panel-default container-fluid p-5">
        <div class="panel-body p-2" id="bodyID">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {{-- <input name="id_cliente" type="text" id="id_cliente" value=""> --}}
                </div>
            </div>
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <ul class="nav nav-tabs" style="margin-bottom: 1vw !important;">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase" href="#nav_cliente" id="nav_cliente_tab" data-toggle="tab" role="tab" aria-controls="nav_cliente" aria-selected="true">Cliente</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_visita_tecnica" id="nav_visita_tecnica_tab" data-toggle="tab" role="tab" aria-controls="nav_visita_tecnica" aria-selected="true">Visita Técnica</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_info_inmueble" id="nav_info_inmueble_tab" data-toggle="tab" role="tab" aria-controls="nav_info_inmueble">Info Inmueble</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_info_juridica" id="nav_info_juridica_tab" data-toggle="tab" role="tab" aria-controls="nav_info_juridica">Info Jurídica</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_caracteristicas_inmueble" id="nav_caracteristicas_inmueble_tab" data-toggle="tab" role="tab" aria-controls="nav_caracteristicas_inmueble">Características del Inmueble</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_acabados_inmueble" id="nav_acabados_inmueble_tab" data-toggle="tab" role="tab" aria-controls="nav_acabados_inmueble">Acabados Inmueble</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_calificacion_inmueble" id="nav_calificacion_inmueble_tab" data-toggle="tab" role="tab" aria-controls="nav_calificacion_inmueble">Calificación Inmueble</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_dotacion_comunal" id="nav_dotacion_comunal_tab" data-toggle="tab" role="tab" aria-controls="nav_dotacion_comunal">Dotación Comunal</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_info_sector" id="nav_info_sector_tab" data-toggle="tab" role="tab" aria-controls="nav_info_sector">Info Sector</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_condiciones_urbanisticas" id="nav_condiciones_urbanisticas_tab" data-toggle="tab" role="tab" aria-controls="nav_condiciones_urbanisticas">Condiciones Urbanisticas</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_estado_conservacion" id="nav_estado_conservacion_tab" data-toggle="tab" role="tab" aria-controls="nav_estado_conservacion">Estado Conservación</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_observaciones_generales" id="nav_observaciones_generales_tab" data-toggle="tab" role="tab" aria-controls="nav_observaciones_generales">Observaciones Generales</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_fotografias" id="nav_fotografias_tab" data-toggle="tab" role="tab" aria-controls="nav_fotografias">Registro Fotográfico</a>
                </li>
                <!-- ================================== -->
                <li class="nav-item">
                    <a class="nav-link" href="#nav_valor_estimado_avaluo" id="nav_valor_estimado_avaluo_tab" data-toggle="tab" role="tab" aria-controls="nav_valor_estimado_avaluo">Valor Estimado Avalúo</a>
                </li>
            </ul>
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <!-- ***************************************************** -->
            <div class="tab-content p-0">
                <!-- CONTENIDO PESTAÑA "CLIENTE" -->
                <div class="tab-pane active" id="nav_cliente" role="tabpanel" aria-labelledby="nav_cliente_tab" tabindex="0">
                    @include('avaluo.fields_avaluo_edit_cliente')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "VISITA TÉCNICA" -->
                <div class="tab-pane" id="nav_visita_tecnica" role="tabpanel" aria-labelledby="nav_visita_tecnica_tab" tabindex="0">
                    @include('avaluo.fields_avaluo_edit_visita_tecnica')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "INFORMACIÓN INMUEBLE" -->
                <div class="tab-pane" id="nav_info_inmueble" role="tabpanel" aria-labelledby="nav_info_inmueble_tab">
                    @include('avaluo.fields_avaluo_edit_info_inmueble')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "INFORMACIÓN JURÍDICA" -->
                <div class="tab-pane" id="nav_info_juridica" role="tabpanel" aria-labelledby="nav_info_juridica_tab">
                    @include('avaluo.fields_avaluo_edit_info_juridica')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "CARACTERÍSTICAS INMUEBLE" -->
                <div class="tab-pane" id="nav_caracteristicas_inmueble" role="tabpanel" aria-labelledby="nav_caracteristicas_inmueble_tab">
                    @include('avaluo.fields_avaluo_edit_caracteristicas_inmueble')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "ACABADOS INMUEBLE" -->
                <div class="tab-pane" id="nav_acabados_inmueble" role="tabpanel" aria-labelledby="nav_acabados_inmueble_tab">
                    @include('avaluo.fields_avaluo_edit_acabados_inmueble')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "CALIFICACIÓN INMUEBLE" -->
                <div class="tab-pane" id="nav_calificacion_inmueble" role="tabpanel" aria-labelledby="nav_calificacion_inmueble_tab">
                    @include('avaluo.fields_avaluo_edit_calificacion_inmueble')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "EQUIPAMIENTO Y DOTACIÓN COMUNAL" -->
                <div class="tab-pane" id="nav_dotacion_comunal" role="tabpanel" aria-labelledby="nav_dotacion_comunal_tab">
                    @include('avaluo.fields_avaluo_edit_dotacion_comunal')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "INFORMACIÓN DEL SECTOR" -->
                <div class="tab-pane" id="nav_info_sector" role="tabpanel" aria-labelledby="nav_info_sector_tab">
                    @include('avaluo.fields_avaluo_edit_info_sector')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "CONDICIONES URBANISTICAS" -->
                <div class="tab-pane" id="nav_condiciones_urbanisticas" role="tabpanel" aria-labelledby="nav_condiciones_urbanisticas_tab">
                    @include('avaluo.fields_avaluo_edit_condiciones_urbanisticas')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "ESTADO DE CONSERVACIÓN" -->
                <div class="tab-pane" id="nav_estado_conservacion" role="tabpanel" aria-labelledby="nav_estado_conservacion_tab" tabindex="0">
                    @include('avaluo.fields_avaluo_edit_estado_conservacion')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "OBSERVACIONES GENERALES" -->
                <div class="tab-pane" id="nav_observaciones_generales" role="tabpanel" aria-labelledby="nav_observaciones_generales_tab">
                    @include('avaluo.fields_avaluo_edit_observaciones_generales')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "REGISTRO FOTOGRÁFICO" -->
                <div class="tab-pane" id="nav_fotografias" role="tabpanel" aria-labelledby="nav_fotografias_tab">
                    @include('avaluo.fields_avaluo_edit_fotografias')
                </div>
                <!-- ================================== -->
                <!-- ================================== -->
                <!-- CONTENIDO PESTAÑA "VALOR ESTIMADO AVALÚO" -->
                <div class="tab-pane" id="nav_valor_estimado_avaluo" role="tabpanel" aria-labelledby="nav_valor_estimado_avaluo_tab">
                    @include('avaluo.fields_avaluo_edit_valor_estimado_avaluo')
                </div>
            </div>
        </div>
    </div>
</div>
