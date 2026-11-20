<?php

namespace App\Http\Responsable\avaluos\update;

use App\Models\InfoJuridica;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class AvaluoInfoJuridicaUpdate implements Responsable
{
    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            InfoJuridica::where('id_visita', $this->idVisita)
                ->update([
                    'propietario1'            => request('propietario1', null),
                    'doc_propietario1'        => request('doc_propietario1', null),
                    'propietario2'            => request('propietario2', null),
                    'doc_propietario2'        => request('doc_propietario2', null),
                    'matricula_inmueble'      => request('matricula_inmueble', null),
                    'coeficiente_copropiedad' => request('coeficiente_copropiedad', null),
                    'certificado_libertad'    => request('certificado_libertad', null),
                    'escritura_publica'       => request('escritura_publica', null),
                    'notaria'                 => request('notaria', null),
                    'imp_predial_anual'       => request('imp_predial_anual', null),
                    'administracion'          => request('administracion', null),
                    'avaluo_catastral'        => request('avaluo_catastral', null),
                    'normas_usos'             => request('normas_usos', null),
                    'mejor_mayor_uso'         => request('mejor_mayor_uso', null),
                ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Info Jurídica editada satisfactoriamente',
                'id_visita' => $this->idVisita,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error excepción al editar la Información Jurídica',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
