<?php

namespace App\Traits;

use App\Support\ApiClient as Client;
use App\Support\FalloServicio;
use Exception;

trait MetodosTrait
{
    public function checkDatabaseConnection($rutaPerfil = null)
    {
        try {
            $this->getClientApi()->get('salud');

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
        view()->share('rol', $this->catalogo('roles', 'nombre_rol', 'id_rol'));
        view()->share('cargo', $this->catalogo('cargos', 'descripcion_cargo', 'id_cargo'));
        view()->share('descripcion_documento', $this->catalogo('tipos_documento', 'decripcion_documento', 'id_tipo_documento'));
        view()->share('ciudad', $this->catalogo('ciudades', 'descripcion_ciudad', 'id_ciudad'));
        view()->share('estado', $this->catalogo('estados', 'descripcion_estado', 'id_estado'));

        view()->share('tipo_documento', $this->catalogo('tipos_documento', 'decripcion_documento', 'id_tipo_documento'));
        view()->share('tipo_persona', $this->catalogo('tipos_persona', 'tipo_persona', 'id_tipo_persona'));
        view()->share('paises', $this->catalogo('paises', 'descripcion_pais', 'id_pais'));
        view()->share('departamentos', $this->catalogo('departamentos', 'descripcion_departamento', 'id_departamento_estado'));
        view()->share('ciudades', $this->catalogo('ciudades', 'descripcion_ciudad', 'id_ciudad'));
        view()->share('ciudades_dpto', collect($this->cargarConfiguracionInicial()['ciudades_dpto'] ?? []));
        view()->share('referido_por', $this->catalogo('referidos', 'referido_por', 'id_referido_por'));
        view()->share('red_social', $this->catalogo('redes_sociales', 'red_social', 'id_red_social'));
        view()->share('dirigido_a', $this->catalogo('dirigido_a', 'dirigido_a', 'id_dirigido_a'));
        view()->share('avaluador', $this->catalogo('avaluadores', 'nombres', 'id_usuario'));
        view()->share('tipo_vivienda', $this->catalogo('tipos_vivienda', 'tipo_vivienda', 'id_tipo_vivienda'));
        view()->share('tipo_inmueble', $this->catalogo('tipos_inmueble', 'tipo_inmueble', 'id_tipo_inmueble'));
        view()->share('uso_inmueble', $this->catalogo('usos_inmueble', 'uso_inmueble', 'id_uso_inmueble'));
        view()->share('topografia', $this->catalogo('topografias', 'topografia', 'id_topografia'));
        view()->share('forma', $this->catalogo('formas', 'forma', 'id_forma'));
        view()->share('indicador_numerico', $this->catalogo('indicadores_numericos', 'indicador_numerico', 'id_indicador_numerico'));
        view()->share('si_no', $this->catalogo('si_no', 'descripcion_si_no', 'id_si_no'));
        view()->share('si_no_calendario', $this->catalogo('si_no_calendario', 'descripcion_si_no', 'id_si_no'));
        view()->share('sistema_constructivo', $this->catalogo('sistemas_constructivos', 'sistema_constructivo', 'id_sistema_constructivo'));
        view()->share('puertas_material', $this->catalogo('puertas_material', 'puertas_material', 'id_puertas_material'));
        view()->share('tipo_fachada', $this->catalogo('tipos_fachada', 'tipo_fachada', 'id_tipo_fachada'));
        view()->share('tipo_muro', $this->catalogo('tipos_muro', 'tipo_muro', 'id_tipo_muro'));
        view()->share('ventaneria', $this->catalogo('ventanerias', 'ventaneria', 'id_ventaneria'));
        view()->share('tipo_techo', $this->catalogo('tipos_techo', 'tipo_techo', 'id_tipo_techo'));
        view()->share('tipo_suelo', $this->catalogo('tipos_suelo', 'descripcion_tipo_suelo', 'id_tipo_suelo'));
        view()->share('condicion_inmueble', $this->catalogo('condiciones_inmueble', 'condicion_inmueble', 'id_condicion_inmueble'));
        view()->share('calificacion_fitto_corvini', $this->catalogo('fitto_corvini', 'fitto_corvini', 'id_fitto_corvini'));
        view()->share('valorizacion', $this->catalogo('valorizaciones', 'valorizacion', 'id_valorizacion'));
        view()->share('calificacion_general', $this->catalogo('calificaciones_generales', 'calificacion_general', 'id_calificacion_general'));
        view()->share('tipo_vias', $this->catalogo('tipos_vias', 'tipo_vias', 'id_tipo_vias'));
        view()->share('tipo_piso', $this->catalogo('tipos_piso', 'tipo_pisos', 'id_tipo_piso'));
        view()->share('tipo_banio', $this->catalogo('tipos_banio', 'tipo_banio', 'id_tipo_banio'));
        view()->share('tipo_cocina', $this->catalogo('tipos_cocina', 'tipo_cocina', 'id_tipo_cocina'));
        view()->share('tipo_meson', $this->catalogo('tipos_meson', 'tipo_meson', 'id_tipo_meson'));
        view()->share('comunas', $this->catalogo('comunas', 'comuna', 'id_comuna'));
        view()->share('factor_calidad', $this->catalogo('factores_calidad', 'factor_calidad', 'id_factor_calidad'));
        view()->share('factor_zona', $this->catalogo('factores_zona', 'factor_zona', 'id_factor_zona'));
        view()->share('factor_tiempo', $this->catalogo('factores_tiempo', 'factor_tiempo', 'id_factor_tiempo'));
        view()->share('factor_pendiente', $this->catalogo('factores_pendiente', 'factor_pendiente', 'id_factor_pendiente'));
        view()->share('factor_ubicacion', $this->catalogo('factores_ubicacion', 'factor_ubicacion', 'id_factor_ubicacion'));
        view()->share('estado_conservacion_opciones', $this->catalogo('estados_conservacion', 'estado_conservacion_opciones', 'id_estado_conservacion_opciones'));
        
        view()->share('roles', $this->filas('roles'));
    }

    

    private function catalogo($clave, $etiqueta, $id)
    {
        $data = $this->cargarConfiguracionInicial();

        return collect($data[$clave] ?? [])->pluck($etiqueta, $id);
    }

    private function filas($clave)
    {
        $data = $this->cargarConfiguracionInicial();

        return collect($data[$clave] ?? [])->map(function ($fila) {
            return (object) $fila;
        });
    }
}
