<?php

namespace App\Http\Responsable\visita;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Persona;
use App\Models\Usuario;
use Jenssegers\Date\Date;
use App\Models\Visita;
use App\Models\InfoJuridica;
use App\Models\InfoInmueble;
use App\Models\CaracteristicasInmueble;
use App\Models\AcabadosInmueble;
use App\Models\CalificacionInmueble;
use App\Models\DotacionComunal;
use App\Models\InfoSector;
use App\Models\CondicionesUrbanisticas;
use App\Models\ObservacionesGenerales;
use App\Models\RegistroFotografico;
use App\Models\ValorEstimadoAvaluo;

class VisitaInfoJuridicaUpdate implements Responsable
{
    public function toResponse($request)
    {
        $id_visita = request('id_visita', null);
        $propietario1 = strtoupper(request('propietario_1', null));
        $docPropietario1 = request('doc_propietario_1', null);
        $propietario2 = strtoupper(request('propietario_2', null));
        $docPropietario2 = request('doc_propietario_2', null);
        $matriculaInmueble = request('matricula_inmueble', null);
        $coeficienteCopropiedad = request('coeficiente_copropiedad', null);
        $certificadoLibertad = strtoupper(request('certificado_libertad', null));
        $escrituraPublica = strtoupper(request('escritura_publica', null));
        $notaria = strtoupper(request('notaria', null));
        $impuestoPredialAnual = request('impuesto_predial_anual', null);
        $administracion = request('administracion', null);
        $avaluoCatastral = request('avaluo_catastral', null);
        $normasUsos = request('normas_usos', null);
        $mejorMayorUso = request('mejor_mayor_uso', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarInfoJuridica = InfoJuridica::where('id_visita', $id_visita)
                ->update([
                    'propietario1' => $propietario1,
                    'doc_propietario1' => $docPropietario1,
                    'propietario2' => $propietario2,
                    'doc_propietario2' => $docPropietario2,
                    'matricula_inmueble' => $matriculaInmueble,
                    'coeficiente_copropiedad' => $coeficienteCopropiedad,
                    'certificado_libertad' => $certificadoLibertad,
                    'escritura_publica' => $escrituraPublica,
                    'notaria' => $notaria,
                    'imp_predial_anual' => $impuestoPredialAnual,
                    'administracion' => $administracion,
                    'avaluo_catastral' => $avaluoCatastral,
                    'normas_usos' => $normasUsos,
                    'mejor_mayor_uso' => $mejorMayorUso,
            ]);

            if($editarInfoJuridica) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Info Jurídica editada satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Información Jurídica, por favor contacte a Soporte.');
                return redirect('editar_visita/'.$idVisita);
                // return redirect('editar_visita/'.$id_visita.'/actualizar#nav-familiar');
            }
        }
        catch (Exception $e)
        {
            dd($e);
            DB::connection('mysql')->rollback();
            alert()->error('Error', 'Error excepción, intente de nuevo, si el problema persiste, contacte a Soporte.');
            return back();
        }
    }
}
