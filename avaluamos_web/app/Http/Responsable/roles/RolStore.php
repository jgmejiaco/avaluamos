<?php

namespace App\Http\Responsable\roles;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Validator;

class RolStore implements Responsable
{
    use MetodosTrait;

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
            $response = $this->getClientApi()->post('rol_store', [
                'json' => [
                    'name' => $nombre,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            if (! empty($data->success)) {
                alert()->success('Éxito', 'Rol creado correctamente.');
                return redirect()->route('roles.index');
            }

            alert()->error('Error', $data->message ?? 'No se pudo crear el rol.');
            return redirect()->route('roles.index');
        } catch (ClientException $e) {
            $body = json_decode((string) $e->getResponse()->getBody());
            alert()->info('Info', $body->message ?? 'No se pudo crear el rol.');
            return redirect()->route('roles.index');
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudo crear el rol.');
            return redirect()->route('roles.index');
        }
    }
}
