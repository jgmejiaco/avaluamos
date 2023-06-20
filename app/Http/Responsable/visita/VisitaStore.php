<?php

namespace App\Http\Responsable\visita;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use Jenssegers\Date\Date;

class VisitaStore implements Responsable
{
    public function toResponse($request)
    {
        // dd($request);

        $avaluador = request('avaluador', null);
        $solicitante = strtoupper(request('solicitante', null));
        $numeroDocumento = request('numero_documento', null);
        $celular = request('celular', null);
        $correo = request('correo', null);
        $dirigidoEmpresa = strtoupper(request('dirigido_a_empresa', null));
        $dirigidoNit = request('dirigido_a_nit', null);
        $empresa = strtoupper(request('empresa', null));
        $fechaInspeccion = request('fecha_inspeccion', null);
        $horaVisita = request('hora_visita', null);
        $pais = request('pais', null);
        $departamentoEstado = request('departamento_estado', null);
        $ciudad = request('ciudad', null);
        $barrio = strtoupper(request('barrio', null));
        $sector = request('sector', null);
        $cercaDe = request('cerca_de', null);
        $direccion = strtoupper(request('direccion', null));
        $edificio = strtoupper(request('edificio', null));
        $apartamentoNumero = request('apartamento_numero', null);
        $numeroInmueble = request('numero_inmueble', null);
        $unidad = strtoupper(request('unidad', null));
        $estrato = request('estrato', null);
        $latitud = request('latitud', null);
        $longitud = request('longitud', null);
        $observacionesVisitaTecnicaInmueble = request('observaciones_visita_tecnica_inmueble', null);

        dd($avaluador, $solicitante, $numeroDocumento, $celular, $correo, $dirigidoEmpresa, $dirigidoNit, $empresa, $fechaInspeccion, $horaVisita, $pais, $departamentoEstado, $ciudad, $barrio, $sector, $cercaDe, $direccion, $edificio, $apartamentoNumero, $numeroInmueble, $unidad, $estrato, $latitud, $longitud, $observacionesVisitaTecnicaInmueble);
        
        // $usuarioShow = new UsuariosShow();

        // Consultamos si ya existe un usuario con la cedula ingresada
        $consulta_cedula = Persona::where('numero_documento', $numero_documento)->first();
        
        if(isset($consulta_cedula) && !empty($consulta_cedula) && !is_null($consulta_cedula))
        {
            alert()->info('Info', 'Este número de documento ya existe.');
            return back();
        }
        else
        {
            // Contruimos el nombre de usuario
            $separar_apellidos = explode(" ", $apellidos);
            $usuario = substr($this->quitarCaracteresEspeciales(trim($nombres)), 0,1) . trim($this->quitarCaracteresEspeciales($separar_apellidos[0]));
            $usuario = preg_replace("/(Ñ|ñ)/", "n", $usuario);
            $usuario = strtolower($usuario);
            $complemento = "";

            while($this->consultaUsuario($usuario.$complemento))
            {
                $complemento++;
            }

            $fecha_nacimiento = Date::parse($fecha_nacimiento)->timestamp;

            DB::connection('mysql')->beginTransaction();

            try {

                $nuevo_usuario = Persona::create([
                    'nombre_usuario' => $usuario.$complemento,
                    'clave' => Hash::make($numero_documento),
                    'clave_fallas' => 0,
                    'nombres' => strtoupper($nombres),
                    'apellidos' => strtoupper($apellidos),
                    'id_tipo_documento' => $id_tipo_documento,
                    'numero_documento' => $numero_documento,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'id_lugar_nacimiento' => $id_lugar_nacimiento,
                    'correo' => $correo,
                    'direccion' => $direccion,
                    'celular' => $celular,
                    'telefono_fijo' => $telefono_fijo,
                    'nombre_contacto' => $nombre_contacto,
                    'telefono_contacto' => $telefono_contacto,
                    'id_ciudad' => $id_ciudad,
                    'id_estado' => $id_estado,
                    'id_cargo' => $id_cargo,
                    'id_rol' => $id_rol,
                ]);

                if($nuevo_usuario)
                {
                    DB::connection('mysql')->commit();
                    alert()->success('Successful Process', 'Usuario creado satisfactoriamente: ' . $nuevo_usuario->usuario . ' y la clave es: ' . $numero_documento);
                    return redirect()->to(route('administrador.index'));

                } else {
                    DB::connection('mysql')->rollback();
                    alert()->error('Error', 'Ha ocurrido un error al crear el usuario, por favor contacte a Soporte.');
                    return redirect()->to(route('administrador.index'));
                }

            }
            catch (Exception $e)
            {
                dd($e);
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error creando el usuario, intente de nuevo, si el problema persiste, contacte a Soporte.');
                return back();
            }
        }
    }

    private function consultaUsuario($usuario)
    {
        try
        {
            $usuario = Persona::where('nombre_usuario', $usuario)
                                ->first();
            return $usuario;

        }
        catch (Exception $e)
        {
            alert()->error('Error', 'Ha ocurrido un error, inténtelo de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    private function quitarCaracteresEspeciales($cadena)
    {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ",
                               "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”",
                               "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹", "ñ", "Ñ", "*");

        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U",
                            "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U",
                            "u", "o", "O", "i", "a", "e", "U", "I", "A", "E", "n", "N", "");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return $texto;
    }
}
