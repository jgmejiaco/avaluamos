<?php

namespace App\Clases\Custom;

use App\Models\Informe;
use Jenssegers\Date\Date;
use App\Models\InformeCampo;
use App\Traits\CamposInforme;
use App\Models\InformeInnerJoin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

/**
 * Formatea los datos enviados y responde con una tabla en html
 */
class FormatoInformes
{
    use CamposInforme;

    public $excel;

    public function __construct($excel = false)
    {
        $this->excel = $excel;
    }

    public function carga($datos)
    {
        if (array_key_exists('checkbox', $datos)) {//verifica si algun check esta seleccionado

            $keys = array();
            $reqFiltro = array();
            $reqChecks = $datos['checkbox'];//se obtienen los checks
            $innerJoinPrincipal = "";
            $groupByPrincipal = "";
            $links = array();
            $idsJoins = array();
            if (array_key_exists('filtro', $datos)) {//verifica si contiene algun filtro y obtiene los keys y valores
                foreach ($datos['filtro'] as $key => $value) {
                    if ($value != "-1" && $value != "") {
                        array_push($keys, $key);
                        $reqFiltro[$key] = $value;
                        $joins = InformeInnerJoin::select('id', 'inner_join')
                            ->where('infxcampos', 'like', "%|" . $key . "|%")->orderBy('id')->get();
                        if (!empty($joins)) {
                            foreach ($joins as $join) {
                                $innerJoinPrincipal .= in_array($join->id, $idsJoins) ? "" : $join->inner_join . " ";//concatena todos los inner_join
                                array_push($idsJoins, $join->id);
                            }
                        }
                    }
                }
            }

            foreach ($reqChecks as $value) {//recorre todos los checks y consulta los inner_join que esten relacionados
                $joins = InformeInnerJoin::select('id', 'inner_join')
                    ->where('infxcampos', 'like', "%|" . $value . "|%")->orderBy('id')->get();
                if (!empty($joins)) {
                    foreach ($joins as $join) {
                        $innerJoinPrincipal .= in_array($join->id, $idsJoins) ? "" : $join->inner_join . " ";//concatena todos los inner_join
                        array_push($idsJoins, $join->id);
                    }
                }
            }
            //consultas
            $filtros = InformeCampo::orderBy('filtro_orden', 'ASC')->find($keys);//consulta la informacion de los filtros
            $checkbox = InformeCampo::orderBy('filtro_orden', 'ASC')->find($reqChecks);//consulta la informacion de los checkbox
            $informe = Informe::where('inf_codigo', $checkbox[0]->inf_codigo)->first();//se obtiene el nombre de la tabla
            $titulos = $checkbox->pluck('cam_descripcion')->toArray();//se obtienen los titulos
            $indices = array();
            //fin consultas
            $select = trim(implode(',', $checkbox->pluck('cam_select_sql')->toArray()), ',');//prepara los select los separa por comas y quita la ultima
            $groupBy = $checkbox->where('cam_agrupar', true)->pluck('cam_select_sql')->toArray();//obtiene de los checks los campos que se puedan agrupar
            foreach ($groupBy as $value) {
                if (($pos = strpos($value, ' AS ')) == 0) {
                    $nombreDB = $value;
                } else {
                    $nombreDB = substr($value, $pos + 4);
                }
                $groupByPrincipal .= $nombreDB . ',';//los va agrupando y sepeandolos por coma
            }
            $cam_select_sql = $checkbox->pluck('cam_select_sql')->toArray();//obtiene los selects para armar los incides que se utilizan para los campos
            foreach ($cam_select_sql as $key => $value) {
                if (($pos = strpos($value, ' AS ')) == 0) {
                    $nombreDB = $value;
                } else {
                    $nombreDB = substr($value, $pos + 4);
                }
                array_push($indices, $nombreDB);
            }
            $cam_link = $checkbox->where('cam_link')->pluck('cam_select_sql', 'cam_link')->toArray();// obtiene los campos que tengan links
            foreach ($cam_link as $key => $value) {
                if (($pos = strpos($value, ' AS ')) == 0) {
                    $nombreDB = $value;
                } else {
                    $nombreDB = substr($value, $pos + 4);
                }

                $links[$nombreDB] = $key;
            }
            $tipoCampos = $checkbox->pluck('cam_tipo')->toArray();//tipos de campos para el switch
            $tabla = $informe ? $informe->tabla_principal : "";//saca el nombre de la tabla
            $where_principal = $informe ? $informe->where_principal : "";//where principal
            $groupByPrincipal = $groupByPrincipal == "" ? "" : substr_replace($groupByPrincipal, "GROUP BY ", 0, 0);//verifica si hay algun group by
            //contiene todos los resultados para la ejecucion de la consulta
            
            // ==============================================

            if ($tipoCampos[0] == 18) {
                unset($titulos);
                $titulos[0] = "PLACA";
                $titulos[1] = "TIPO MTTO";
                $titulos[2] = "ESTADO MTTO";
                $titulos[3] = "PROPIETARIO";
                $titulos[4] = "MUNICIPIO";
                $titulos[5] = "TIPO VEHÍCULO";
                $titulos[7] = "ESTADO";
                $titulos[8] = "ÚLTIMO KM";
                $titulos[9] = "KM CHECKLIST";
                $titulos[11] = "PRÓXIMO MTTO KM";
                $titulos[10] = "ALERTA";
                $titulos[12] = "USUARIO";
            }

            // ==============================================

            if ($tipoCampos[0] == 19) {
                unset($titulos);
                $titulos[0] = "Cliente Código";
                $titulos[1] = "Cliente Nombre";
                $titulos[2] = "Valor Inventario Cliente";
                $titulos[3] = "Valor Póliza Cliente";
                $titulos[4] = "Valor Excedente";
                $titulos[5] = "Fecha Vencimiento Póliza";
                $titulos[6] = "Promedio Inventario";
            }

            // ==============================================

            if ($informe->inf_codigo == 141) {
                if (in_array(11102, $reqChecks)) {
                    $where_principal = " WHERE periodo_ventas >= 1659330000 AND venta.forma_pago IN (4,6)";
                }
            }

            // ==============================================

            if ($informe->inf_codigo == 129) {
                if ($where_principal != "") {
                    $where_principal .= " AND factura.empresa_id = {$datos['empresa_id']}";
                } else {
                    $where_principal .= " factura.empresa_id = {$datos['empresa_id']}";
                }
            }

            // ==============================================

            if (auth()->user()->emp_codigo != 1) {
                if ($informe->inf_codigo == 134) {
                    if ($where_principal != "") {
                        $where_principal .= " AND envio.sucursal_id = {$datos['empresa_id']}";
                    } else {
                        $where_principal .= " WHERE envio.sucursal_id = {$datos['empresa_id']}";
                    }
                }
            }

            // =======================================================================================
            // INFORME GERENCIAL MTTO VEHÍCULOS, CAMPO PERSONALIZADO
            $checkboxInfxcamCodigo = $checkbox[0]->infxcam_codigo;

            if ($informe->inf_codigo == 139 && $checkboxInfxcamCodigo == 18985) {
                $select = "sv.placa as placa,tm.mtto_descripcion as mtto_descripcion,em.estado_mtto as estado_mtto,propietario.nombre as propietario,municipio.nombre as municipio,tv.tipveh_descripcion as tipveh_descripcion,case when sv.deleted_at is null then 'Activo' else 'Inactivo' end as estado,MAX(mv.km_mtto) as ultimo_km,(select max(kilometraje) from check_list.registros r where placa = sv.placa) as km_check";

                $tabla = "polizas.mantenimiento_vehiculos mv";

                $where_principal = "where mv.id_tipo_mtto = 1 and tv.tipveh_codigo not in (2) and mv.id_estado_mtto = 1";

                $innerJoinPrincipal = "left join polizas.seguro_vehiculo sv on sv.segaut_codigo = mv.segaut_codigo left join polizas.tipo_mantenimiento tm on tm.id_tipo_mtto = mv.id_tipo_mtto left join polizas.estado_mantenimiento em on em.id = mv.id_estado_mtto left join public.usuarios usu on usu.usu_codigo = mv.usu_codigo left join facturacion.companias propietario on propietario.id_compania = sv.propietario_comp left join geografia.municipios as municipio on municipio.id = sv.ciu_codigo_ubicacion left join polizas.tipo_vehiculo tv on tv.tipveh_codigo = sv.tipveh_codigo";

                $groupByPrincipal = "GROUP BY sv.placa,mtto_descripcion,estado_mtto,km_check,propietario.nombre,municipio.nombre,tipveh_descripcion,estado";
            }
            // =======================================================================================

            // =======================================================================================
            // INFORME GERENCIAL INVENTARIO, CAMPO PERSONALIZADO
            if ($informe->inf_codigo == 147 && $checkboxInfxcamCodigo == 19010) {
                $select = "clientes.cli_codigo AS cliente_codigo,clientes.cli_descripcion AS nombre_cliente,
                ROUND(SUM(inventario.precio)) AS valor_inventario_cliente,CASE WHEN (clientes.valor_poliza) IS NULL THEN 0 ELSE (ROUND(clientes.valor_poliza)) END AS valor_poliza_cliente,CASE WHEN (ROUND(SUM(inventario.precio)) - (CASE WHEN (clientes.valor_poliza) IS NULL THEN 0 ELSE (ROUND(clientes.valor_poliza)) END) < 0) THEN 0 ELSE (ROUND(SUM(inventario.precio)) - (CASE WHEN (clientes.valor_poliza) IS NULL THEN 0 ELSE (ROUND(clientes.valor_poliza)) END)) END AS valor_excedente,to_char(to_timestamp(clientes.fecha_vencimiento_poliza), 'DD-MM-YYYY') AS fecha_vencimiento_poliza,ROUND(AVG(promedios_inventario.valor_inventario)) AS promedio_inventario";

                $tabla = "logistica_binoc.inventario";

                $where_principal = "WHERE clientes.estado IS TRUE AND clientes.cli_codigo NOT IN (8) AND inventario.est_codigo IN (1, 9) AND promedios_inventario.fecha = (SELECT MAX(fecha) FROM logistica_binoc.promedios_inventario GROUP BY fecha ORDER BY fecha DESC LIMIT 1)";

                $innerJoinPrincipal = "LEFT JOIN logistica_binoc.referencias ON referencias.ref_codigo = inventario.ref_codigo LEFT JOIN logistica.clientes ON clientes.cli_codigo = referencias.cli_codigo LEFT JOIN logistica_binoc.promedios_inventario on promedios_inventario.cliente_id = clientes.cli_codigo";

                $groupByPrincipal = "GROUP BY cliente_codigo,nombre_cliente,valor_poliza_cliente,fecha_vencimiento_poliza";
            }
            // =======================================================================================

            $reglas = [
                'queryPrincipal' => "SELECT {$select} FROM {$tabla} ",
                'primerWhere' => $where_principal != "" ? false : true,
                'where' => $where_principal,
                'join' => $innerJoinPrincipal != "" ? $innerJoinPrincipal : "",
                'groupBy' => trim($groupByPrincipal, ',')
            ];

            $reglas = $this->whereCkecks($checkbox, $reglas);
            foreach ($filtros as $filtro) {
                switch ($filtro->filtro_tipo) {
                    case 1:
                        $reglas = $this->inputSelect($reqFiltro, $filtro, $reglas);
                        break;
                    case 2:
                        //$reglas = $this->inputFecha($reqFiltro, $filtro, $reglas);
                        break;
                    case 3:
                        $reglas = $this->inputRangoNumeros($reqFiltro, $filtro, $reglas);
                        break;
                    case 4:
                        $reglas = $this->inputText($reqFiltro, $filtro, $reglas);
                        break;
                    case 5:
                        $reglas = $this->inputFechaTimestamp($reqFiltro, $filtro, $reglas);
                        break;
                    case 6:
                        $reglas = $this->inputFechaDate($reqFiltro, $filtro, $reglas);
                        break;
                    case 7:
                        $reglas = $this->inputTextExacto($reqFiltro, $filtro, $reglas);
                        break;
                    case 9:
                        $reglas = $this->inputFechaDateCompareToDate($reqFiltro, $filtro, $reglas);
                        break;
                    default:
                        // $reglas = $this->inputFecha($reqFiltro, $llave, $reglas);
                        break;
                }
            }

            // =======================================================================================

            $filas = $this->tabla($indices, $reglas, $tipoCampos, $links);
            if ($this->excel) {// si petición para generar archivo de excel realiza la tabla sin thead
                $input = View::make('plantillas.tabla_informe_excel', ['titulos' => $titulos, 'indices' => $indices, 'filas' => $filas])->render();
            } else {//si es peticion para json
                $input = View::make('plantillas.tabla', ['titulos' => $titulos, 'indices' => $indices, 'filas' => $filas])->render();
            }

            return ['status' => true, 'input' => $input];
        }
        return ['status' => false];
    }

    // =======================================================================================
    // =======================================================================================

    /**
     * [tabla description]
     * @param array $indices [description]
     * @param array $reglas [description]
     * @param array $tipoCampos [description]
     * @param array $links [description]
     * @return view             [description]
     */
    private function tabla($indices, $reglas, $tipoCampos, $links)
    {
        $filas = "";
        $resultado = DB::cursor("{$reglas['queryPrincipal']} {$reglas['join']} {$reglas['where']} {$reglas['groupBy']}");
        $totales = array();
        $numeros = false;
        foreach ($resultado as $key => $value) {
            $is_date = new \StdClass();
            for ($j = 0; $j < count($indices); $j++) {
                $propiedad = $indices[$j];
                $link = "";
                if (!empty($links)) {
                    if (array_key_exists($propiedad, $links)) {
                        $temp = explode("#", $links[$propiedad]);
                        if (isset($temp[1])) {
                            $nombreLink = $temp[1];
                            if ($nombreLink != '') {
                                $link = preg_replace('/{id}/', $value->$propiedad, $temp[0]);
                                $link = preg_replace('/{nombre}/', $nombreLink, $link);
                                $link = preg_replace('/{id}/', $value->$propiedad, $link);
                            }
                        } else {
                            $nombreLink = $value->$propiedad;
                            if ($nombreLink != '') {
                                $link = preg_replace('/{id}/', $value->$propiedad, $temp[0]);
                                $link = preg_replace('/{nombre}/', $nombreLink, $link);
                                $link = preg_replace('/{id}/', $value->$propiedad, $link);
                            }
                        }
                    }

                }

                switch ($tipoCampos[$j]) {//dependiendo del tipo de campo, se le formatea la información
                    case 1:
                        $value->$propiedad = ($link == "") ? $value->$propiedad : $link;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = null;
                        break;
                    case 2:
                        $numeros = true;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? ($totales[$indices[$j]] + $value->$propiedad) : $value->$propiedad;
                        $value->$propiedad = number_format($value->$propiedad);
                        $is_date->$propiedad = null;
                        break;
                    case 3:
                        if (!is_null($value->$propiedad))
                        {
                            $date = Date::parse((integer)$value->$propiedad);
                            $value->$propiedad = $date->format("d-m-Y");
                            $is_date->$propiedad = $date->format("Ymd");
                        } else {
                            $value->$propiedad = "";
                            $is_date->$propiedad = null;
                        }
                            $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        break;
                    case 4:
                        if($value->$propiedad !="" ){
                            $date = Date::parse((integer)$value->$propiedad);
                            $value->$propiedad = $date->format("d-m-Y");
                            $is_date->$propiedad = $date->format("Ymd");
                        } else {
                            $value->$propiedad = "";
                            $is_date->$propiedad = null;
                        }
                            $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        break;
                    case 6:
                        $value->$propiedad = strftime("%A, %d de %B de %Y", $value->$propiedad);
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = date("Ymd", $value->$propiedad);
                        break;
                    case 7:
                        $value->$propiedad = strftime("%B/%d/%y", $value->$propiedad);
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = date("Ymd", $value->$propiedad);
                        break;
                    case 8:
                        $numeros = true;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? ($totales[$indices[$j]] + $value->$propiedad) : $value->$propiedad;
                        $value->$propiedad = "$" . number_format($value->$propiedad);
                        $is_date->$propiedad = null;
                        break;
                    case 9:
                        $date = Date::parse((integer)$value->$propiedad);
                        $value->$propiedad = $date->format("g:i A");
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = $date->format("Ymd");
                        break;
                    case 10://devuelve solo el mes String
                        $value->$propiedad = title_case($value->$propiedad);
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = null;
                        break;
                    case 11:
                        $numeros = true;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? ($totales[$indices[$j]] + $value->$propiedad) : $value->$propiedad;
                        $value->$propiedad = "%" . number_format($value->$propiedad);
                        $is_date->$propiedad = null;
                        break;
                    case 13:
                        $numeros = true;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? ($totales[$indices[$j]] + $value->$propiedad) : $value->$propiedad;
                        $value->$propiedad = number_format($value->$propiedad, 2, '.', ',');
                        $is_date->$propiedad = null;
                        break;
                    case 14:
                        $numeros = true;
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? ($totales[$indices[$j]] + $value->$propiedad) : $value->$propiedad;
                        $value->$propiedad = number_format($value->$propiedad, 2, '.', '');
                        $is_date->$propiedad = null;
                        break;
                    case 15:
                        $value->$propiedad = nl2br($value->$propiedad);
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = null;
                        break;
                    case 16:
                        if($value->$propiedad !="" ){
                            $date = Date::parse((integer)$value->$propiedad);
                            $value->$propiedad = $date->format("d/m/Y");
                            $is_date->$propiedad = $date->format("Ymd");
                        } else {
                            $value->$propiedad = "";
                            $is_date->$propiedad = null;
                        }
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        break;
                    case 17:
                        $date = Date::parse($value->$propiedad);
                        $value->$propiedad = $date->format("Y-m-d");
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = $date->format("Ymd");
                        break;
                    case 18:
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        break;
                    case 19:
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        break;
                    default:// case 5, 12
                        $totales[$indices[$j]] = isset($totales[$indices[$j]]) ? null : null;
                        $is_date->$propiedad = null;
                        break;
                }
            }

            // ==========================================================

            if ($tipoCampos[0] == 18) {
                
                $queryKmAlerta = DB::select("SELECT * FROM polizas.busqueda_info_vehiculo('$value->placa')");

                foreach ($queryKmAlerta as $alerta) {
                    $value->prox_km = $alerta->prox_km;
                    $value->alert = $alerta->alerta;
                    $value->nom_usu = $alerta->usu_nombre;
                }

                if (isset($value->prox_km) && !empty($value->prox_km) && !is_null($value->prox_km) &&
                ($value->prox_km) < ($value->km_check)) {
                    $fila = View::make('plantillas.filas_alerta_mtto_veh', ['fila' => $value])->render();
                    $filas .= $fila;
                }
            } elseif ($tipoCampos[0] == 19) {
                $fila = View::make('plantillas.filas_informe_inventario', ['fila' => $value, 'is_date' => $is_date])->render();
                $filas .= $fila;
            } else {
                $fila = View::make('plantillas.filas', ['indices' => $indices, 'fila' => $value, 'cantidades' => array(), 'is_date' => $is_date])->render();
                $filas .= $fila;
            }

            // ==========================================================
        }
        if ($this->excel) {
            return $filas;
        }
        $tfoot = View::make('plantillas.tfoot', ['indices' => $indices, 'totales' => $totales, 'numeros' => $numeros])->render();
        return $filas . $tfoot;
    }
}