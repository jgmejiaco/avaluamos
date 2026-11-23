<?php

namespace App\Http\Responsable\roles;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Validator;

class RolUpdate implements Responsable
{
    use MetodosTrait;

    protected $idRol;

    public function __construct($idRol)
    {
        $this->idRol = $idRol;
    }

    public function toResponse($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:125',
        ], [
            'name.required' => 'El nombre del rol es obligatorio.',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->errors()->first());
            return redirect()->route('roles.index');
        }

        $nombre = $this->formatoNombrePropio(trim($request->input('name')));

        try {
            $response = $this->getClientApi()->put('rol_update/'.$this->idRol, [
                'json' => [
                    'name' => $nombre,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            if (! empty($data->success)) {
                alert()->success('Éxito', 'Rol actualizado correctamente.');
                return redirect()->route('roles.index');
            }

            alert()->error('Error', $data->message ?? 'No se pudo actualizar el rol.');
            return redirect()->route('roles.index');
        } catch (ClientException $e) {
            $body = json_decode((string) $e->getResponse()->getBody());
            $msg = $body->message ?? 'No se pudo actualizar el rol.';

            if (($body->code ?? '') === 'protegido') {
                alert()->warning('Atención', $msg);
            } else {
                alert()->info('Info', $msg);
            }

            return redirect()->route('roles.index');
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudo actualizar el rol.');
            return redirect()->route('roles.index');
        }
    }
}
