<?php

namespace App\Http\Responsable\inicio_sesion;

use App\User;
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

        // ==================================================

        if(!isset($usuario) || empty($usuario) || is_null($usuario) || !isset($clave) || empty($clave) || is_null($clave))
        {
            alert()->error('Error','Usuario y Clave son requeridos!');
            return back();
        }

        // ==================================================

        $user = $this->consultarUsuario($usuario);

        if(isset($user) && !empty($user) && !is_null($user))
        {
            $contar_clave_erronea = $user->clave_fallas;

            // if($user->clave_fallas >= 4)
            // {
            //     $this->inactivarUsuario($user->id_user);
            // }

            // ===================================

            // if($user->id_estado == 0 || $user->id_estado == false || $user->id_estado == "false")
            // {
            //     alert()->error('Error','Username ' . $usuario . ' is locked, please contact the administrator to unlock it');
            //     return back();
            // }

            // ===================================

            // if(Hash::check($pass, $user->password))
            // {
            //     // Rol entrenador
            //     if($user->id_rol == 1 || $user->id_rol == "1")
            //     {
            //         // Creamos las variables de sesion
            //         $this->crearVariablesSesion($user);
            //         return redirect()->to(route('trainer.create'));

            //        // Rol Estudiante
            //     } else if($user->id_rol == 3 || $user->id_rol == "3")
            //     {
            //          // Creamos las variables de sesion
            //          $this->crearVariablesSesion($user);
            //          return redirect()->to(route('estudiante.index'));

            //     } // Rol Administrador
            //     else if($user->id_rol == 2 || $user->id_rol == "2")
            //     {
            //         // Creamos las variables de sesion
            //         $this->crearVariablesSesion($user);
            //         return redirect()->to(route('administrador.index'));
            //     } else {

            //         // Si el rol es diferente a los mencionados, mostramos mensaje
            //         alert()->error('Error','Username ' . $username . ' has an invalid role!');
            //         return back();
            //     }

            // } else {
            //     $cont_clave_erronea += 1;
            //     $this->actualizarClaveFallas($user->id_user, $cont_clave_erronea);
            //     alert()->error('Error','Invalid Credentials');
            //     return back();
            // }

        }
        // else
        // {
        //     alert()->error('Error','No records were found for the username ' . $usuario);
        //     return back();
        // }
    }

    // ==================================================
    // ==================================================
    // ==================================================

    private function crearVariablesSesion($user)
    {
        // Creamos las variables de sesion
        session()->put('id_usuario', $user->id_user);
        session()->put('username', $user->usuario);
        session()->put('sesion_iniciada', true);
        session()->put('rol', $user->id_rol);
    }

    private function consultarUsuario($usuario)
    {
        try
        {
            return Usuario::where('nombre_usuario', $usuario)
                        ->whereNull('deleted_at')
                        ->get()
                        ->first();

        }
        catch (Exception $e)
        {
            alert()->error('Error','Un error ha ocurrido, inténtelo nuevamente, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    // ==================================================

    // private function inactivarUsuario($id_user)
    // {
    //     try {

    //         $user = Usuario::find($id_user);
    //         $user->estado = 0;
    //         $user->save();

    //     } catch (Exception $e)
    //     {
    //         alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
    //         return back();
    //     }
    // }

    // ==================================================

    // private function actualizarClaveFallas($usuario_id, $contador)
    // {
    //     try {
    //         $user = Usuario::find($usuario_id);
    //         $user->clave_fallas = $contador;
    //         $user->save();

    //     } catch (Exception $e) {
    //         alert()->error('Error', 'An error has occurred, try again, if the problem persists contact support.');
    //         return back();
    //     }
    // }
}
