<?php

namespace App\Http\Responsable\inicio_sesion;

use App\Models\Usuario;
use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;

class LoginStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $usuario = request('usuario', null);
        $clave = request('clave', null);

        if (! isset($usuario) || empty($usuario) || is_null($usuario) || ! isset($clave) || empty($clave) || is_null($clave)) {
            alert()->error('Error', 'Usuario y Clave son requeridos!');

            return back();
        }

        try {
            $response = $this->getClientApi()->post('auth/login', [
                'json' => [
                    'usuario' => $usuario,
                    'clave' => $clave,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());
            $this->crearVariablesSesion($data);

            return redirect('home');
        } catch (ClientException $e) {
            $body = json_decode((string) $e->getResponse()->getBody());
            $codigo = $body->code ?? '';

            if ($codigo === 'inactivo') {
                alert()->error('Error', 'El usuario '.$usuario.' está inactivo, por favor contacte al administrador');
            } elseif ($codigo === 'no_existe') {
                alert()->error('Error', 'No hay registro de este usuario: '.$usuario);
            } else {
                alert()->error('Error', 'Credenciales Inválidas');
            }

            return back();
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'Un error ha ocurrido, inténtelo nuevamente, si el problema persiste, contacte a Soporte.');

            return back();
        }
    }

    private function crearVariablesSesion($data)
    {
        $usuario = Usuario::find($data->usuario->id_usuario);

        if (! $usuario) {
            throw new Exception('No se encontró el usuario autenticado en la aplicación.');
        }

        Auth::login($usuario);

        session()->put('api_jwt_token', $data->access_token);
        session()->put('api_jwt_exp', $this->expiracionDelToken($data->access_token));
        session()->put('id_usuario', $data->usuario->id_usuario);
        session()->put('usuario', $data->usuario->nombre_usuario);
        session()->put('id_rol', $data->usuario->id_rol);
        session()->put('sesion_iniciada', true);
    }

    private function expiracionDelToken(string $token): int
    {
        $partes = explode('.', $token);

        if (count($partes) !== 3) {
            return time() + 3600;
        }

        $payload = strtr($partes[1], '-_', '+/');
        $payload .= str_repeat('=', (4 - strlen($payload) % 4) % 4);
        $datos = json_decode(base64_decode($payload, true), true);

        return (int) ($datos['exp'] ?? (time() + 3600));
    }
}
