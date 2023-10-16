<?php

namespace App\Http\Responsable\inicio_sesion;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginStore implements Responsable
{
    public function toResponse($request)
    {
        $usuario = request('usuario', null);
        $clave = request('clave', null);

        if(!isset($usuario) || empty($usuario) || is_null($usuario) || !isset($clave) || empty($clave) || is_null($clave))
        {
            alert()->error('Error','Usuario y Clave son requeridos!');
            return back();
        }

        $user = $this->consultarUsuario($usuario);
      
        if(isset($user) && !empty($user) && !is_null($user)) {
            $contarClaveErronea = $user->clave_fallas;

            if($contarClaveErronea >= 4)
            {
                $this->inactivarUsuario($user->id_usuario);
            }

            if($user->id_estado == 2)
            {
                alert()->error('Error','El usuario ' . $usuario . ' está inactivo, por favor contacte al administrador');
                return back();
            }

            if(Hash::check($clave, $user->clave)) {
                $this->crearVariablesSesion($user);
                return redirect('home');
            } else {
                $contarClaveErronea += 1;
                $this->actualizarClaveFallas($user->id_usuario, $contarClaveErronea);
                alert()->error('Error','Credenciales Inválidas');
                return back();
            }
        } else {
            alert()->error('Error','No hay registro de este usuario: ' . $usuario);
            return back();
        }
    }

    // ==================================================
    // ==================================================
    // ==================================================
    
    private function crearVariablesSesion($user)
    {
        // Creamos las variables de sesion
        session()->put('id_usuario', $user->id_usuario);
        session()->put('usuario', $user->nombre_usuario);
        session()->put('id_rol', $user->id_rol);
        session()->put('sesion_iniciada', true);
    }

    // ==================================================

    private function consultarUsuario($usuario)
    {
        try {
            return Usuario::where('nombre_usuario', $usuario)
                        ->whereNull('deleted_at')
                        ->first();
        } catch (Exception $e) {
            alert()->error('Error','Un error ha ocurrido, inténtelo nuevamente, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    // ==================================================

    private function inactivarUsuario($idUser)
    {
        try {
            $user = Usuario::find($idUser);
            $user->id_estado = 2;
            $user->save();

        } catch (Exception $e)
        {
            alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
            return back();
        }
    }

    // ==================================================

    private function actualizarClaveFallas($usuario_id, $contador)
    {
        try {
            $user = Usuario::find($usuario_id);
            $user->clave_fallas = $contador;
            $user->save();

        } catch (Exception $e) {
            alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
            return back();
        }
    }
}
