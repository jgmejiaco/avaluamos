<?php

namespace App\Http\Responsable\visitas;

use App\Models\AcabadosInmueble;
use App\Models\CalificacionInmueble;
use App\Models\CaracteristicasInmueble;
use App\Models\CondicionesUrbanisticas;
use App\Models\DotacionComunal;
use App\Models\EstadoConservacion;
use App\Models\InfoInmueble;
use App\Models\InfoJuridica;
use App\Models\InfoSector;
use App\Models\ObservacionesGenerales;
use App\Models\RegistroFotografico;
use App\Models\ValorEstimadoAvaluo;
use App\Models\Visita;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class VisitaStore implements Responsable
{
    public function toResponse($request)
    {
        $objetoAvaluoCheck = request('objeto_avaluo', []);
        if (is_array($objetoAvaluoCheck)) {
            $objetoAvaluoCheck = implode(', ', $objetoAvaluoCheck);
        }

        $datosVisita = [
            'id_cliente'           => request('id_cliente', null),
            'id_dirigido_a'        => request('dirigido_a', null),
            'id_doc_empresa'       => request('tipo_doc_empresa', null),
            'documento_empresa'    => request('doc_dirigido_a', null),
            'objeto_avaluo'        => $objetoAvaluoCheck,
            'id_pais'              => request('pais', null),
            'id_departamento'      => request('departamento', null),
            'id_ciudad'            => request('ciudad', null),
            'id_comuna'            => request('comuna', null),
            'sector'               => strtoupper((string) request('sector', '')),
            'cerca_de'             => strtoupper((string) request('cerca_de', '')),
            'barrio'               => strtoupper((string) request('barrio', '')),
            'unidad_edificio'      => strtoupper((string) request('unidad_edificio', '')),
            'direccion'            => strtoupper((string) request('direccion', '')),
            'id_tipo_inmueble'     => request('tipo_inmueble', null),
            'area'                 => request('area', null),
            'id_estrato'           => request('estrato', null),
            'numero_inmueble'      => strtoupper((string) request('numero_inmueble', '')),
            'latitud'              => request('latitud', null),
            'longitud'             => request('longitud', null),
            'porcentaje_descuento' => request('porcentaje_descuento', null),
            'valor_cotizacion'     => request('valor_cotizacion', null),
            'obser_visita'         => request('obser_visita_tecnica', null),
            'id_visitado'          => request('visitado', null),
            'fecha_visita'         => request('fecha_visita', null),
            'hora_visita'          => request('hora_visita', null),
            'id_visitador'         => request('visitador', null),
            'usu_logueado'         => request('usu_logueado', null),
        ];

        DB::connection('mysql')->beginTransaction();

        try {
            $mismoPredio = VisitaStoreConsultaPredio::consultar(
                $datosVisita['id_cliente'],
                $datosVisita['direccion']
            );

            $nuevaVisita = Visita::create($datosVisita);

            if (! $nuevaVisita) {
                DB::connection('mysql')->rollback();

                return response()->json([
                    'success' => false,
                    'message' => 'Ha ocurrido un error al crear la visita',
                ], 500);
            }

            $idVisita = $nuevaVisita->id_visita;

            if (isset($mismoPredio) && ! is_null($mismoPredio) && ! empty($mismoPredio)) {
                $this->crearHijosDesdePredio($idVisita, $mismoPredio);
            } else {
                $this->crearHijosVacios($idVisita);
            }

            DB::connection('mysql')->commit();

            return response()->json([
                'success'   => true,
                'message'   => 'Visita creada satisfactoriamente',
                'id_visita' => $idVisita,
            ], 201);

        } catch (Exception $e) {
            DB::connection('mysql')->rollback();

            return response()->json([
                'success' => false,
                'message' => 'Error excepción al crear la visita',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    private function crearHijosVacios($idVisita): void
    {
        InfoInmueble::create(['id_visita' => $idVisita]);
        CaracteristicasInmueble::create(['id_visita' => $idVisita]);
        AcabadosInmueble::create(['id_visita' => $idVisita]);
        CalificacionInmueble::create(['id_visita' => $idVisita]);
        DotacionComunal::create(['id_visita' => $idVisita]);
        InfoSector::create(['id_visita' => $idVisita]);
        CondicionesUrbanisticas::create(['id_visita' => $idVisita]);
        ObservacionesGenerales::create(['id_visita' => $idVisita]);
        EstadoConservacion::create(['id_visita' => $idVisita]);
        RegistroFotografico::create(['id_visita' => $idVisita]);
        ValorEstimadoAvaluo::create(['id_visita' => $idVisita]);
        InfoJuridica::create(['id_visita' => $idVisita]);
    }

    private function crearHijosDesdePredio($idVisita, $mismoPredio): void
    {
        InfoInmueble::create([
            'id_visita'             => $idVisita,
            'id_tipo_inmueble'      => $mismoPredio->id_tipo_vivienda,
            'id_uso_inmueble'       => $mismoPredio->id_uso_inmueble,
            'id_tipo_suelo'         => $mismoPredio->id_tipo_suelo,
            'id_topografia'         => $mismoPredio->id_topografia,
            'id_forma'              => $mismoPredio->id_forma,
            'pisos_inmueble'        => $mismoPredio->pisos_inmueble,
            'pisos_edificio'        => $mismoPredio->pisos_edificio,
            'valor_administracion'  => $mismoPredio->valor_administracion,
            'remodelado'            => $mismoPredio->remodelado,
            'altura'                => $mismoPredio->altura,
            'frente'                => $mismoPredio->frente,
            'fondo'                 => $mismoPredio->fondo,
            'area_libre'            => $mismoPredio->area_libre,
            'anios_remodelacion'    => $mismoPredio->anios_remodelacion,
            'area_patios'           => $mismoPredio->area_patios,
            'id_condicion_inmueble' => $mismoPredio->id_condicion_inmueble,
            'obs_info_inmueble'     => $mismoPredio->obs_info_inmueble,
        ]);

        CaracteristicasInmueble::create([
            'id_visita'              => $idVisita,
            'cocinas'                => $mismoPredio->cocinas,
            'habitaciones'           => $mismoPredio->habitaciones,
            'salas'                  => $mismoPredio->salas,
            'habitaciones_servicio'  => $mismoPredio->habitaciones_servicio,
            'comedores'              => $mismoPredio->comedores,
            'banios_servicio'        => $mismoPredio->banios_servicio,
            'banios_social'          => $mismoPredio->banios_social,
            'banios_privado'         => $mismoPredio->banios_privado,
            'balcones'               => $mismoPredio->balcones,
            'zona_ropa'              => $mismoPredio->zona_ropa,
            'estudios'               => $mismoPredio->estudios,
            'patios'                 => $mismoPredio->patios,
            'vestier'                => $mismoPredio->vestier,
            'escala_emergencia'      => $mismoPredio->escala_emergencia,
            'closets'                => $mismoPredio->closets,
            'shut_basura'            => $mismoPredio->shut_basura,
            'cant_parqueaderos'      => $mismoPredio->cant_parqueaderos,
            'cant_cuarto_util'       => $mismoPredio->cant_cuarto_util,
            'cant_kioskos'           => $mismoPredio->cant_kioskos,
            'cant_piscinas'          => $mismoPredio->cant_piscinas,
            'cant_establos'          => $mismoPredio->cant_establos,
            'cant_billares'          => $mismoPredio->cant_billares,
            'cant_ascensores'        => $mismoPredio->cant_ascensores,
            'obs_caract_inmueble'    => $mismoPredio->obs_caract_inmueble,
        ]);

        AcabadosInmueble::create([
            'id_visita'               => $idVisita,
            'id_sistema_constructivo' => $mismoPredio->id_sistema_constructivo,
            'porton_principal'        => $mismoPredio->porton_principal,
            'id_tipo_fachada'         => $mismoPredio->id_tipo_fachada,
            'puertas'                 => $mismoPredio->puertas,
            'id_tipo_muro'            => $mismoPredio->id_tipo_muro,
            'id_ventaneria'           => $mismoPredio->id_ventaneria,
            'id_tipo_techo'           => $mismoPredio->id_tipo_techo,
            'servicios_publicos'      => $mismoPredio->servicios_publicos,
            'pisos'                   => $mismoPredio->pisos,
            'telefono'                => $mismoPredio->telefono,
            'banios'                  => $mismoPredio->banios,
            'energia'                 => $mismoPredio->energia,
            'cocina'                  => $mismoPredio->cocina,
            'agua'                    => $mismoPredio->agua,
            'meson'                   => $mismoPredio->meson,
            'gas'                     => $mismoPredio->gas,
            'patios'                  => $mismoPredio->patios,
            'obs_acabados_inmueble'   => $mismoPredio->obs_acabados_inmueble,
        ]);

        CalificacionInmueble::create([
            'id_visita'                  => $idVisita,
            'cal_estructura'             => $mismoPredio->cal_estructura,
            'cal_porton_ppal'            => $mismoPredio->cal_porton_ppal,
            'cal_fachada'                => $mismoPredio->cal_fachada,
            'cal_puertas'                => $mismoPredio->cal_puertas,
            'cal_muros'                  => $mismoPredio->cal_muros,
            'cal_ventaneria'             => $mismoPredio->cal_ventaneria,
            'cal_techos'                 => $mismoPredio->cal_techos,
            'cal_carpinteria'            => $mismoPredio->cal_carpinteria,
            'cal_pisos'                  => $mismoPredio->cal_pisos,
            'cal_ventilacion'            => $mismoPredio->cal_ventilacion,
            'cal_cocina'                 => $mismoPredio->cal_cocina,
            'cal_iluminacion'            => $mismoPredio->cal_iluminacion,
            'cal_banios'                 => $mismoPredio->cal_banios,
            'cal_distribucion'           => $mismoPredio->cal_distribucion,
            'cal_zona_ropas'             => $mismoPredio->cal_zona_ropas,
            'cal_humedades'              => $mismoPredio->cal_humedades,
            'cal_patios'                 => $mismoPredio->cal_patios,
            'obs_calificacion_inmueble'  => $mismoPredio->obs_calificacion_inmueble,
        ]);

        DotacionComunal::create([
            'id_visita'            => $idVisita,
            'porteria_24'          => $mismoPredio->porteria_24,
            'parqueo_comun'        => $mismoPredio->parqueo_comun,
            'juegos_infantiles'    => $mismoPredio->juegos_infantiles,
            'zona_mascotas'        => $mismoPredio->zona_mascotas,
            'piscinas'             => $mismoPredio->piscinas,
            'zonas_verdes'         => $mismoPredio->zonas_verdes,
            'sauna'                => $mismoPredio->sauna,
            'salon_social'         => $mismoPredio->salon_social,
            'turco'                => $mismoPredio->turco,
            'canchas'              => $mismoPredio->canchas,
            'gimnasio'             => $mismoPredio->gimnasio,
            'playground'           => $mismoPredio->playground,
            'barbecue'             => $mismoPredio->barbecue,
            'supermercado'         => $mismoPredio->supermercado,
            'sala_cine'            => $mismoPredio->sala_cine,
            'cafeteria'            => $mismoPredio->cafeteria,
            'restaurante'          => $mismoPredio->restaurante,
            'squash'               => $mismoPredio->squash,
            'obs_dotacion_comunal' => $mismoPredio->obs_dotacion_comunal,
        ]);

        InfoSector::create([
            'id_visita'               => $idVisita,
            'barrios_sectores'        => $mismoPredio->barrios_sectores,
            'actividad_predominante'  => $mismoPredio->actividad_predominante,
            'transporte'              => $mismoPredio->transporte,
            'vias_acceso'             => $mismoPredio->vias_acceso,
        ]);

        CondicionesUrbanisticas::create([
            'id_visita'                     => $idVisita,
            'id_valorizacion'               => $mismoPredio->id_valorizacion,
            'cu_alumbrado_publico'          => $mismoPredio->cu_alumbrado_publico,
            'cu_transporte'                 => $mismoPredio->cu_transporte,
            'cu_orden_publico'              => $mismoPredio->cu_orden_publico,
            'cu_seguridad'                  => $mismoPredio->cu_seguridad,
            'cu_salubridad'                 => $mismoPredio->cu_salubridad,
            'cu_vias'                       => $mismoPredio->cu_vias,
            'id_tipo_vias'                  => $mismoPredio->id_tipo_vias,
            'cu_aceras'                     => $mismoPredio->cu_aceras,
            'cu_red_gas'                    => $mismoPredio->cu_red_gas,
            'cu_red_telco'                  => $mismoPredio->cu_red_telco,
            'cu_red_acueducto'              => $mismoPredio->cu_red_acueducto,
            'cu_red_alcantarillado'         => $mismoPredio->cu_red_alcantarillado,
            'cu_barrios_sectores'           => $mismoPredio->cu_barrios_sectores,
            'cu_tipo_edificaciones'         => $mismoPredio->cu_tipo_edificaciones,
            'obs_condiciones_urbanisticas'  => $mismoPredio->obs_condiciones_urbanisticas,
        ]);

        EstadoConservacion::create([
            'id_visita'                       => $idVisita,
            'id_factor_calidad'               => $mismoPredio->id_factor_calidad,
            'id_factor_zona'                  => $mismoPredio->id_factor_zona,
            'id_factor_tiempo'                => $mismoPredio->id_factor_tiempo,
            'id_factor_pendiente'             => $mismoPredio->id_factor_pendiente,
            'valor_pendiente'                 => $mismoPredio->valor_pendiente,
            'id_factor_ubicacion'             => $mismoPredio->id_factor_ubicacion,
            'valor_ubicacion'                 => $mismoPredio->valor_ubicacion,
            'id_estado_conservacion_opciones' => $mismoPredio->id_estado_conservacion_opciones,
        ]);

        ObservacionesGenerales::create([
            'id_visita'               => $idVisita,
            'observaciones_generales' => $mismoPredio->observaciones_generales,
        ]);

        ValorEstimadoAvaluo::create([
            'id_visita'                => $idVisita,
            'valor_estimado_inmueble'  => $mismoPredio->valor_estimado_inmueble,
        ]);

        RegistroFotografico::create([
            'id_visita'        => $idVisita,
            'rf_fachada'       => $mismoPredio->rf_fachada,
            'rf_entrada'       => $mismoPredio->rf_entrada,
            'rf_sala1'         => $mismoPredio->rf_sala1,
            'rf_sala2'         => $mismoPredio->rf_sala2,
            'rf_sala3'         => $mismoPredio->rf_sala3,
            'rf_comedor1'      => $mismoPredio->rf_comedor1,
            'rf_comedor2'      => $mismoPredio->rf_comedor2,
            'rf_comedor3'      => $mismoPredio->rf_comedor3,
            'rf_cocina1'       => $mismoPredio->rf_cocina1,
            'rf_cocina2'       => $mismoPredio->rf_cocina2,
            'rf_cocina3'       => $mismoPredio->rf_cocina3,
            'rf_habitacion1'   => $mismoPredio->rf_habitacion1,
            'rf_habitacion2'   => $mismoPredio->rf_habitacion2,
            'rf_habitacion3'   => $mismoPredio->rf_habitacion3,
            'rf_habitacion4'   => $mismoPredio->rf_habitacion4,
            'rf_habitacion5'   => $mismoPredio->rf_habitacion5,
            'rf_habitacion6'   => $mismoPredio->rf_habitacion6,
            'rf_habitacion7'   => $mismoPredio->rf_habitacion7,
            'rf_bano1'         => $mismoPredio->rf_bano1,
            'rf_bano2'         => $mismoPredio->rf_bano2,
            'rf_bano3'         => $mismoPredio->rf_bano3,
            'rf_patio1'        => $mismoPredio->rf_patio1,
            'rf_patio2'        => $mismoPredio->rf_patio2,
            'rf_patio3'        => $mismoPredio->rf_patio3,
            'rf_estudio1'      => $mismoPredio->rf_estudio1,
            'rf_estudio2'      => $mismoPredio->rf_estudio2,
            'rf_estudio3'      => $mismoPredio->rf_estudio3,
            'rf_cuarto_util1'  => $mismoPredio->rf_cuarto_util1,
            'rf_cuarto_util2'  => $mismoPredio->rf_cuarto_util2,
            'rf_cuarto_util3'  => $mismoPredio->rf_cuarto_util3,
            'rf_pasillo1'      => $mismoPredio->rf_pasillo1,
            'rf_pasillo2'      => $mismoPredio->rf_pasillo2,
            'rf_pasillo3'      => $mismoPredio->rf_pasillo3,
            'rf_zona_ropa1'    => $mismoPredio->rf_zona_ropa1,
            'rf_zona_ropa2'    => $mismoPredio->rf_zona_ropa2,
            'rf_zona_ropa3'    => $mismoPredio->rf_zona_ropa3,
            'rf_balcon1'       => $mismoPredio->rf_balcon1,
            'rf_balcon2'       => $mismoPredio->rf_balcon2,
            'rf_balcon3'       => $mismoPredio->rf_balcon3,
        ]);

        InfoJuridica::create([
            'id_visita' => $idVisita,
        ]);
    }
}
