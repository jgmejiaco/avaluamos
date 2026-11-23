<?php

namespace App\Http\Responsable\asignar_permisos;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Support\Responsable;

class AsignarPermisoStore implements Responsable
{
    use MetodosTrait;

    public function toResponse($request)
    {
        $idRol = $request->input('id_rol');
        $permisosIds = $request->input('permisos', []);

        if (! $idRol) {
            alert()->error('Error', 'Debe seleccionar un rol.');
            return redirect()->route('asignar_permisos.index');
        }

        try {
            $response = $this->getClientApi()->post('asignar_permiso_rol', [
                'json' => [
                    'id_rol' => $idRol,
                    'permisos' => (array) $permisosIds,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            if (! empty($data->success)) {
                alert()->success('Éxito', $data->message ?? 'Permisos asignados correctamente.');
                return redirect()->route('asignar_permisos.index');
            }

            alert()->error('Error', $data->message ?? 'No se pudieron asignar los permisos.');
            return redirect()->route('asignar_permisos.index');
        } catch (ClientException $e) {
            $body = json_decode((string) $e->getResponse()->getBody());
            $msg = $body->message ?? 'No se pudieron asignar los permisos.';

            if (($body->code ?? '') === 'protegido') {
                alert()->warning('Atención', $msg);
            } else {
                alert()->error('Error', $msg);
            }

            return redirect()->route('asignar_permisos.index');
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudieron asignar los permisos.');
            return redirect()->route('asignar_permisos.index');
        }
    }
}
