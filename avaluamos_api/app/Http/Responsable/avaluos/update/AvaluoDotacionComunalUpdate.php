<?php

namespace App\Http\Responsable\avaluos\update;

use App\Models\DotacionComunal;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoDotacionComunalUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            DotacionComunal::where('id_visita', $this->idVisita)
                ->update([
                    'porteria_24'          => request('porteria_24', null),
                    'parqueo_comun'        => request('parqueo_comun', null),
                    'juegos_infantiles'    => request('juegos_infantiles', null),
                    'zona_mascotas'        => request('zona_mascotas', null),
                    'piscinas'             => request('piscinas', null),
                    'zonas_verdes'         => request('zonas_verdes', null),
                    'sauna'                => request('sauna', null),
                    'salon_social'         => request('salon_social', null),
                    'turco'                => request('turco', null),
                    'canchas'              => request('canchas', null),
                    'gimnasio'             => request('gimnasio', null),
                    'playground'           => request('playground', null),
                    'barbecue'             => request('barbecue', null),
                    'supermercado'         => request('supermercado', null),
                    'sala_cine'            => request('sala_cine', null),
                    'cafeteria'            => request('cafeteria', null),
                    'restaurante'          => request('restaurante', null),
                    'squash'               => request('squash', null),
                    'obs_dotacion_comunal' => request('obs_dotacion_comunal', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Dotación Comunal editado satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la Dotación Comunal',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
