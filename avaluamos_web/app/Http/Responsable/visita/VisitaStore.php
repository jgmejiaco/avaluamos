<?php

namespace App\Http\Responsable\visita;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use App\Models\Visita;
use App\Models\InfoInmueble;
use App\Models\CaracteristicasInmueble;
use App\Models\AcabadosInmueble;
use App\Models\CalificacionInmueble;
use App\Models\DotacionComunal;
use App\Models\InfoSector;
use App\Models\CondicionesUrbanisticas;
use App\Models\ObservacionesGenerales;
use App\Models\EstadoConservacion;
use App\Models\RegistroFotografico;
use App\Models\ValorEstimadoAvaluo;
use App\Models\InfoJuridica;

class VisitaStore implements Responsable
{
    public function toResponse($request)
    {
        $idCliente = request('id_cliente', null);
        $dirigidoA = request('dirigido_a', null);
        $tipoDocEmpresa = request('tipo_doc_empresa', null);
        $docDirigidoA = request('doc_dirigido_a', null);
        $objetoAvaluoCheck = request('objeto_avaluo', []);
        $objetoAvaluoCheck = implode(', ', $objetoAvaluoCheck);
        $objetoAvaluo = $objetoAvaluoCheck;
        $pais = request('pais', null);
        $departamento = request('departamento', null);
        $ciudad = request('ciudad', null);
        $comuna = request('comuna', null);
        $sector = strtoupper(request('sector', null));
        $cercaDe = strtoupper(request('cerca_de', null));
        $barrio = strtoupper(request('barrio', null));
        $unidadEdificio = strtoupper(request('unidad_edificio', null));
        $direccion = strtoupper(request('direccion', null));
        $tipoInmueble = request('tipo_inmueble', null);
        $area = doubleval(request('area', null));
        $estrato = request('estrato', null);
        $numeroInmueble = strtoupper(request('numero_inmueble', null));
        $porcentajeDescuento = request('porcentaje_descuento', null);
        $valorCotizacion = request('valor_cotizacion', null);
        $latitud = request('latitud', null);
        $longitud = request('longitud', null);
        $obserVisitaTecnica = request('obser_visita_tecnica', null);
        $visitado = request('visitado', null);
        $fechaVisita = request('fecha_visita', null);
        $horaVisita = request('hora_visita', null);
        $visitador = request('visitador', null);
        $usuLogueado = session('id_usuario');

        // ==============================================================================

        if ($dirigidoA != "-1" || $dirigidoA != -1) {
            $dirigidoA = request('dirigido_a', null);
        } else {
            $dirigidoA = 0;
        }

        // ==============================
        
        if ($tipoDocEmpresa != "-1" || $tipoDocEmpresa != -1) {
            $tipoDocEmpresa = request('tipo_doc_empresa', null);
        } else {
            $tipoDocEmpresa = null;
        }

        // ==============================

        if ($pais != "-1" || $pais != -1) {
            $pais = request('pais', null);
        } else {
            $pais = null;
        }

        // ==============================
        
        if ($departamento != "-1" || $departamento != -1) {
            $departamento = request('departamento', null);
        } else {
            $departamento = null;
        }

        // ==============================
        
        if ($ciudad != "-1" || $ciudad != -1) {
            $ciudad = request('ciudad', null);
        } else {
            $ciudad = null;
        }

        // ==============================
        
        if ($comuna != "-1" || $comuna != -1) {
            $comuna = request('comuna', null);
        } else {
            $comuna = null;
        }

        // ==============================
        
        if ($tipoInmueble != "-1" || $tipoInmueble != -1) {
            $tipoInmueble = request('tipo_inmueble', null);
        } else {
            $tipoInmueble = null;
        }

        // ==============================
        
        if ($area != "0.0" || $area != 0.0) {
            $area = request('area', null);
        } else {
            $area = null;
        }

        // ==============================

        if ($visitado != "-1" || $visitado != -1) {
            $visitado = request('visitado', null);
        } else {
            $visitado = 2;
        }
        
        // ==============================
        
        if ($visitador != "-1" || $visitador != -1) {
            $visitador = request('visitador', null);
        } else {
            $visitador = null;
        }
        
        // ==============================
        
        if (isset($fechaVisita) && !is_null($fechaVisita) && !empty($fechaVisita)) {
            $fechaVisita = Date::parse($fechaVisita)->timestamp;
        } else {
            $fechaVisita = null;
        }
        
        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        $mismoPredio = $this->visitaDireccion($idCliente, $direccion);
        // dd($mismoPredio);

        if (isset($mismoPredio) && !is_null($mismoPredio) && !empty($mismoPredio)) {
            try {
                $nuevaVisita = Visita::create([
                    'id_cliente' => $idCliente,
                    'id_dirigido_a' => $dirigidoA,
                    'id_doc_empresa' => $tipoDocEmpresa,
                    'documento_empresa' => $docDirigidoA,
                    'objeto_avaluo' => $objetoAvaluo,
                    'id_pais' => $pais,
                    'id_departamento' => $departamento,
                    'id_ciudad' => $ciudad,
                    'id_comuna' => $comuna,
                    'sector' => $sector,
                    'cerca_de' => $cercaDe,
                    'barrio' => $barrio,
                    'unidad_edificio' => $unidadEdificio,
                    'direccion' => $direccion,
                    'id_tipo_inmueble' => $tipoInmueble,
                    'area' => $area,
                    'id_estrato' => $estrato,
                    'numero_inmueble' => $numeroInmueble,
                    'latitud' => $latitud,
                    'longitud' => $longitud,
                    'porcentaje_descuento' => $porcentajeDescuento,
                    'valor_cotizacion' => $valorCotizacion,
                    'obser_visita' => $obserVisitaTecnica,
                    'id_visitado' => $visitado,
                    'fecha_visita' => $fechaVisita,
                    'hora_visita' => $horaVisita,
                    'id_visitador' => $visitador,
                    'usu_logueado' => $usuLogueado,
                ]);
    
                if($nuevaVisita) {
                    DB::connection('mysql')->commit();
    
                    $idVisita = Visita::select('id_visita')->orderBy('id_visita', 'DESC')->first();
    
                    InfoInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                        'id_tipo_inmueble' => $mismoPredio->id_tipo_vivienda,
                        'id_uso_inmueble' => $mismoPredio->id_uso_inmueble,
                        'id_tipo_suelo' => $mismoPredio->id_tipo_suelo,
                        'id_topografia' => $mismoPredio->id_topografia,
                        'id_forma' => $mismoPredio->id_forma,
                        'pisos_inmueble' => $mismoPredio->pisos_inmueble,
                        'pisos_edificio' => $mismoPredio->pisos_edificio,
                        'valor_administracion' => $mismoPredio->valor_administracion,
                        'remodelado' => $mismoPredio->remodelado,
                        'altura' => $mismoPredio->altura,
                        'frente' => $mismoPredio->frente,
                        'fondo' => $mismoPredio->fondo,
                        'area_libre' => $mismoPredio->area_libre,
                        'anios_remodelacion' => $mismoPredio->anios_remodelacion,
                        'area_patios' => $mismoPredio->area_patios,
                        'id_condicion_inmueble' => $mismoPredio->id_condicion_inmueble,
                        'obs_info_inmueble' => $mismoPredio->obs_info_inmueble
                    ]);

                    // ====================================
    
                    CaracteristicasInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                        'cocinas' => $mismoPredio->cocinas,
                        'habitaciones' => $mismoPredio->habitaciones,
                        'salas' => $mismoPredio->salas,
                        'habitaciones_servicio' => $mismoPredio->habitaciones_servicio,
                        'comedores' => $mismoPredio->comedores,
                        'banios_servicio' => $mismoPredio->banios_servicio,
                        'banios_social' => $mismoPredio->banios_social,
                        'banios_privado' => $mismoPredio->banios_privado,
                        'balcones' => $mismoPredio->balcones,
                        'zona_ropa' => $mismoPredio->zona_ropa,
                        'estudios' => $mismoPredio->estudios,
                        'patios' => $mismoPredio->patios,
                        'vestier' => $mismoPredio->vestier,
                        'escala_emergencia' => $mismoPredio->escala_emergencia,
                        'closets' => $mismoPredio->closets,
                        'shut_basura' => $mismoPredio->shut_basura,
                        'cant_parqueaderos' => $mismoPredio->cant_parqueaderos,
                        'cant_cuarto_util' => $mismoPredio->cant_cuarto_util,
                        'cant_kioskos' => $mismoPredio->cant_kioskos,
                        'cant_piscinas' => $mismoPredio->cant_piscinas,
                        'cant_establos' => $mismoPredio->cant_establos,
                        'cant_billares' => $mismoPredio->cant_billares,
                        'cant_ascensores' => $mismoPredio->cant_ascensores,
                        'obs_caract_inmueble' => $mismoPredio->obs_caract_inmueble
                    ]);

                    // ====================================
    
                    AcabadosInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                        'id_sistema_constructivo' => $mismoPredio->id_sistema_constructivo,
                        'porton_principal' => $mismoPredio->porton_principal,
                        'id_tipo_fachada' => $mismoPredio->id_tipo_fachada,
                        'puertas' => $mismoPredio->puertas,
                        'id_tipo_muro' => $mismoPredio->id_tipo_muro,
                        'id_ventaneria' => $mismoPredio->id_ventaneria,
                        'id_tipo_techo' => $mismoPredio->id_tipo_techo,
                        'servicios_publicos' => $mismoPredio->servicios_publicos,
                        'pisos' => $mismoPredio->pisos,
                        'telefono' => $mismoPredio->telefono,
                        'banios' => $mismoPredio->banios,
                        'energia' => $mismoPredio->energia,
                        'cocina' => $mismoPredio->cocina,
                        'agua' => $mismoPredio->agua,
                        'meson' => $mismoPredio->meson,
                        'gas' => $mismoPredio->gas,
                        'patios' => $mismoPredio->patios,
                        'obs_acabados_inmueble' => $mismoPredio->obs_acabados_inmueble
                    ]);

                    // ====================================
    
                    CalificacionInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                        'cal_estructura' => $mismoPredio->cal_estructura,
                        'cal_porton_ppal' => $mismoPredio->cal_porton_ppal,
                        'cal_fachada' => $mismoPredio->cal_fachada,
                        'cal_puertas' => $mismoPredio->cal_puertas,
                        'cal_muros' => $mismoPredio->cal_muros,
                        'cal_ventaneria' => $mismoPredio->cal_ventaneria,
                        'cal_techos' => $mismoPredio->cal_techos,
                        'cal_carpinteria' => $mismoPredio->cal_carpinteria,
                        'cal_pisos' => $mismoPredio->cal_pisos,
                        'cal_ventilacion' => $mismoPredio->cal_ventilacion,
                        'cal_cocina' => $mismoPredio->cal_cocina,
                        'cal_iluminacion' => $mismoPredio->cal_iluminacion,
                        'cal_banios' => $mismoPredio->cal_banios,
                        'cal_distribucion' => $mismoPredio->cal_distribucion,
                        'cal_zona_ropas' => $mismoPredio->cal_zona_ropas,
                        'cal_humedades' => $mismoPredio->cal_humedades,
                        'cal_patios' => $mismoPredio->cal_patios,
                        'obs_calificacion_inmueble' => $mismoPredio->obs_calificacion_inmueble
                    ]);

                    // ====================================
    
                    DotacionComunal::create([
                        'id_visita' => $idVisita->id_visita,
                        'porteria_24' => $mismoPredio->porteria_24,
                        'parqueo_comun' => $mismoPredio->parqueo_comun,
                        'juegos_infantiles' => $mismoPredio->juegos_infantiles,
                        'zona_mascotas' => $mismoPredio->zona_mascotas,
                        'piscinas' => $mismoPredio->piscinas,
                        'zonas_verdes' => $mismoPredio->zonas_verdes,
                        'sauna' => $mismoPredio->sauna,
                        'salon_social' => $mismoPredio->salon_social,
                        'turco' => $mismoPredio->turco,
                        'canchas' => $mismoPredio->canchas,
                        'gimnasio' => $mismoPredio->gimnasio,
                        'playground' => $mismoPredio->playground,
                        'barbecue' => $mismoPredio->barbecue,
                        'supermercado' => $mismoPredio->supermercado,
                        'sala_cine' => $mismoPredio->sala_cine,
                        'cafeteria' => $mismoPredio->cafeteria,
                        'restaurante' => $mismoPredio->restaurante,
                        'squash' => $mismoPredio->squash,
                        'obs_dotacion_comunal' => $mismoPredio->obs_dotacion_comunal
                    ]);

                    // ====================================
    
                    InfoSector::create([
                        'id_visita' => $idVisita->id_visita,
                        'barrios_sectores' => $mismoPredio->barrios_sectores,
                        'actividad_predominante' => $mismoPredio->actividad_predominante,
                        'transporte' => $mismoPredio->transporte,
                        'vias_acceso' => $mismoPredio->vias_acceso
                    ]);

                    // ====================================
    
                    CondicionesUrbanisticas::create([
                        'id_visita' => $idVisita->id_visita,
                        'id_valorizacion' => $mismoPredio->id_valorizacion,
                        'cu_alumbrado_publico' => $mismoPredio->cu_alumbrado_publico,
                        'cu_transporte' => $mismoPredio->cu_transporte,
                        'cu_orden_publico' => $mismoPredio->cu_orden_publico,
                        'cu_seguridad' => $mismoPredio->cu_seguridad,
                        'cu_salubridad' => $mismoPredio->cu_salubridad,
                        'cu_vias' => $mismoPredio->cu_vias,
                        'id_tipo_vias' => $mismoPredio->id_tipo_vias,
                        'cu_aceras' => $mismoPredio->cu_aceras,
                        'cu_red_gas' => $mismoPredio->cu_red_gas,
                        'cu_red_telco' => $mismoPredio->cu_red_telco,
                        'cu_red_acueducto' => $mismoPredio->cu_red_acueducto,
                        'cu_red_alcantarillado' => $mismoPredio->cu_red_alcantarillado,
                        'cu_barrios_sectores' => $mismoPredio->cu_barrios_sectores,
                        'cu_tipo_edificaciones' => $mismoPredio->cu_tipo_edificaciones,
                        'obs_condiciones_urbanisticas' => $mismoPredio->obs_condiciones_urbanisticas
                    ]);

                    // ====================================

                    EstadoConservacion::create([
                        'id_visita' => $idVisita->id_visita,
                        'id_factor_calidad' => $mismoPredio->id_factor_calidad,
                        'id_factor_zona' => $mismoPredio->id_factor_zona,
                        'id_factor_tiempo' => $mismoPredio->id_factor_tiempo,
                        'id_factor_pendiente' => $mismoPredio->id_factor_pendiente,
                        'valor_pendiente' => $mismoPredio->valor_pendiente,
                        'id_factor_ubicacion' => $mismoPredio->id_factor_ubicacion,
                        'valor_ubicacion' => $mismoPredio->valor_ubicacion,
                        'id_estado_conservacion_opciones' => $mismoPredio->id_estado_conservacion_opciones
                    ]);

                    // ====================================
    
                    ObservacionesGenerales::create([
                        'id_visita' => $idVisita->id_visita,
                        'observaciones_generales' => $mismoPredio->observaciones_generales
                    ]);

                    // ====================================

                    ValorEstimadoAvaluo::create([
                        'id_visita' => $idVisita->id_visita,
                        'valor_estimado_inmueble' => $mismoPredio->valor_estimado_inmueble
                    ]);

                    // ====================================
    
                    RegistroFotografico::create([
                        'id_visita' => $idVisita->id_visita,
                        'rf_fachada' => $mismoPredio->rf_fachada,
                        'rf_entrada' => $mismoPredio->rf_entrada,
                        'rf_sala1' => $mismoPredio->rf_sala1,
                        'rf_sala2' => $mismoPredio->rf_sala2,
                        'rf_sala3' => $mismoPredio->rf_sala3,
                        'rf_comedor1' => $mismoPredio->rf_comedor1,
                        'rf_comedor2' => $mismoPredio->rf_comedor2,
                        'rf_comedor3' => $mismoPredio->rf_comedor3,
                        'rf_cocina1' => $mismoPredio->rf_cocina1,
                        'rf_cocina2' => $mismoPredio->rf_cocina2,
                        'rf_cocina3' => $mismoPredio->rf_cocina3,
                        'rf_habitacion1' => $mismoPredio->rf_habitacion1,
                        'rf_habitacion2' => $mismoPredio->rf_habitacion2,
                        'rf_habitacion3' => $mismoPredio->rf_habitacion3,
                        'rf_habitacion4' => $mismoPredio->rf_habitacion4,
                        'rf_habitacion5' => $mismoPredio->rf_habitacion5,
                        'rf_habitacion6' => $mismoPredio->rf_habitacion6,
                        'rf_habitacion7' => $mismoPredio->rf_habitacion7,
                        'rf_bano1' => $mismoPredio->rf_bano1,
                        'rf_bano2' => $mismoPredio->rf_bano2,
                        'rf_bano3' => $mismoPredio->rf_bano3,
                        'rf_patio1' => $mismoPredio->rf_patio1,
                        'rf_patio2' => $mismoPredio->rf_patio2,
                        'rf_patio3' => $mismoPredio->rf_patio3,
                        'rf_estudio1' => $mismoPredio->rf_estudio1,
                        'rf_estudio2' => $mismoPredio->rf_estudio2,
                        'rf_estudio3' => $mismoPredio->rf_estudio3,
                        'rf_cuarto_util1' => $mismoPredio->rf_cuarto_util1,
                        'rf_cuarto_util2' => $mismoPredio->rf_cuarto_util2,
                        'rf_cuarto_util3' => $mismoPredio->rf_cuarto_util3,
                        'rf_pasillo1' => $mismoPredio->rf_pasillo1,
                        'rf_pasillo2' => $mismoPredio->rf_pasillo2,
                        'rf_pasillo3' => $mismoPredio->rf_pasillo3,
                        'rf_zona_ropa1' => $mismoPredio->rf_zona_ropa1,
                        'rf_zona_ropa2' => $mismoPredio->rf_zona_ropa2,
                        'rf_zona_ropa3' => $mismoPredio->rf_zona_ropa3,
                        'rf_balcon1' => $mismoPredio->rf_balcon1,
                        'rf_balcon2' => $mismoPredio->rf_balcon2,
                        'rf_balcon3' => $mismoPredio->rf_balcon3
                    ]);

                    // ====================================
    
                    InfoJuridica::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
                    return redirect()->to(route('visita.index'));
    
                } else {
                    DB::connection('mysql')->rollback();
                    alert()->error('Error', 'Ha ocurrido un error al crear la visita, por favor contacte a Soporte.');
                    return redirect()->to(route('visita.index'));
                }
            } catch (Exception $e) {
                dd($e);
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
                return back();
            }
        } else {
            try {
                $nuevaVisita = Visita::create([
                    'id_cliente' => $idCliente,
                    'id_dirigido_a' => $dirigidoA,
                    'id_doc_empresa' => $tipoDocEmpresa,
                    'documento_empresa' => $docDirigidoA,
                    'objeto_avaluo' => $objetoAvaluo,
                    'id_pais' => $pais,
                    'id_departamento' => $departamento,
                    'id_ciudad' => $ciudad,
                    'id_comuna' => $comuna,
                    'sector' => $sector,
                    'cerca_de' => $cercaDe,
                    'barrio' => $barrio,
                    'unidad_edificio' => $unidadEdificio,
                    'direccion' => $direccion,
                    'id_tipo_inmueble' => $tipoInmueble,
                    'area' => $area,
                    'id_estrato' => $estrato,
                    'numero_inmueble' => $numeroInmueble,
                    'latitud' => $latitud,
                    'longitud' => $longitud,
                    'porcentaje_descuento' => $porcentajeDescuento,
                    'valor_cotizacion' => $valorCotizacion,
                    'obser_visita' => $obserVisitaTecnica,
                    'id_visitado' => $visitado,
                    'fecha_visita' => $fechaVisita,
                    'hora_visita' => $horaVisita,
                    'id_visitador' => $visitador,
                    'usu_logueado' => $usuLogueado,
                ]);

                // ====================================
    
                if($nuevaVisita) {
                    DB::connection('mysql')->commit();
    
                    $idVisita = Visita::select('id_visita')->orderBy('id_visita', 'DESC')->first();
    
                    InfoInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    CaracteristicasInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    AcabadosInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    CalificacionInmueble::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    DotacionComunal::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    InfoSector::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    CondicionesUrbanisticas::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    ObservacionesGenerales::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    EstadoConservacion::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    RegistroFotografico::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    ValorEstimadoAvaluo::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    InfoJuridica::create([
                        'id_visita' => $idVisita->id_visita,
                    ]);

                    // ====================================
    
                    alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
                    return redirect()->to(route('visita.index'));
    
                } else {
                    DB::connection('mysql')->rollback();
                    alert()->error('Error', 'Ha ocurrido un error al crear la visita, por favor contacte a Soporte.');
                    return redirect()->to(route('visita.index'));
                }
            } catch (Exception $e) {
                dd($e);
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
                return back();
            }
        }
    }

    // =========================================================================
    // =========================================================================
    // =========================================================================

    function visitaDireccion($idCliente, $direccionCreate)
    {
        $consultaPredio = DB::table('visitas')
                    ->leftjoin('clientes','clientes.id_cliente','=','visitas.id_cliente')
                    // ->leftjoin('tipo_persona', 'tipo_persona.id_tipo_persona', '=', 'clientes.id_tipo_persona')
                    // ->leftjoin('referido_por', 'referido_por.id_referido_por', '=', 'clientes.id_referido_por')
                    // ->leftjoin('redes_sociales', 'redes_sociales.id_red_social', '=', 'clientes.id_red_social')
                    ->leftjoin('dirigido_a','dirigido_a.id_dirigido_a','=','visitas.id_dirigido_a')
                    // ->leftjoin('tipo_documento as id_tdoc_cliente','id_tdoc_cliente.id_tipo_documento','=','clientes.id_doc_cliente')
                    ->leftjoin('tipo_documento as id_tdoc_empresa','id_tdoc_empresa.id_tipo_documento','=','visitas.id_doc_empresa')
                    // ->leftjoin('pais as cliente_pais','cliente_pais.id_pais','=','clientes.id_pais')
                    ->leftjoin('pais as visita_pais','visita_pais.id_pais','=','visitas.id_pais')
                    // ->leftjoin('departamento_estado as cliente_dpto','cliente_dpto.id_departamento_estado','=','clientes.id_dpto_estado')
                    ->leftjoin('departamento_estado as visita_dpto','visita_dpto.id_departamento_estado','=','visitas.id_departamento')
                    // ->leftjoin('ciudad as cliente_ciudad','cliente_ciudad.id_ciudad','=','clientes.id_ciudad')
                    ->leftjoin('ciudad as visita_ciudad','visita_ciudad.id_ciudad','=','visitas.id_ciudad')
                    ->leftjoin('comunas','comunas.id_comuna','=','visitas.id_comuna')
                    ->leftjoin('tipo_inmueble','tipo_inmueble.id_tipo_inmueble','=','visitas.id_tipo_inmueble')
                    ->leftjoin('indicador_numerico as estrato','estrato.id_indicador_numerico','=','visitas.id_estrato')
                    // ->leftjoin('si_no','si_no.id_si_no','=','visitas.id_visitado')
                    // ->leftjoin('usuarios','usuarios.id_usuario','=','visitas.id_visitador')
                    ->leftjoin('info_inmueble','info_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('tipo_vivienda','tipo_vivienda.id_tipo_vivienda','=','info_inmueble.id_tipo_vivienda')
                    ->leftjoin('uso_inmueble','uso_inmueble.id_uso_inmueble','=','info_inmueble.id_uso_inmueble')
                    ->leftjoin('tipo_suelo','tipo_suelo.id_tipo_suelo','=','info_inmueble.id_tipo_suelo')
                    ->leftjoin('topografia','topografia.id_topografia','=','info_inmueble.id_topografia')
                    ->leftjoin('forma','forma.id_forma','=','info_inmueble.id_forma')
                    ->leftjoin('indicador_numerico as pisos_inmueble','pisos_inmueble.id_indicador_numerico','=','info_inmueble.pisos_inmueble')
                    ->leftjoin('indicador_numerico as pisos_edificio','pisos_edificio.id_indicador_numerico','=','info_inmueble.pisos_edificio')
                    ->leftjoin('si_no as remodelado','remodelado.id_si_no','=','info_inmueble.remodelado')
                    ->leftjoin('condicion_inmueble','condicion_inmueble.id_condicion_inmueble','=','info_inmueble.id_condicion_inmueble')
                    ->leftjoin('caracteristicas_inmueble','caracteristicas_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('indicador_numerico as cocinas','cocinas.id_indicador_numerico','=','caracteristicas_inmueble.cocinas')
                    ->leftjoin('indicador_numerico as habitaciones','habitaciones.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones')
                    ->leftjoin('indicador_numerico as salas','salas.id_indicador_numerico','=','caracteristicas_inmueble.salas')
                    ->leftjoin('indicador_numerico as habitaciones_servicio','habitaciones_servicio.id_indicador_numerico','=','caracteristicas_inmueble.habitaciones_servicio')
                    ->leftjoin('indicador_numerico as comedores','comedores.id_indicador_numerico','=','caracteristicas_inmueble.comedores')
                    ->leftjoin('indicador_numerico as banios_servicio','banios_servicio.id_indicador_numerico','=','caracteristicas_inmueble.banios_servicio')
                    ->leftjoin('indicador_numerico as banios_social','banios_social.id_indicador_numerico','=','caracteristicas_inmueble.banios_social')
                    ->leftjoin('indicador_numerico as banios_privado','banios_privado.id_indicador_numerico','=','caracteristicas_inmueble.banios_privado')
                    ->leftjoin('indicador_numerico as balcones','balcones.id_indicador_numerico','=','caracteristicas_inmueble.balcones')
                    ->leftjoin('indicador_numerico as zona_ropa','zona_ropa.id_indicador_numerico','=','caracteristicas_inmueble.zona_ropa')
                    ->leftjoin('indicador_numerico as estudios','estudios.id_indicador_numerico','=','caracteristicas_inmueble.estudios')
                    ->leftjoin('indicador_numerico as patios','patios.id_indicador_numerico','=','caracteristicas_inmueble.patios')
                    ->leftjoin('indicador_numerico as vestier','vestier.id_indicador_numerico','=','caracteristicas_inmueble.vestier')
                    ->leftjoin('indicador_numerico as escala_emergencia','escala_emergencia.id_indicador_numerico','=','caracteristicas_inmueble.escala_emergencia')
                    ->leftjoin('indicador_numerico as closets','closets.id_indicador_numerico','=','caracteristicas_inmueble.closets')
                    ->leftjoin('indicador_numerico as shut_basura','shut_basura.id_indicador_numerico','=','caracteristicas_inmueble.shut_basura')
                    ->leftjoin('indicador_numerico as parqueaderos','parqueaderos.id_indicador_numerico','=','caracteristicas_inmueble.cant_parqueaderos')
                    ->leftjoin('indicador_numerico as cuarto_util','cuarto_util.id_indicador_numerico','=','caracteristicas_inmueble.cant_cuarto_util')
                    ->leftjoin('indicador_numerico as kioskos','kioskos.id_indicador_numerico','=','caracteristicas_inmueble.cant_kioskos')
                    ->leftjoin('indicador_numerico as piscinas','piscinas.id_indicador_numerico','=','caracteristicas_inmueble.cant_piscinas')
                    ->leftjoin('indicador_numerico as establos','establos.id_indicador_numerico','=','caracteristicas_inmueble.cant_establos')
                    ->leftjoin('indicador_numerico as billares','billares.id_indicador_numerico','=','caracteristicas_inmueble.cant_billares')
                    ->leftjoin('indicador_numerico as ascensores','ascensores.id_indicador_numerico','=','caracteristicas_inmueble.cant_ascensores')
                    ->leftjoin('acabados_inmueble','acabados_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('calificacion_inmueble','calificacion_inmueble.id_visita','=','visitas.id_visita')
                    ->leftjoin('dotacion_comunal','dotacion_comunal.id_visita','=','visitas.id_visita')
                    ->leftjoin('info_sector','info_sector.id_visita','=','visitas.id_visita')
                    ->leftjoin('condiciones_urbanisticas','condiciones_urbanisticas.id_visita','=','visitas.id_visita')
                    ->leftjoin('estado_conservacion','estado_conservacion.id_visita','=','visitas.id_visita')
                    ->leftjoin('observaciones_generales','observaciones_generales.id_visita','=','visitas.id_visita')
                    ->leftjoin('valor_estimado_avaluo','valor_estimado_avaluo.id_visita','=','visitas.id_visita')
                    ->leftjoin('registro_fotografico','registro_fotografico.id_visita','=','visitas.id_visita')
                    ->select(
                        'visitas.id_visita',
                        'visitas.id_cliente',
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
                        'visita_ciudad.id_ciudad as id_vis_ciudad',
                        'visita_ciudad.descripcion_ciudad as vis_ciudad',
                        'visitas.id_comuna',
                        'comunas.comuna',
                        'visitas.sector',
                        'visitas.cerca_de',
                        'visitas.barrio',
                        'visitas.unidad_edificio',
                        'tipo_inmueble.id_tipo_inmueble',
                        'tipo_inmueble.tipo_inmueble',
                        'visitas.area',
                        'estrato.id_indicador_numerico as id_estrato',
                        'estrato.indicador_numerico as estrato',
                        'visitas.numero_inmueble',
                        'visitas.porcentaje_descuento',
                        'visitas.latitud',
                        'visitas.longitud',
                        'visitas.obser_visita',
                        'info_inmueble.id_tipo_vivienda',
                        'info_inmueble.id_uso_inmueble',
                        'info_inmueble.id_tipo_suelo',
                        'info_inmueble.id_topografia',
                        'info_inmueble.id_forma',
                        'info_inmueble.pisos_inmueble',
                        'info_inmueble.pisos_edificio',
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
                        'info_sector.barrios_sectores',
                        'info_sector.actividad_predominante',
                        'info_sector.transporte',
                        'info_sector.vias_acceso',
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
                        'estado_conservacion.id_factor_calidad',
                        'estado_conservacion.id_factor_zona',
                        'estado_conservacion.id_factor_tiempo',
                        'estado_conservacion.id_factor_pendiente',
                        'estado_conservacion.valor_pendiente',
                        'estado_conservacion.id_factor_ubicacion',
                        'estado_conservacion.valor_ubicacion',
                        'estado_conservacion.id_estado_conservacion_opciones',
                        'observaciones_generales.observaciones_generales',
                        'valor_estimado_avaluo.valor_estimado_inmueble',
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
                        'registro_fotografico.rf_balcon3'
                    )
                    ->where('visitas.id_cliente', $idCliente)
                    ->where('visitas.direccion', $direccionCreate)
                    ->whereNull('visitas.deleted_at')
                    ->whereNull('clientes.deleted_at')
                    ->first();

        return $consultaPredio;
    }
}
