<?php

namespace App\Http\Responsable\avaluos;

use App\Models\Visita;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class AvaluoEdit implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            // Solo joins necesarios para IDs/textos usados en el SELECT.
            // Evitar joins de catálogo no seleccionados: MySQL limita a 61 tablas por query.
            $avaluo = Visita::leftJoin('clientes', 'clientes.id_cliente', '=', 'visitas.id_cliente')
                ->leftJoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                ->leftJoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                ->leftJoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                ->leftJoin('dirigido_a', 'dirigido_a.id_dirigido_a', '=', 'visitas.id_dirigido_a')
                ->leftJoin('tipo_documento as id_tdoc_cliente', 'id_tdoc_cliente.id_tipo_documento', '=', 'clientes.id_doc_cliente')
                ->leftJoin('tipo_documento as id_tdoc_empresa', 'id_tdoc_empresa.id_tipo_documento', '=', 'visitas.id_doc_empresa')
                ->leftJoin('pais as cliente_pais', 'cliente_pais.id_pais', '=', 'clientes.id_pais')
                ->leftJoin('pais as visita_pais', 'visita_pais.id_pais', '=', 'visitas.id_pais')
                ->leftJoin('departamento_estado as cliente_dpto', 'cliente_dpto.id_departamento_estado', '=', 'clientes.id_dpto_estado')
                ->leftJoin('departamento_estado as visita_dpto', 'visita_dpto.id_departamento_estado', '=', 'visitas.id_departamento')
                ->leftJoin('ciudad as cliente_ciudad', 'cliente_ciudad.id_ciudad', '=', 'clientes.id_ciudad')
                ->leftJoin('ciudad as visita_ciudad', 'visita_ciudad.id_ciudad', '=', 'visitas.id_ciudad')
                ->leftJoin('tipo_inmueble', 'tipo_inmueble.id_tipo_inmueble', '=', 'visitas.id_tipo_inmueble')
                ->leftJoin('usuarios', 'usuarios.id_usuario', '=', 'visitas.id_visitador')
                ->leftJoin('info_inmueble', 'info_inmueble.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('caracteristicas_inmueble', 'caracteristicas_inmueble.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('acabados_inmueble', 'acabados_inmueble.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('calificacion_inmueble', 'calificacion_inmueble.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('dotacion_comunal', 'dotacion_comunal.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('condiciones_urbanisticas', 'condiciones_urbanisticas.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('info_sector', 'info_sector.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('observaciones_generales', 'observaciones_generales.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('valor_estimado_avaluo', 'valor_estimado_avaluo.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('estado_conservacion', 'estado_conservacion.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('registro_fotografico', 'registro_fotografico.id_visita', '=', 'visitas.id_visita')
                ->leftJoin('info_juridica', 'info_juridica.id_visita', '=', 'visitas.id_visita')
                ->select(
                    'visitas.id_visita',
                    'clientes.id_cliente',
                    'cli_nombres',
                    'clientes.id_doc_cliente',
                    'id_tdoc_cliente.decripcion_documento as cli_tipo_doc',
                    'documento_cliente',
                    'fecha_nacimiento',
                    'cli_celular',
                    'cli_email',
                    'clientes.id_tipo_persona',
                    'tipo_persona',
                    'cliente_pais.id_pais as cli_pais',
                    'cliente_dpto.id_departamento_estado as cli_dpto',
                    'cliente_ciudad.id_ciudad as cli_ciudad',
                    'clientes.id_referido_por',
                    'referido_por',
                    'clientes.id_red_social',
                    'redes_sociales.red_social',
                    'clientes.nombre_quien_refiere',
                    'clientes.empresa_que_refiere',
                    'dirigido_a.id_dirigido_a',
                    'dirigido_a.dirigido_a',
                    'visitas.id_doc_empresa',
                    'id_tdoc_empresa.decripcion_documento as empresa_tipo_doc',
                    'visitas.documento_empresa',
                    'visitas.objeto_avaluo',
                    'visita_pais.id_pais as visita_pais',
                    'visita_pais.descripcion_pais',
                    'visita_dpto.id_departamento_estado as id_vis_dpto',
                    'visita_dpto.descripcion_departamento as vis_dpto',
                    'visita_ciudad.id_ciudad as vis_ciudad',
                    'visita_ciudad.descripcion_ciudad',
                    'visitas.id_comuna',
                    'visitas.sector',
                    'visitas.cerca_de',
                    'visitas.barrio',
                    'visitas.unidad_edificio',
                    'visitas.direccion',
                    'tipo_inmueble.id_tipo_inmueble',
                    'tipo_inmueble.tipo_inmueble',
                    'visitas.area',
                    'visitas.id_estrato as estrato',
                    'visitas.numero_inmueble',
                    'visitas.porcentaje_descuento',
                    'visitas.valor_cotizacion',
                    'visitas.latitud',
                    'visitas.longitud',
                    'visitas.obser_visita',
                    'visitas.id_visitado',
                    'visitas.fecha_visita',
                    'visitas.hora_visita',
                    'visitas.id_visitador',
                    DB::raw("CONCAT(nombres, ' ', apellidos) AS nombres_visitador"),
                    'info_inmueble.pisos_inmueble',
                    'info_inmueble.pisos_edificio',
                    'info_inmueble.id_tipo_vivienda',
                    'info_inmueble.id_uso_inmueble',
                    'info_inmueble.id_tipo_suelo',
                    'info_inmueble.id_topografia',
                    'info_inmueble.id_forma',
                    'info_inmueble.valor_administracion',
                    'info_inmueble.altura',
                    'info_inmueble.frente',
                    'info_inmueble.fondo',
                    'info_inmueble.remodelado',
                    'info_inmueble.area_libre',
                    'info_inmueble.anios_remodelacion',
                    'info_inmueble.area_patios',
                    'info_inmueble.id_condicion_inmueble',
                    'info_inmueble.obs_info_inmueble',
                    'caracteristicas_inmueble.cocinas',
                    'caracteristicas_inmueble.habitaciones',
                    'caracteristicas_inmueble.salas',
                    'caracteristicas_inmueble.habitaciones_servicio',
                    'caracteristicas_inmueble.comedores',
                    'caracteristicas_inmueble.banios_servicio',
                    'caracteristicas_inmueble.banios_social',
                    'caracteristicas_inmueble.banios_privado',
                    'caracteristicas_inmueble.balcones',
                    'caracteristicas_inmueble.zona_ropa',
                    'caracteristicas_inmueble.estudios',
                    'caracteristicas_inmueble.patios',
                    'caracteristicas_inmueble.vestier',
                    'caracteristicas_inmueble.escala_emergencia',
                    'caracteristicas_inmueble.closets',
                    'caracteristicas_inmueble.shut_basura',
                    'caracteristicas_inmueble.cant_parqueaderos',
                    'caracteristicas_inmueble.cant_cuarto_util',
                    'caracteristicas_inmueble.cant_kioskos',
                    'caracteristicas_inmueble.cant_piscinas',
                    'caracteristicas_inmueble.cant_establos',
                    'caracteristicas_inmueble.cant_billares',
                    'caracteristicas_inmueble.cant_ascensores',
                    'caracteristicas_inmueble.obs_caract_inmueble',
                    'acabados_inmueble.id_sistema_constructivo',
                    'acabados_inmueble.porton_principal',
                    'acabados_inmueble.id_tipo_fachada',
                    'acabados_inmueble.puertas',
                    'acabados_inmueble.id_tipo_muro',
                    'acabados_inmueble.id_ventaneria',
                    'acabados_inmueble.id_tipo_techo',
                    'acabados_inmueble.servicios_publicos',
                    'acabados_inmueble.pisos',
                    'acabados_inmueble.telefono',
                    'acabados_inmueble.banios',
                    'acabados_inmueble.energia',
                    'acabados_inmueble.cocina',
                    'acabados_inmueble.agua',
                    'acabados_inmueble.meson',
                    'acabados_inmueble.gas',
                    'acabados_inmueble.patios',
                    'acabados_inmueble.obs_acabados_inmueble',
                    'calificacion_inmueble.cal_estructura',
                    'calificacion_inmueble.cal_porton_ppal',
                    'calificacion_inmueble.cal_fachada',
                    'calificacion_inmueble.cal_puertas',
                    'calificacion_inmueble.cal_muros',
                    'calificacion_inmueble.cal_ventaneria',
                    'calificacion_inmueble.cal_techos',
                    'calificacion_inmueble.cal_carpinteria',
                    'calificacion_inmueble.cal_pisos',
                    'calificacion_inmueble.cal_ventilacion',
                    'calificacion_inmueble.cal_cocina',
                    'calificacion_inmueble.cal_iluminacion',
                    'calificacion_inmueble.cal_banios',
                    'calificacion_inmueble.cal_distribucion',
                    'calificacion_inmueble.cal_zona_ropas',
                    'calificacion_inmueble.cal_humedades',
                    'calificacion_inmueble.cal_patios',
                    'calificacion_inmueble.obs_calificacion_inmueble',
                    'dotacion_comunal.porteria_24',
                    'dotacion_comunal.parqueo_comun',
                    'dotacion_comunal.juegos_infantiles',
                    'dotacion_comunal.zona_mascotas',
                    'dotacion_comunal.piscinas',
                    'dotacion_comunal.zonas_verdes',
                    'dotacion_comunal.sauna',
                    'dotacion_comunal.salon_social',
                    'dotacion_comunal.turco',
                    'dotacion_comunal.canchas',
                    'dotacion_comunal.gimnasio',
                    'dotacion_comunal.playground',
                    'dotacion_comunal.barbecue',
                    'dotacion_comunal.supermercado',
                    'dotacion_comunal.sala_cine',
                    'dotacion_comunal.cafeteria',
                    'dotacion_comunal.restaurante',
                    'dotacion_comunal.squash',
                    'dotacion_comunal.obs_dotacion_comunal',
                    'condiciones_urbanisticas.id_valorizacion',
                    'condiciones_urbanisticas.cu_alumbrado_publico',
                    'condiciones_urbanisticas.cu_transporte',
                    'condiciones_urbanisticas.cu_orden_publico',
                    'condiciones_urbanisticas.cu_seguridad',
                    'condiciones_urbanisticas.cu_salubridad',
                    'condiciones_urbanisticas.cu_vias',
                    'condiciones_urbanisticas.id_tipo_vias',
                    'condiciones_urbanisticas.cu_aceras',
                    'condiciones_urbanisticas.cu_red_gas',
                    'condiciones_urbanisticas.cu_red_telco',
                    'condiciones_urbanisticas.cu_red_acueducto',
                    'condiciones_urbanisticas.cu_red_alcantarillado',
                    'condiciones_urbanisticas.cu_barrios_sectores',
                    'condiciones_urbanisticas.cu_tipo_edificaciones',
                    'condiciones_urbanisticas.obs_condiciones_urbanisticas',
                    'info_sector.barrios_sectores',
                    'info_sector.actividad_predominante',
                    'info_sector.transporte',
                    'info_sector.vias_acceso',
                    'observaciones_generales.observaciones_generales',
                    'valor_estimado_avaluo.valor_estimado_inmueble',
                    'estado_conservacion.id_factor_calidad',
                    'estado_conservacion.id_factor_zona',
                    'estado_conservacion.id_factor_tiempo',
                    'estado_conservacion.id_factor_pendiente',
                    'estado_conservacion.valor_pendiente',
                    'estado_conservacion.id_factor_ubicacion',
                    'estado_conservacion.valor_ubicacion',
                    'estado_conservacion.id_estado_conservacion_opciones',
                    'registro_fotografico.rf_fachada',
                    'registro_fotografico.rf_entrada',
                    'registro_fotografico.rf_sala1',
                    'registro_fotografico.rf_sala2',
                    'registro_fotografico.rf_sala3',
                    'registro_fotografico.rf_comedor1',
                    'registro_fotografico.rf_comedor2',
                    'registro_fotografico.rf_comedor3',
                    'registro_fotografico.rf_cocina1',
                    'registro_fotografico.rf_cocina2',
                    'registro_fotografico.rf_cocina3',
                    'registro_fotografico.rf_habitacion1',
                    'registro_fotografico.rf_habitacion2',
                    'registro_fotografico.rf_habitacion3',
                    'registro_fotografico.rf_habitacion4',
                    'registro_fotografico.rf_habitacion5',
                    'registro_fotografico.rf_habitacion6',
                    'registro_fotografico.rf_habitacion7',
                    'registro_fotografico.rf_bano1',
                    'registro_fotografico.rf_bano2',
                    'registro_fotografico.rf_bano3',
                    'registro_fotografico.rf_patio1',
                    'registro_fotografico.rf_patio2',
                    'registro_fotografico.rf_patio3',
                    'registro_fotografico.rf_estudio1',
                    'registro_fotografico.rf_estudio2',
                    'registro_fotografico.rf_estudio3',
                    'registro_fotografico.rf_cuarto_util1',
                    'registro_fotografico.rf_cuarto_util2',
                    'registro_fotografico.rf_cuarto_util3',
                    'registro_fotografico.rf_pasillo1',
                    'registro_fotografico.rf_pasillo2',
                    'registro_fotografico.rf_pasillo3',
                    'registro_fotografico.rf_zona_ropa1',
                    'registro_fotografico.rf_zona_ropa2',
                    'registro_fotografico.rf_zona_ropa3',
                    'registro_fotografico.rf_balcon1',
                    'registro_fotografico.rf_balcon2',
                    'registro_fotografico.rf_balcon3',
                    'info_juridica.propietario1',
                    'info_juridica.doc_propietario1',
                    'info_juridica.propietario2',
                    'info_juridica.doc_propietario2',
                    'info_juridica.matricula_inmueble',
                    'info_juridica.coeficiente_copropiedad',
                    'info_juridica.certificado_libertad',
                    'info_juridica.escritura_publica',
                    'info_juridica.notaria',
                    'info_juridica.imp_predial_anual',
                    'info_juridica.administracion',
                    'info_juridica.avaluo_catastral',
                    'info_juridica.normas_usos',
                    'info_juridica.mejor_mayor_uso'
                )
                ->where('visitas.id_visita', $this->idVisita)
                ->whereNull('visitas.deleted_at')
                ->whereNull('clientes.deleted_at')
                ->first();

            if (! $avaluo) {
                return response()->json([
                    'success' => false,
                    'message' => 'No existe el avaluo',
                ], 404);
            }

            return response()->json([
                'avaluo'  => $avaluo,
                'message' => 'Avaluo obtenido correctamente',
                'success' => true,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error consultando el avaluo',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
