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
        // dd($request);

        $nombres = request('nombres', null);
        $apellidos = request('apellidos', null);
        $id_tipo_documento = request('id_tipo_documento', null);
        $numero_documento = request('numero_documento', null);
        $fecha_nacimiento = request('fecha_nacimiento', null);
        $id_lugar_nacimiento = request('id_lugar_nacimiento', null);
        $correo = request('correo', null);
        $direccion = request('direccion', null);
        $celular = request('celular', null);
        $telefono_fijo = request('telefono_fijo', null);
        $nombre_contacto = request('nombre_contacto', null);
        $telefono_contacto = request('telefono_contacto', null);
        $id_ciudad = request('id_ciudad', null);
        $id_estado = request('id_estado', null);
        $id_cargo = request('id_cargo', null);
        $id_rol = request('id_rol', null);
        
        // $usuarioShow = new UsuariosShow();

        // Consultamos si ya existe un usuario con la cedula ingresada
        $consulta_cedula = Usuario::where('numero_documento', $numero_documento)->first();
        
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

                $nuevo_usuario = Usuario::create([
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
                // dd($e);
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
