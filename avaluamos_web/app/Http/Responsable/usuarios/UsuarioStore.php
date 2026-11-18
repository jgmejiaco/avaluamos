<?php

namespace App\Http\Responsable\usuarios;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $nombres         = request('nombres', null);
        $apellidos       = request('apellidos', null);
        $idTipoDocumento = request('id_tipo_documento', null);
        $numeroDocumento = request('numero_documento', null);
        $correo          = request('correo', null);
        $celular         = request('celular', null);
        $idCargo         = request('id_cargo', null);
        $idRol           = request('id_rol', null);
        $idEstado        = 1;

        // Construimos el alias / nombre de usuario
        $separarApellidos = explode(' ', $apellidos);
        $aliasUsuario     = substr($this->quitarCaracteresEspeciales(trim($nombres)), 0, 1)
            .trim($this->quitarCaracteresEspeciales($separarApellidos[0]));
        $aliasUsuario     = str_replace(['Ñ', 'ñ'], 'n', $aliasUsuario);
        $aliasUsuario     = strtolower($aliasUsuario);
        $complemento      = '';

        try {
            while ($this->consultaAliasUsuario($aliasUsuario.$complemento)) {
                $complemento++;
            }

            $nombreUsuario = $aliasUsuario.$complemento;

            $response = $this->getClientApi()->post('usuarios_store', [
                'json' => [
                    'nombre_usuario'    => $nombreUsuario,
                    'nombres'           => $nombres,
                    'apellidos'         => $apellidos,
                    'id_tipo_documento' => $idTipoDocumento,
                    'numero_documento'  => $numeroDocumento,
                    'correo'            => $correo,
                    'celular'           => $celular,
                    'id_cargo'          => $idCargo,
                    'id_rol'            => $idRol,
                    'id_estado'         => $idEstado,
                    // Clave en texto plano: el hash se hace en la API
                    'clave'             => $numeroDocumento,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (! empty($respuesta->success)) {
                alert()->success(
                    'Successful Process',
                    'Usuario creado satisfactoriamente: '.$nombreUsuario.' y la clave es: '.$numeroDocumento
                );

                return redirect()->to(route('usuarios.index'));
            }

            alert()->error('Error', $respuesta->message ?? 'No fue posible crear el usuario.');
            return back();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioStore: '.$e->getMessage());
            alert()->error('Error', 'Ha ocurrido un error creando el usuario, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }

    // ===================================================================

    private function consultaAliasUsuario($aliasUsuario)
    {
        try {
            $response = $this->getClientApi()->post('consultar_alias_usuario_store', [
                'json' => [
                    'nombre_usuario' => $aliasUsuario,
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            return $respuesta === 'existe_alias';

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioStore consultaAliasUsuario: '.$e->getMessage());

            throw $e;
        }
    }
}
