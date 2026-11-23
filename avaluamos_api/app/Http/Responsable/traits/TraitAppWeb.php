<?php

namespace App\Http\Responsable\traits;

use App\Models\CalificacionGeneral;
use App\Models\Cargo;
use App\Models\Ciudad;
use App\Models\Comuna;
use App\Models\CondicionInmueble;
use App\Models\DepartamentoEstado;
use App\Models\DirigidoA;
use App\Models\Estado;
use App\Models\EstadoConservacionOpciones;
use App\Models\FactorCalidad;
use App\Models\FactorPendiente;
use App\Models\FactorTiempo;
use App\Models\FactorUbicacion;
use App\Models\FactorZona;
use App\Models\FittoCorvini;
use App\Models\Forma;
use App\Models\IndicadorNumerico;
use App\Models\Pais;
use App\Models\PuertasMaterial;
use App\Models\RedSocial;
use App\Models\ReferidoPor;
use App\Models\Role;
use App\Models\SiNo;
use App\Models\SistemaConstructivo;
use App\Models\TipoBanio;
use App\Models\TipoCocina;
use App\Models\TipoDocumento;
use App\Models\TipoFachada;
use App\Models\TipoInmueble;
use App\Models\TipoMeson;
use App\Models\TipoMuro;
use App\Models\TipoPersona;
use App\Models\TipoPiso;
use App\Models\TipoSuelo;
use App\Models\TipoTecho;
use App\Models\TipoVias;
use App\Models\TipoVivienda;
use App\Models\Topografia;
use App\Models\UsoInmueble;
use App\Models\Usuario;
use App\Models\Valorizacion;
use App\Models\Ventaneria;
use Exception;
use Illuminate\Support\Facades\DB;

class TraitAppWeb
{
    public function getConfigInicial()
    {
        try {
            return response()->json([
                'roles' => Role::where('guard_name', 'web')
                    ->orderBy('name', 'asc')
                    ->get(['id', 'name'])
                    ->map(function ($rol) {
                        return [
                            'id' => $rol->id,
                            'name' => $rol->name,
                            'id_rol' => $rol->id,
                            'nombre_rol' => $rol->name,
                        ];
                    })
                    ->values(),
                'cargos' => Cargo::orderBy('descripcion_cargo', 'asc')->get(['id_cargo', 'descripcion_cargo']),
                'tipos_documento' => TipoDocumento::orderBy('decripcion_documento', 'asc')->get(['id_tipo_documento', 'decripcion_documento']),
                'ciudades' => Ciudad::orderBy('descripcion_ciudad', 'asc')->get(['id_ciudad', 'descripcion_ciudad']),
                'estados' => Estado::orderBy('descripcion_estado', 'asc')->get(['id_estado', 'descripcion_estado']),
                'tipos_persona' => TipoPersona::orderBy('tipo_persona', 'asc')->get(['id_tipo_persona', 'tipo_persona']),
                'paises' => Pais::orderBy('descripcion_pais', 'asc')->get(['id_pais', 'descripcion_pais']),
                'departamentos' => DepartamentoEstado::orderBy('descripcion_departamento', 'asc')->get(['id_departamento_estado', 'descripcion_departamento']),
                'referidos' => ReferidoPor::orderBy('referido_por', 'asc')->get(['id_referido_por', 'referido_por']),
                'redes_sociales' => RedSocial::orderBy('red_social', 'asc')->get(['id_red_social', 'red_social']),
                'dirigido_a' => DirigidoA::orderBy('dirigido_a', 'asc')->get(['id_dirigido_a', 'dirigido_a']),
                'avaluadores' => Usuario::orderBy('nombres', 'asc')
                    ->whereHas('roles', function ($q) {
                        $q->whereIn('name', ['Administrador', 'Avaluador', 'Empleado']);
                    })
                    ->get(['id_usuario', 'nombres']),
                'tipos_vivienda' => TipoVivienda::orderBy('tipo_vivienda', 'asc')->get(['id_tipo_vivienda', 'tipo_vivienda']),
                'tipos_inmueble' => TipoInmueble::orderBy('tipo_inmueble', 'asc')->get(['id_tipo_inmueble', 'tipo_inmueble']),
                'usos_inmueble' => UsoInmueble::orderBy('uso_inmueble', 'asc')->get(['id_uso_inmueble', 'uso_inmueble']),
                'topografias' => Topografia::orderBy('topografia', 'asc')->get(['id_topografia', 'topografia']),
                'formas' => Forma::orderBy('forma', 'asc')->get(['id_forma', 'forma']),
                'indicadores_numericos' => IndicadorNumerico::orderBy('id_indicador_numerico', 'asc')->get(['id_indicador_numerico', 'indicador_numerico']),
                'si_no' => SiNo::orderBy('id_si_no', 'asc')->get(['id_si_no', 'descripcion_si_no']),
                'si_no_calendario' => SiNo::orderBy('descripcion_si_no', 'asc')->whereIn('id_si_no', [1, 2])->get(['id_si_no', 'descripcion_si_no']),
                'sistemas_constructivos' => SistemaConstructivo::orderBy('sistema_constructivo', 'asc')->get(['id_sistema_constructivo', 'sistema_constructivo']),
                'puertas_material' => PuertasMaterial::orderBy('puertas_material', 'asc')->get(['id_puertas_material', 'puertas_material']),
                'tipos_fachada' => TipoFachada::orderBy('tipo_fachada', 'asc')->get(['id_tipo_fachada', 'tipo_fachada']),
                'tipos_muro' => TipoMuro::orderBy('tipo_muro', 'asc')->get(['id_tipo_muro', 'tipo_muro']),
                'ventanerias' => Ventaneria::orderBy('ventaneria', 'asc')->get(['id_ventaneria', 'ventaneria']),
                'tipos_techo' => TipoTecho::orderBy('tipo_techo', 'asc')->get(['id_tipo_techo', 'tipo_techo']),
                'tipos_suelo' => TipoSuelo::orderBy('descripcion_tipo_suelo', 'asc')->get(['id_tipo_suelo', 'descripcion_tipo_suelo']),
                'condiciones_inmueble' => CondicionInmueble::orderBy('condicion_inmueble', 'asc')->get(['id_condicion_inmueble', 'condicion_inmueble']),
                'fitto_corvini' => FittoCorvini::orderBy('fitto_corvini', 'asc')->get(['id_fitto_corvini', 'fitto_corvini']),
                'valorizaciones' => Valorizacion::orderBy('valorizacion', 'asc')->get(['id_valorizacion', 'valorizacion']),
                'calificaciones_generales' => CalificacionGeneral::orderBy('id_calificacion_general', 'asc')->get(['id_calificacion_general', 'calificacion_general']),
                'tipos_vias' => TipoVias::orderBy('tipo_vias', 'asc')->get(['id_tipo_vias', 'tipo_vias']),
                'tipos_piso' => TipoPiso::orderBy('tipo_pisos', 'asc')->get(['id_tipo_piso', 'tipo_pisos']),
                'tipos_banio' => TipoBanio::orderBy('id_tipo_banio', 'asc')->get(['id_tipo_banio', 'tipo_banio']),
                'tipos_cocina' => TipoCocina::orderBy('id_tipo_cocina', 'asc')->get(['id_tipo_cocina', 'tipo_cocina']),
                'tipos_meson' => TipoMeson::orderBy('tipo_meson', 'asc')->get(['id_tipo_meson', 'tipo_meson']),
                'comunas' => Comuna::orderBy('comuna', 'asc')->get(['id_comuna', 'comuna']),
                'factores_calidad' => FactorCalidad::orderBy('factor_calidad', 'asc')->get(['id_factor_calidad', 'factor_calidad']),
                'factores_zona' => FactorZona::orderBy('factor_zona', 'asc')->get(['id_factor_zona', 'factor_zona']),
                'factores_tiempo' => FactorTiempo::orderBy('id_factor_tiempo', 'asc')->get(['id_factor_tiempo', 'factor_tiempo']),
                'factores_pendiente' => FactorPendiente::orderBy('id_factor_pendiente', 'asc')->get(['id_factor_pendiente', 'factor_pendiente']),
                'factores_ubicacion' => FactorUbicacion::orderBy('id_factor_ubicacion', 'asc')->get(['id_factor_ubicacion', 'factor_ubicacion']),
                'estados_conservacion' => EstadoConservacionOpciones::orderBy('estado_conservacion_opciones', 'asc')->get(['id_estado_conservacion_opciones', 'estado_conservacion_opciones']),
                'ciudades_dpto' => DB::table('ciudad')
                    ->leftJoin('departamento_estado', 'departamento_estado.id_departamento_estado', '=', 'ciudad.id_departamento_estado')
                    ->select(
                        'ciudad.id_ciudad',
                        DB::raw("CONCAT(ciudad.descripcion_ciudad, '-', departamento_estado.descripcion_departamento) as ciudadDpto")
                    )
                    ->orderBy('ciudadDpto', 'asc')
                    ->pluck('ciudadDpto', 'id_ciudad'),
                'usuarios' => DB::table('usuarios')
                    ->leftJoin('tipo_documento', 'tipo_documento.id_tipo_documento', '=', 'usuarios.id_tipo_documento')
                    ->leftJoin('roles', 'roles.id', '=', 'usuarios.id_rol')
                    ->leftJoin('cargo', 'cargo.id_cargo', '=', 'usuarios.id_cargo')
                    ->leftJoin('estado', 'estado.id_estado', '=', 'usuarios.id_estado')
                    ->select(
                        'usuarios.id_usuario',
                        'usuarios.nombre_usuario',
                        'usuarios.nombres',
                        'usuarios.apellidos',
                        'tipo_documento.id_tipo_documento',
                        'tipo_documento.decripcion_documento',
                        'usuarios.numero_documento',
                        'usuarios.correo',
                        'usuarios.celular',
                        'roles.id as id_rol',
                        'roles.name as nombre_rol',
                        'cargo.id_cargo',
                        'cargo.descripcion_cargo',
                        'estado.id_estado',
                        'estado.descripcion_estado'
                    )
                    ->get(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error cargando configuración.',
                'detalle' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }
}
