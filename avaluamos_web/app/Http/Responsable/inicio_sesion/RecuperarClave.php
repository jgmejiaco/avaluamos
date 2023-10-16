<?php

namespace App\Http\Responsable\inicio_sesion;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use App\Models\Usuario;
use App\Mails\recuperar_clave\MailRecuperarClave;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class RecuperarClave implements Responsable
{
    public function toResponse($request)
    {
        try {

            $usuario = request("recu_user", null);
            $cedula = request("recu_ced", null);
            $correo = request("recu_correo", null);
           
            if (!is_null($usuario) && !is_null($cedula) && !is_null($correo)) {

                $consultaUsuario = $this->consultarUsuario($usuario, $cedula, $correo);

               if($consultaUsuario != "exception_user" && !is_null($consultaUsuario))
               {
                    $fechaActual = Carbon::now();
                    $sumarTresDias = $fechaActual->addDay(3);
                    $fechaFormato = Carbon::parse($sumarTresDias)->timestamp;

                    Mail::to($correo)
                            ->send(new MailRecuperarClave($usuario, $fechaFormato));

                    alert()->success("Se te ha enviado un enlace al correo electrónico, 
                    verifica para continuar con la recuperación de tu contraseña");
                    return redirect()->to(route('inicio'));

               } else {
                alert()->error('NO se encontraron registros con los datos proporcionados');
                return back();
               }
            
            } else {
                alert()->error('Todos los campos son obligatorios');
                return back();
            }

        } catch (Exception $e) {
            dd($e);
            alert()->error('Ha ocurrido un error');
            return back();
        }
    }

    public function consultarUsuario($usuario, $cedula, $correo)
    {
        try {
                $consultaUsuario = Usuario::select('nombre_usuario', 'numero_documento', 'correo')
                ->where('nombre_usuario', $usuario)
                ->where('numero_documento', $cedula)
                ->where('correo', $correo)
                ->first();

                if(isset($consultaUsuario) && 
                   !is_null($consultaUsuario) && 
                   !empty($consultaUsuario))
                {
                    return $consultaUsuario;
                } else {
                    return null;
                }

        } catch (Exception $e) {
            return "exception_user";
        }
    }
}
