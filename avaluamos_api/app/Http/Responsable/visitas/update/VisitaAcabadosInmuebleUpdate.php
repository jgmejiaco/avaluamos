<?php

namespace App\Http\Responsable\visitas\update;

use App\Models\AcabadosInmueble;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaAcabadosInmuebleUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            AcabadosInmueble::where('id_visita', $this->idVisita)
                ->update([
                    'id_sistema_constructivo' => request('id_sistema_constructivo', null),
                    'porton_principal'        => request('porton_principal', null),
                    'id_tipo_fachada'         => request('id_tipo_fachada', null),
                    'puertas'                 => request('puertas', null),
                    'id_tipo_muro'            => request('id_tipo_muro', null),
                    'id_ventaneria'           => request('id_ventaneria', null),
                    'id_tipo_techo'           => request('id_tipo_techo', null),
                    'servicios_publicos'      => request('servicios_publicos', null),
                    'pisos'                   => request('pisos', null),
                    'telefono'                => request('telefono', null),
                    'banios'                  => request('banios', null),
                    'energia'                 => request('energia', null),
                    'cocina'                  => request('cocina', null),
                    'agua'                    => request('agua', null),
                    'meson'                   => request('meson', null),
                    'gas'                     => request('gas', null),
                    'patios'                  => request('patios', null),
                    'obs_acabados_inmueble'   => request('obs_acabados_inmueble', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Acabados Inmueble editado satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar los Acabados Inmueble',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
