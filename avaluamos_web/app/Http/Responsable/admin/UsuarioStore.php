<?php

namespace App\Http\Responsable\admin;

use App\User;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\Usuario;
use Jenssegers\Date\Date;

class UsuarioStore implements Responsable
{
    public function toResponse($request)
    {
        $nombres = request('nombres', null);
        $apellidos = request('apellidos', null);
        $idTipoDocumento = request('id_tipo_documento', null);
        $numeroDocumento = request('numero_documento', null);
        $correo = request('correo', null);
        $celular = request('celular', null);
        $idEstado = request('id_estado', null);
        $idCargo = request('id_cargo', null);
        $idRol = request('id_rol', null);
        
        // Consultamos si ya existe un usuario con la cedula ingresada
        $consulta_cedula = Usuario::where('numero_documento', $numeroDocumento)->first();
        
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

            // ===================================================================

            DB::connection('mysql')->beginTransaction();

            try {

                $nuevoUsuario = Usuario::create([
                    'nombre_usuario' => $usuario.$complemento,
                    'clave' => Hash::make($numeroDocumento),
                    'clave_fallas' => 0,
                    'nombres' => strtoupper($nombres),
                    'apellidos' => strtoupper($apellidos),
                    'id_tipo_documento' => $idTipoDocumento,
                    'numero_documento' => $numeroDocumento,
                    'id_estado' => $idEstado,
                    'id_rol' => $idRol,
                    'id_cargo' => $idCargo,
                    'correo' => $correo,
                    'celular' => $celular,
                ]);

                if($nuevoUsuario)
                {
                    DB::connection('mysql')->commit();
                    alert()->success('Successful Process', 'Usuario creado satisfactoriamente: ' . $nuevoUsuario->usuario . ' y la clave es: ' . $numeroDocumento);
                    return redirect()->to(route('administrador.index'));

                } else {
                    DB::connection('mysql')->rollback();
                    alert()->error('Error', 'Ha ocurrido un error al crear el usuario, por favor contacte a Soporte.');
                    return redirect()->to(route('administrador.index'));
                }

            }
            catch (Exception $e)
            {
                // dd($e);
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Ha ocurrido un error creando el usuario, intente de nuevo, si el problema persiste, contacte a Soporte.');
                return back();
            }
        }
    }

    // ===================================================================
    // ===================================================================

    private function consultaUsuario($usuario)
    {
        try
        {
            $usuario = Usuario::where('nombre_usuario', $usuario)
                                ->first();
            return $usuario;

        }
        catch (Exception $e)
        {
            alert()->error('Error', 'Ha ocurrido un error, inténtelo de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    // ===================================================================
    // ===================================================================

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
