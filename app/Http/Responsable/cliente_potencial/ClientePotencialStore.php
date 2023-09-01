<?php

namespace App\Http\Responsable\cliente_potencial;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Date\Date;
use App\Models\Usuario;
use App\Models\DirigidoA;
use App\Models\ReferidoPor;
use App\Models\Cliente;

class ClientePotencialStore implements Responsable
{
    public function toResponse($request)
    {
        $objetoAvaluoCheck = request('objeto_avaluo', []);
        $objetoAvaluoCheck = implode(', ', $objetoAvaluoCheck);

        $cliNombres = strtoupper(request('nombre_solicitante', null));
        $cliCelular = request('celular', null);
        $cliEmail = request('correo', null);
        $idTipoPersona = request('tipo_persona', null);
        $idDirigidoA = request('dirigido_a', null);
        $idDocumentoEmpresa = request('tipo_documento', null);
        $docDirigidoA = strtoupper(request('documento_dirigido_a', null));
        $objetoAvaluo = $objetoAvaluoCheck;
        $idCiudad = request('municipio', null);
        $sector = strtoupper(request('sector', null));
        $barrio = strtoupper(request('barrio', null));
        $direccion = strtoupper(request('direccion', null));
        $idTipoInmueble = request('tipo_inmueble', null);
        $area = doubleval(request('area', null));
        $idEstrato = request('estrato', null);
        $numeroInmueble = strtoupper(request('numero_inmueble', null));
        $cantParqueaderos = request('cant_parqueaderos', null);
        $cantCuartoUtil = request('cant_cuarto_util', null);
        $cantKioskos = request('cant_kioscos', null);
        $cantPiscinas = request('cant_piscinas', null);
        $cantEstablos = request('cant_establos', null);
        $cantBillares = request('cant_billares', null);
        $idReferidoPor = request('id_referido_por', null);
        $idRedSocial = request('id_red_social', null);
        $nombreQuienRefiere = request('nombre_quien_refiere', null);
        $empresaQueRefiere = request('empresa_que_refiere', null);
        $porcentajeDescuento = request('porcentaje_descuento', null);
        $valorCotizacion = request('valor_cotizacion', null);
        $idVisitado = request('visitado', null);

        // ==============================================================================

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

        if ($cantKioskos != "-1" || $cantKioskos != -1) {
            $cantKioskos = request('cant_kioscos', null);
        } else {
            $cantKioskos = null;
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
            $cantBillares = request('cant_billares', null);;
        } else {
            $cantBillares = null;
        }

        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $nuevoCliente = Cliente::create([
                                'cli_nombres' => $cliNombres,
                                'cli_celular' => $cliCelular,
                                'cli_email' => $cliEmail,
                                'id_tipo_persona' => $idTipoPersona,
                                'id_dirigido_a' => $idDirigidoA,
                                'id_doc_empresa' => $idDocumentoEmpresa,
                                'documento_empresa' => $docDirigidoA,
                                'objeto_avaluo' => $objetoAvaluo,
                                'id_ciudad' => $idCiudad,
                                'sector' => $sector,
                                'barrio' => $barrio,
                                'direccion' => $direccion,
                                'id_tipo_inmueble' => $idTipoInmueble,
                                'area' => $area,
                                'id_estrato' => $idEstrato,
                                'numero_inmueble' => $numeroInmueble,
                                'id_cant_parqueaderos' => $cantParqueaderos,
                                'id_cant_cuarto_util' => $cantCuartoUtil,
                                'id_cant_kioskos' => $cantKioskos,
                                'id_cant_piscinas' => $cantPiscinas,
                                'id_cant_establos' => $cantEstablos,
                                'id_cant_billares' => $cantBillares,
                                'id_referido_por' => $idReferidoPor,
                                'id_red_social' => $idRedSocial,
                                'nombre_quien_refiere' => $nombreQuienRefiere,
                                'empresa_que_refiere' => $empresaQueRefiere,
                                'porcentaje_descuento' => $porcentajeDescuento,
                                'valor_cotizacion' => $valorCotizacion,
                                'id_visitado' => $idVisitado,
                            ]);

            if($nuevoCliente)
            {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Cliente creado satisfactoriamente');
                return redirect()->to(route('cliente_potencial.index'));

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error al crear el Cliente, por favor contacte a Soporte.');
                return redirect()->to(route('cliente_potencial.index'));
            }
        }
        catch (Exception $e)
        {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    } // CIERRE toResponse
} // CIERRE Clase
