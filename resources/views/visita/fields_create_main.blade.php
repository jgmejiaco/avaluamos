<div class="pt-4 pb-0 py-0">
    <div class="panel panel-default container-fluid p-5">
        <div class="panel-body p-2" id="bodyID">
            <ul class="nav nav-tabs" style="margin-bottom: 1vw !important;">
                <li class="nav-item">
                    <a class="nav-link active" href="#nav_visita_tecnica" id="nav_visita_tecnica_tab" data-toggle="tab" role="tab" aria-controls="nav-personal" aria-selected="true">Visita Técnica</a>
                </li>
            </ul>
            <!-- ================================== -->
            <!-- ================================== -->
            <div class="tab-content p-0">
                <!-- CONTENIDO PESTAÑA "VISITA TÉCNICA" CREACIÓN -->
                <div class="tab-pane active" id="nav_visita_tecnica" role="tabpanel" aria-labelledby="nav_visita_tecnica_tab">
                    @include('visita.fields_create_visita_tecnica')
                </div>
            </div>
        </div>
    </div>
</div>
