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

class VisitaStore implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);

        $idCliente = request('id_cliente', null);
        $dirigidoA = request('dirigido_a', null);
        $tipoDocEmpresa = request('tipo_doc_empresa', null);
        $docDirigidoA = request('doc_dirigido_a', null);
        $objetoAvaluo = request('objeto_avaluo', null);
        $pais = request('pais', null);
        $departamento = request('departamento', null);
        $ciudad = request('ciudad', null);
        $sector = request('sector', null);
        $cercaDe = request('cerca_de', null);
        $barrio = request('barrio', null);
        $unidadEdificio = request('unidad_edificio', null);
        $direccion = request('direccion', null);
        $tipoInmueble = request('tipo_inmueble', null);
        $area = request('area', null);
        $estrato = request('estrato', null);
        $numeroInmueble = request('numero_inmueble', null);
        $cantParqueaderos = request('cant_parqueaderos', null);
        $cantCuartoUtil = request('cant_cuarto_util', null);
        $cantKioscos = request('cant_kioscos', null);
        $cantPiscinas = strtoupper(request('cant_piscinas', null));
        $cantEstablos = request('cant_establos', null);
        $cantBillares = request('cant_billares', null);
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
            $dirigidoA = null;
        }

        // ==============================
        
        if ($tipoDocEmpresa != "-1" || $tipoDocEmpresa != -1) {
            $tipoDocEmpresa = request('tipo_doc_empresa', null);
        } else {
            $tipoDocEmpresa = null;
        }

        // ==============================

        if ($cantParqueaderos != "-1" || $cantParqueaderos != -1) {
            $cantParqueaderos = request('cant_parqueaderos', null);
        } else {
            $cantParqueaderos = null;
        }

        // ==============================

        if ($cantCuartoUtil != "-1" || $cantCuartoUtil != -1) {
            $cantCuartoUtil = request('cant_cuarto_util', null);
        } else {
            $cantCuartoUtil = null;
        }

        // ==============================

        if ($cantKioscos != "-1" || $cantKioscos != -1) {
            $cantKioscos = request('cant_kioscos', null);
        } else {
            $cantKioscos = null;
        }

        // ==============================

        if ($cantPiscinas != "-1" || $cantPiscinas != -1) {
            $cantPiscinas = request('cant_piscinas', null);
        } else {
            $cantPiscinas = null;
        }

        // ==============================

        if ($cantEstablos != "-1" || $cantEstablos != -1) {
            $cantEstablos = request('cant_establos', null);
        } else {
            $cantEstablos = null;
        }

        // ==============================
        
        if ($cantBillares != "-1" || $cantBillares != -1) {
            $cantBillares = request('cant_billares', null);
        } else {
            $cantBillares = null;
        }
        
        // ==============================

        

        // ==============================================================================

        // dd($avaluador, $solicitante, $numeroDocumento, $celular, $correo, $dirigidoEmpresa, $dirigidoNit, $empresa, $fechaInspeccion, $horaVisita, $pais, $departamentoEstado, $ciudad, $barrio, $sector, $cercaDe, $direccion, $edificio, $apartamentoNumero, $numeroInmueble, $unidad, $estrato, $latitud, $longitud, $observacionesVisitaTecnicaInmueble);
        
        $fechaVisita = Date::parse($fechaVisita)->timestamp;

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
                'sector' => $sector,
                'cerca_de' => $cercaDe,
                'barrio' => $barrio,
                'unidad_edificio' => $unidadEdificio,
                'direccion' => $direccion,
                'id_tipo_inmueble' => $tipoInmueble,
                'area' => $area,
                'id_estrato' => $estrato,
                'numero_inmueble' => $numeroInmueble,
                'id_cant_parqueaderos' => $cantParqueaderos,
                'id_cant_cuarto_util' => $cantCuartoUtil,
                'id_cant_kioskos' => $cantKioscos,
                'id_cant_piscinas' => $cantPiscinas,
                'id_cant_establos' => $cantEstablos,
                'id_cant_billares' => $cantBillares,
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
                alert()->success('Proceso Exitoso', 'Visita creada satisfactoriamente');
                return redirect()->to(route('administrador.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al crear la visita, por favor contacte a Soporte.');
                return redirect()->to(route('administrador.index'));
            }
        }
        catch (Exception $e)
        {
            // dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
