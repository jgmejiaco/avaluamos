<?php

namespace App\Http\Responsable\visita;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\Usuario;
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

class CalendarioStore implements Responsable
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
        // $cantParqueaderos = request('cant_parqueaderos', null);
        // $cantCuartoUtil = request('cant_cuarto_util', null);
        // $cantKioscos = request('cant_kioscos', null);
        // $cantPiscinas = strtoupper(request('cant_piscinas', null));
        // $cantEstablos = request('cant_establos', null);
        // $cantBillares = request('cant_billares', null);
        $porcentajeDescuento = request('porcentaje_descuento', null);
        $valorCotizacion = request('valor_cotizacion', null);
        $latitud = request('latitud', null);
        $longitud = request('longitud', null);
        $obserVisitaTecnica = request('obser_visita_tecnica', null);
        $visitado = request('visitado', null);
        $fechaVisita = request('fecha_visita', null);
        $horaVisita = request('hora_visita', null);
        $visitador = request('visitador', null);

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

        // if ($cantParqueaderos != "-1" || $cantParqueaderos != -1) {
        //     $cantParqueaderos = request('cant_parqueaderos', null);
        // } else {
        //     $cantParqueaderos = null;
        // }

        // ==============================

        // if ($cantCuartoUtil != "-1" || $cantCuartoUtil != -1) {
        //     $cantCuartoUtil = request('cant_cuarto_util', null);
        // } else {
        //     $cantCuartoUtil = null;
        // }

        // ==============================

        // if ($cantKioscos != "-1" || $cantKioscos != -1) {
        //     $cantKioscos = request('cant_kioscos', null);
        // } else {
        //     $cantKioscos = null;
        // }

        // ==============================

        // if ($cantPiscinas != "-1" || $cantPiscinas != -1) {
        //     $cantPiscinas = request('cant_piscinas', null);
        // } else {
        //     $cantPiscinas = null;
        // }

        // ==============================

        // if ($cantEstablos != "-1" || $cantEstablos != -1) {
        //     $cantEstablos = request('cant_establos', null);
        // } else {
        //     $cantEstablos = null;
        // }

        // ==============================
        
        // if ($cantBillares != "-1" || $cantBillares != -1) {
        //     $cantBillares = request('cant_billares', null);
        // } else {
        //     $cantBillares = null;
        // }

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
                // 'id_cant_parqueaderos' => $cantParqueaderos,
                // 'id_cant_cuarto_util' => $cantCuartoUtil,
                // 'id_cant_kioskos' => $cantKioscos,
                // 'id_cant_piscinas' => $cantPiscinas,
                // 'id_cant_establos' => $cantEstablos,
                // 'id_cant_billares' => $cantBillares,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'porcentaje_descuento' => $porcentajeDescuento,
                'valor_cotizacion' => $valorCotizacion,
                'obser_visita' => $obserVisitaTecnica,
                'id_visitado' => $visitado,
                'fecha_visita' => $fechaVisita,
                'hora_visita' => $horaVisita,
                'id_visitador' => $visitador,
            ]);

            if($nuevaVisita) {
                DB::connection('mysql')->commit();

                $idVisita = Visita::select('id_visita')->orderBy('id_visita', 'DESC')->first();

                InfoInmueble::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                CaracteristicasInmueble::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                AcabadosInmueble::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                CalificacionInmueble::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                DotacionComunal::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                InfoSector::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                CondicionesUrbanisticas::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                ObservacionesGenerales::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                EstadoConservacion::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                RegistroFotografico::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                ValorEstimadoAvaluo::create([
                    'id_visita' => $idVisita->id_visita,
                ]);

                alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
                return redirect()->to(route('visita.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al crear la visita, por favor contacte a Soporte.');
                return redirect()->to(route('visita.index'));
            }
        }
        catch (Exception $e)
        {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
