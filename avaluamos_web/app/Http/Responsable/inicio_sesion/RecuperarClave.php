<?php

namespace App\Http\Responsable\inicio_sesion;

use App\Mails\recuperar_clave\MailRecuperarClave;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Mail;

class RecuperarClave implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        try {
            $usuario = request('recu_user', null);
            $cedula = request('recu_ced', null);
            $correo = request('recu_correo', null);

            if (is_null($usuario) || is_null($cedula) || is_null($correo)) {
                alert()->error('Todos los campos son obligatorios');
                return back();
            }

            $consultaUsuario = $this->consultarUsuario($usuario, $cedula, $correo);

            if ($consultaUsuario === 'exception_user') {
                alert()->error('Ha ocurrido un error');
                return back();
            }

            if (is_null($consultaUsuario)) {
                alert()->error('NO se encontraron registros con los datos proporcionados');
                return back();
            }

            $fechaActual = Carbon::now();
            $sumarUnDia = $fechaActual->addDay(1);
            $fechaFormato = Carbon::parse($sumarUnDia)->timestamp;

            Mail::to($correo)
                ->send(new MailRecuperarClave($usuario, $fechaFormato));

            alert()->success('Se te ha enviado un enlace al correo electrónico,
                    verifica para continuar con la recuperación de tu contraseña');
            return redirect()->to(route('inicio'));
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Ha ocurrido un error');
            return back();
        }
    }

    public function consultarUsuario($usuario, $cedula, $correo)
    {
        try {
            $response = $this->getClientApi()->post('auth/recuperar_clave_consultar', [
                'json' => [
                    'usuario' => $usuario,
                    'cedula' => $cedula,
                    'correo' => $correo,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            if (! empty($data->success) && ! empty($data->data)) {
                return $data->data;
            }

            return null;
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return null;
            }

            return 'exception_user';
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            return 'exception_user';
        }
    }
}
