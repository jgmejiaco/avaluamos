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
        // $objetoAvaluo = $request->input('objeto_avaluo', []);
        // dd($objetoAvaluoCheck);

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

        // dd($cliNombres, $cliCelular, $cliEmail, $idTipoPersona, $dirigidoA, $idTipoDocumento, $docDirigidoA, $objetoAvaluo, $idCiudad, $sector, $barrio, $direccion, $idTipoInmueble, $area, $idEstrato, $numeroInmueble, $cantParqueaderos, $cantCuartoUtil, $cantKioskos, $cantPiscinas, $cantEstablos, $cantBillares, $idReferidoPor, $porcentajeDescuento, $valorCotizacion, $idVisitado);

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

        // ==============================================================================
        


        // ==============================================================================


        // Consultamos si ya existe un usuario con la cedula ingresada
    //     $consulta_cedula = Usuario::where('numero_documento', $numero_documento)->first();
        
    //     if(isset($consulta_cedula) && !empty($consulta_cedula) && !is_null($consulta_cedula))
    //     {
    //         alert()->info('Info', 'Este número de documento ya existe.');
    //         return back();
    //     }
    //     else
    //     {
    //         // Contruimos el nombre de usuario
    //         $separar_apellidos = explode(" ", $apellidos);
    //         $usuario = substr($this->quitarCaracteresEspeciales(trim($nombres)), 0,1) . trim($this->quitarCaracteresEspeciales($separar_apellidos[0]));
    //         $usuario = preg_replace("/(Ñ|ñ)/", "n", $usuario);
    //         $usuario = strtolower($usuario);
    //         $complemento = "";

    //         while($this->consultaUsuario($usuario.$complemento))
    //         {
    //             $complemento++;
    //         }

    //         $fecha_nacimiento = Date::parse($fecha_nacimiento)->timestamp;

    //         DB::connection('mysql')->beginTransaction();

    //         try {

    //             $nuevo_usuario = Usuario::create([
    //                 'nombre_usuario' => $usuario.$complemento,
    //                 'clave' => Hash::make($numero_documento),
    //                 'clave_fallas' => 0,
    //                 'nombres' => strtoupper($nombres),
    //                 'apellidos' => strtoupper($apellidos),
    //                 'id_tipo_documento' => $id_tipo_documento,
    //                 'numero_documento' => $numero_documento,
    //                 'fecha_nacimiento' => $fecha_nacimiento,
    //                 'id_lugar_nacimiento' => $id_lugar_nacimiento,
    //                 'correo' => $correo,
    //                 'direccion' => $direccion,
    //                 'celular' => $celular,
    //                 'telefono_fijo' => $telefono_fijo,
    //                 'nombre_contacto' => $nombre_contacto,
    //                 'telefono_contacto' => $telefono_contacto,
    //                 'id_ciudad' => $id_ciudad,
    //                 'id_estado' => $id_estado,
    //                 'id_cargo' => $id_cargo,
    //                 'id_rol' => $id_rol,
    //             ]);

    //             if($nuevo_usuario)
    //             {
    //                 DB::connection('mysql')->commit();
    //                 alert()->success('Successful Process', 'Usuario creado satisfactoriamente: ' . $nuevo_usuario->usuario . ' y la clave es: ' . $numero_documento);
    //                 return redirect()->to(route('administrador.index'));

    //             } else {
    //                 DB::connection('mysql')->rollback();
    //                 alert()->error('Error', 'Ha ocurrido un error al crear el usuario, por favor contacte a Soporte.');
    //                 return redirect()->to(route('administrador.index'));
    //             }

    //         }
    //         catch (Exception $e)
    //         {
    //             // dd($e);
    //             DB::connection('mysql')->rollback();
    //             alert()->error('Error', 'Ha ocurrido un error creando el usuario, intente de nuevo, si el problema persiste, contacte a Soporte.');
    //             return back();
    //         }
    //     }
    // }

    // private function consultaUsuario($usuario)
    // {
    //     try
    //     {
    //         $usuario = Usuario::where('nombre_usuario', $usuario)
    //                             ->first();
    //         return $usuario;

    //     }
    //     catch (Exception $e)
    //     {
    //         alert()->error('Error', 'Ha ocurrido un error, inténtelo de nuevo, si el problema persiste, contacte a Soporte.');
    //         return back();
    //     }
    // }

    // private function quitarCaracteresEspeciales($cadena)
    // {
    //     $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ",
    //                            "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”",
    //                            "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹", "ñ", "Ñ", "*");

    //     $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U",
    //                         "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
    //                         "u", "o", "O", "i", "a", "e", "U", "I", "A", "E", "n", "N", "");
    //     $texto = str_replace($no_permitidas, $permitidas, $cadena);
    //     return $texto;
    } // CIERRE toResponse
} // CIERRE Clase
