<?php

namespace App\Http\Responsable\usuarios;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class UsuarioUpdate implements Responsable
{
    use MetodosTrait;

    protected $idUsuario;

    public function __construct($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->put('usuario_update/'.$this->idUsuario, [
                'json' => [
                    'usu_nombres'   => request('usu_nombres', null),
                    'usu_apellidos' => request('usu_apellidos', null),
                    'usu_cargo'     => request('usu_cargo', null),
                    'usu_rol'       => request('usu_rol', null),
                    'usu_id_doc'    => request('usu_id_doc', null),
                    'usu_documento' => request('usu_documento', null),
                    'usu_correo'    => request('usu_correo', null),
                    'usu_celular'   => request('usu_celular', null),
                    'usu_estado'    => request('usu_estado', null),
                ],
            ]);

            $respuesta = json_decode($response->getBody()->getContents());

            if (! empty($respuesta->success)) {
                alert()->success('Proceso Exitoso', 'Usuario editado satisfactoriamente');
                return redirect()->to(route('usuarios.index'));
            }

            alert()->error('Error', $respuesta->message ?? 'No fue posible editar el usuario.');
            return back();

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error UsuarioUpdate: '.$e->getMessage());
            alert()->error('Error', 'Excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
