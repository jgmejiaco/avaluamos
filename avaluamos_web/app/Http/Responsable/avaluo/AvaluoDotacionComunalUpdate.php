<?php

namespace App\Http\Responsable\avaluo;

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

class AvaluoDotacionComunalUpdate implements Responsable
{
    public function toResponse($request)
    {
        $idVisita = request('id_visita', null);
        $porteria24 = request('porteria_24', null);
        $parqueoComun = request('parqueo_comun', null);
        $juegosInfantiles = request('juegos_infantiles', null);
        $zonaMascotas = request('zona_mascotas', null);
        $piscinas = request('piscinas', null);
        $zonasVerdes = request('zonas_verdes', null);
        $sauna = request('sauna', null);
        $salonSocial = request('salon_social', null);
        $turco = request('turco', null);
        $canchas = request('canchas', null);
        $gimnasio = request('gimnasio', null);
        $playground = request('playground', null);
        $barbecue = request('barbecue', null);
        $supermercado = request('supermercado', null);
        $salaCine = request('sala_cine', null);
        $cafeteria = request('cafeteria', null);
        $restaurante = request('restaurante', null);
        $squash = request('squash', null);
        $obsDotacionComunal = request('obs_dotacion_comunal', null);

        // ==============================================================================
        // ==============================================================================

        DB::connection('mysql')->beginTransaction();

        try {
            $editarDotacionComunal = DotacionComunal::where('id_visita', $idVisita)
                ->update([
                    'porteria_24' => $porteria24,
                    'parqueo_comun' => $parqueoComun,
                    'juegos_infantiles' => $juegosInfantiles,
                    'zona_mascotas' => $zonaMascotas,
                    'piscinas' => $piscinas,
                    'zonas_verdes' => $zonasVerdes,
                    'sauna' => $sauna,
                    'salon_social' => $salonSocial,
                    'turco' => $turco,
                    'canchas' => $canchas,
                    'gimnasio' => $gimnasio,
                    'playground' => $playground,
                    'barbecue' => $barbecue,
                    'supermercado' => $supermercado,
                    'sala_cine' => $salaCine,
                    'cafeteria' => $cafeteria,
                    'restaurante' => $restaurante,
                    'squash' => $squash,
                    'obs_dotacion_comunal' => $obsDotacionComunal
            ]);

            if($editarDotacionComunal) {
                DB::connection('mysql')->commit();
                alert()->success('Proceso Exitoso', 'Dotación Comunal editado satisfactoriamente');
                return redirect('editar_visita/'.$idVisita);

            } else {
                DB::connection('mysql')->rollback();
                alert()->error('Error', 'Error al editar la Dotación Comunal, por favor contacte a Soporte.');
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
