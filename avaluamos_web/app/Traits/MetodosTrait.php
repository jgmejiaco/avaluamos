<?php

namespace App\Traits;

use App\Support\ApiClient as Client;
use App\Support\FalloServicio;
use Exception;

trait MetodosTrait
{
    public function connectionBdCheck($rutaPerfil = null)
    {
        try {
            $this->getClientApi()->get('connection_bd_check');

            if (is_string($rutaPerfil) && $rutaPerfil !== '') {
                return view($rutaPerfil);
            }

            return response()->json(['status' => 'ok']);
        } catch (Exception $e) {
            return FalloServicio::respuesta(request());
        }
    }

    // ==========================================================================

    public function quitarCaracteresEspeciales($cadena)
    {
        $no_permitidas = [
            'á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'À', 'Ã', 'Ì', 'Ò', 'Ù', 'Ã™', 'Ã ',
            'Ã¨', 'Ã¬', 'Ã²', 'Ã¹', 'ç', 'Ç', 'Ã¢', 'ê', 'Ã®', 'Ã´', 'Ã»', 'Ã‚', 'ÃŠ', 'ÃŽ', 'Ã”',
            'Ã›', 'ü', 'Ã¶', 'Ã–', 'Ã¯', 'Ã¤', '«', 'Ò', 'Ã', 'Ã„', 'Ã‹', 'ñ', 'Ñ', '*',
        ];

        $permitidas = [
            'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'n', 'N', 'A', 'E', 'I', 'O', 'U',
            'a', 'e', 'i', 'o', 'u', 'c', 'C', 'a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
            'u', 'o', 'O', 'i', 'a', 'e', 'U', 'I', 'A', 'E', 'n', 'N', '',
        ];

        return str_replace($no_permitidas, $permitidas, $cadena);
    }

    // ==========================================================================

    /**
     * JUAN GUILLERMO → Juan Guillermo | MEJÍA CORREA → Mejía Correa
     */
    public function formatoNombrePropio(?string $texto): ?string
    {
        if ($texto === null || trim($texto) === '') {
            return $texto;
        }

        return mb_convert_case(trim($texto), MB_CASE_TITLE, 'UTF-8');
    }

    // ==========================================================================

    protected $baseUri;
    protected $clientApi;
    protected $configData = null;


    /**
     * Cliente HTTP compartido durante el request.
     * La configuración (base_uri, timeouts, JWT) vive en AppServiceProvider.
     */
     protected function getClientApi()
     {
         $this->baseUri = rtrim((string) config('services.api.base_uri'), '/');
 
         if (! $this->clientApi) {
             $this->clientApi = app(Client::class);
         }
 
         return $this->clientApi;
     }

    public function cargarConfiguracionInicial()
    {
        try {
            if ($this->configData === null) {
                $cliente = $this->getClientApi();
                $response = $cliente->get('config_inicial_trait');
                $this->configData = json_decode($response->getBody()->getContents(), true);
            }

            return $this->configData;
        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            alert()->error('Error', 'No se pudo cargar la configuración inicial.');

            return [];
        }
    }

    public function shareData()
    {
        view()->share('rol', $this->pluckSelect('roles', 'nombre_rol', 'id_rol'));
        view()->share('cargo', $this->pluckSelect('cargos', 'descripcion_cargo', 'id_cargo'));
        view()->share('descripcion_documento', $this->pluckSelect('tipos_documento', 'decripcion_documento', 'id_tipo_documento'));
        view()->share('ciudad', $this->pluckSelect('ciudades', 'descripcion_ciudad', 'id_ciudad'));
        view()->share('estado', $this->pluckSelect('estados', 'descripcion_estado', 'id_estado'));
        view()->share('tipo_documento', $this->pluckSelect('tipos_documento', 'decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_persona', $this->pluckSelect('tipos_persona', 'tipo_persona', 'id_tipo_persona'));
        view()->share('paises', $this->pluckSelect('paises', 'descripcion_pais', 'id_pais'));
        view()->share('departamentos', $this->pluckSelect('departamentos', 'descripcion_departamento', 'id_departamento_estado'));
        view()->share('ciudades', $this->pluckSelect('ciudades', 'descripcion_ciudad', 'id_ciudad'));
        view()->share('referido_por', $this->pluckSelect('referidos', 'referido_por', 'id_referido_por'));
        view()->share('red_social', $this->pluckSelect('redes_sociales', 'red_social', 'id_red_social'));
        view()->share('dirigido_a', $this->pluckSelect('dirigido_a', 'dirigido_a', 'id_dirigido_a'));
        view()->share('avaluador', $this->pluckSelect('avaluadores', 'nombres', 'id_usuario'));
        view()->share('tipo_vivienda', $this->pluckSelect('tipos_vivienda', 'tipo_vivienda', 'id_tipo_vivienda'));
        view()->share('tipo_inmueble', $this->pluckSelect('tipos_inmueble', 'tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('uso_inmueble', $this->pluckSelect('usos_inmueble', 'uso_inmueble', 'id_uso_inmueble'));
        view()->share('topografia', $this->pluckSelect('topografias', 'topografia', 'id_topografia'));
        view()->share('forma', $this->pluckSelect('formas', 'forma', 'id_forma'));
        view()->share('indicador_numerico', $this->pluckSelect('indicadores_numericos', 'indicador_numerico', 'id_indicador_numerico'));
        view()->share('si_no', $this->pluckSelect('si_no', 'descripcion_si_no', 'id_si_no'));
        view()->share('si_no_calendario', $this->pluckSelect('si_no_calendario', 'descripcion_si_no', 'id_si_no'));
        view()->share('sistema_constructivo', $this->pluckSelect('sistemas_constructivos', 'sistema_constructivo', 'id_sistema_constructivo'));
        view()->share('puertas_material', $this->pluckSelect('puertas_material', 'puertas_material', 'id_puertas_material'));
        view()->share('tipo_fachada', $this->pluckSelect('tipos_fachada', 'tipo_fachada', 'id_tipo_fachada'));
        view()->share('tipo_muro', $this->pluckSelect('tipos_muro', 'tipo_muro', 'id_tipo_muro'));
        view()->share('ventaneria', $this->pluckSelect('ventanerias', 'ventaneria', 'id_ventaneria'));
        view()->share('tipo_techo', $this->pluckSelect('tipos_techo', 'tipo_techo', 'id_tipo_techo'));
        view()->share('tipo_suelo', $this->pluckSelect('tipos_suelo', 'descripcion_tipo_suelo', 'id_tipo_suelo'));
        view()->share('condicion_inmueble', $this->pluckSelect('condiciones_inmueble', 'condicion_inmueble', 'id_condicion_inmueble'));
        view()->share('calificacion_fitto_corvini', $this->pluckSelect('fitto_corvini', 'fitto_corvini', 'id_fitto_corvini'));
        view()->share('valorizacion', $this->pluckSelect('valorizaciones', 'valorizacion', 'id_valorizacion'));
        view()->share('calificacion_general', $this->pluckSelect('calificaciones_generales', 'calificacion_general', 'id_calificacion_general'));
        view()->share('tipo_vias', $this->pluckSelect('tipos_vias', 'tipo_vias', 'id_tipo_vias'));
        view()->share('tipo_piso', $this->pluckSelect('tipos_piso', 'tipo_pisos', 'id_tipo_piso'));
        view()->share('tipo_banio', $this->pluckSelect('tipos_banio', 'tipo_banio', 'id_tipo_banio'));
        view()->share('tipo_cocina', $this->pluckSelect('tipos_cocina', 'tipo_cocina', 'id_tipo_cocina'));
        view()->share('tipo_meson', $this->pluckSelect('tipos_meson', 'tipo_meson', 'id_tipo_meson'));
        view()->share('comunas', $this->pluckSelect('comunas', 'comuna', 'id_comuna'));
        view()->share('factor_calidad', $this->pluckSelect('factores_calidad', 'factor_calidad', 'id_factor_calidad'));
        view()->share('factor_zona', $this->pluckSelect('factores_zona', 'factor_zona', 'id_factor_zona'));
        view()->share('factor_tiempo', $this->pluckSelect('factores_tiempo', 'factor_tiempo', 'id_factor_tiempo'));
        view()->share('factor_pendiente', $this->pluckSelect('factores_pendiente', 'factor_pendiente', 'id_factor_pendiente'));
        view()->share('factor_ubicacion', $this->pluckSelect('factores_ubicacion', 'factor_ubicacion', 'id_factor_ubicacion'));
        view()->share('estado_conservacion_opciones', $this->pluckSelect('estados_conservacion', 'estado_conservacion_opciones', 'id_estado_conservacion_opciones'));

        view()->share('ciudades_dpto', collect($this->cargarConfiguracionInicial()['ciudades_dpto'] ?? []));
    } // FIN shareData()

    private function pluckSelect($clave, $etiqueta, $id)
    {
        $data = $this->cargarConfiguracionInicial();

        return collect($data[$clave] ?? [])->pluck($etiqueta, $id);
    }
}
