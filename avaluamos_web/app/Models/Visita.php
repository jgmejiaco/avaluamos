<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\TipoPersona;
use App\Models\TipoDocumento;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
use App\Models\Pais;
use App\Models\DepartamentoEstado;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\TipoInmueble;
use App\Models\InfoInmueble;
use App\Models\TipoVivienda;
use App\Models\UsoInmueble;
use App\Models\SiNo;
use App\Models\TipoSuelo;
use App\Models\Topografia;
use App\Models\Forma;
use App\Models\IndicadorNumerico;
use App\Models\CondicionInmueble;
use App\Models\CaracteristicasInmueble;
use App\Models\AcabadosInmueble;
use App\Models\CalificacionInmueble;
use App\Models\DotacionComunal;
use App\Models\CondicionesUrbanisticas;
use App\Models\InfoSector;
use App\Models\ObservacionesGenerales;
use App\Models\ValorEstimadoAvaluo;
use App\Models\EstadoConservacion;
use App\Models\RegistroFotografico;
// use App\Models\SistemaConstructivo;
// use App\Models\PuertasMaterial;
// use App\Models\TipoFachada;
// use App\Models\TipoMuro;
// use App\Models\Ventaneria;
// use App\Models\TipoTecho;
// use App\Models\FittoCorvini;
// use App\Models\Valorizacion;
// use App\Models\CalificacionGeneral;
// use App\Models\TipoVias;
// use App\Models\DirigidoA;
// use App\Models\TipoPiso;
// use App\Models\TipoBanio;
// use App\Models\TipoCocina;
// use App\Models\TipoMeson;
// use App\Models\Comuna;
// use App\Models\FactorCalidad;
// use App\Models\FactorZona;
// use App\Models\FactorTiempo;
// use App\Models\FactorPendiente;
// use App\Models\FactorUbicacion;
// use App\Models\EstadoConservacionOpciones;

class Visita extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'visitas';
    protected $primaryKey = 'id_visita';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_cliente',
        'id_dirigido_a',
        'id_doc_empresa',
        'documento_empresa',
        'objeto_avaluo',
        'id_pais',
        'id_departamento',
        'id_ciudad',
        'id_comuna',
        'sector',
        'cerca_de',
        'barrio',
        'unidad_edificio',
        'direccion',
        'id_tipo_inmueble',
        'area',
        'id_estrato',
        'numero_inmueble',
        'latitud',
        'longitud',
        'porcentaje_descuento',
        'valor_cotizacion',
        'obser_visita',
        'id_visitado',
        'fecha_visita',
        'hora_visita',
        'id_visitador',
        'usu_logueado',
    ];

    // ======================================================================

    public function usuario()
    {
                                                // visitas ------usuarios
        return $this->belongsTo(Usuario::class,'id_visitador', 'id_usuario');
    }

    // ======================================================================

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'id_cliente', 'id_cliente')->whereNull('deleted_at');
    }

    // ======================================================================

    public function tipoPersona()
    {                                              // cliente ------ tipoPersona
        return $this->belongsTo(TipoPersona::class,'id_cliente', 'id_tipo_persona');
    }


    // ======================================================================

    public function tipoDocCliente()
    {
        return $this->hasOneThrough(
            TipoDocumento::class,
            Cliente::class,
            "id_cliente",
            "id_tipo_documento",
            "id_cliente",
            "id_doc_cliente"
        );
    }

    // ======================================================================

    public function tipoDocEmpresa()
    {                                              // visitas ------ tipo_documento
        return $this->belongsTo(TipoDocumento::class,'id_doc_empresa', 'id_tipo_documento');
    }

    // ======================================================================

    public function referidoPor()
    {                                              // cliente ------ referido_por
        return $this->belongsTo(ReferidoPor::class,'id_cliente', 'id_referido_por');
    }

    // ======================================================================

    public function redSocial()
    {                                              // cliente ------ redes sociales
        return $this->belongsTo(RedSocial::class,'id_cliente', 'id_red_social');
    }

    // ======================================================================

    public function clientePais()
    {                                       // cliente ------ paises
        return $this->belongsTo(Pais::class,'id_pais', 'id_pais');
    }

    // ======================================================================

    public function visitaPais()
    {                                       // visita ------ paises
        return $this->belongsTo(Pais::class,'id_pais', 'id_pais')->whereNull('deleted_at');
    }

    // ======================================================================

    public function clienteDepartamento()
    {                                       // visita ------ departamentos
        return $this->belongsTo(DepartamentoEstado::class,'id_departamento', 'id_departamento_estado');
    }

    // ======================================================================

    public function visitaDepartamento()
    {                                       // visita ------ departamentos
        return $this->belongsTo(DepartamentoEstado::class,'id_departamento', 'id_departamento_estado')->whereNull('deleted_at');
    }

    // ======================================================================

    public function clienteCiudad()
    {                                       // visita ------ ciudades
        return $this->belongsTo(Ciudad::class,'id_ciudad', 'id_ciudad');
    }

    // ======================================================================

    public function visitaCiudad()
    {                                       // visita ------ ciudades
        return $this->belongsTo(Ciudad::class,'id_ciudad', 'id_ciudad')->whereNull('deleted_at');
    }

    // ======================================================================

    public function tipoInmueble()
    {                                                // visita ------ tipo_inmueble
        return $this->belongsTo(TipoInmueble::class,'id_tipo_inmueble', 'id_tipo_inmueble');
    }

    // ======================================================================

    public function infoInmueble()
    {                                             // visitas ------ infoInmueble
        return $this->belongsTo(InfoInmueble::class,'id_visita', 'id_info_inmueble');
    }

    // ======================================================================

    public function tipoVivienda()
    {                                               // infoInmueble ------ tipoVivienda
        return $this->belongsTo(TipoVivienda::class,'id_visita', 'id_tipo_vivienda');
    }

    // ======================================================================

    public function usoInmueble()
    {                                               // infoInmueble ------ usoInmueble
        return $this->belongsTo(UsoInmueble::class,'id_visita', 'id_uso_inmueble');
    }

    // ======================================================================

    public function visitado()
    {                                      // visitas ------ id_si_no
        return $this->belongsTo(SiNo::class,'id_visitado', 'id_si_no');
    }

    // ======================================================================

    public function tipoSuelo()
    {                                        // infoInmueble ------ id_tipo_suelo
        return $this->belongsTo(TipoSuelo::class,'id_visita', 'id_tipo_suelo');
    }

    // ======================================================================

    public function topografia()
    {                                        // infoInmueble ------ Topografia
        return $this->belongsTo(Topografia::class,'id_visita', 'id_topografia');
    }

    // ======================================================================

    public function forma()
    {                                       // infoInmueble ------ id_forma
        return $this->belongsTo(Forma::class,'id_visita', 'id_forma');
    }

    // ======================================================================

    public function estrato()
    {                                                  // visitas ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_estrato', 'id_indicador_numerico');
    }

    // ======================================================================

    public function pisosInmueble()
    {                                              // infoInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function pisosEdificio()
    {                                              // infoInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function remodelado()
    {                                       // infoInmueble ------ id_si_no
        return $this->belongsTo(SiNo::class,'id_visita', 'id_si_no');
    }

    // ======================================================================

    public function condicionInmueble()
    {                                                   // infoInmueble ------ CondicionInmueble
        return $this->belongsTo(CondicionInmueble::class,'id_visita', 'id_condicion_inmueble');
    }

    // ======================================================================

    public function caracteristicasInmueble()
    {                                                   // visita ------ caracteristicas_inmueble
        return $this->belongsTo(CaracteristicasInmueble::class,'id_visita', 'id_caracteristicas_inmueble');
    }

    // ======================================================================

    public function cocinas()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function habitaciones()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function salas()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function habitacionesServicio()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function comedores()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function baniosServicio()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function baniosSocial()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function baniosPrivado()
    {                                                     // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function balcones()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function zonaRopa()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function estudios()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function patios()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function vestier()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function escalaEmergencia()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function closets()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function shutBasura()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function parqueaderos()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function cuartoUtil()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function kioskos()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function piscinas()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function establos()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function billares()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function ascensores()
    {                                                   // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(IndicadorNumerico::class,'id_visita', 'id_indicador_numerico');
    }

    // ======================================================================

    public function acabadosInmueble()
    {                                                      // visita ------ acabados_inmueble
        return $this->belongsTo(AcabadosInmueble::class,'id_visita', 'id_acabados_inmueble');
    }

    // ======================================================================

    public function calificacionInmueble()
    {                                                       // caracteristicasInmueble ------ id_indicador_numerico
        return $this->belongsTo(CalificacionInmueble::class,'id_visita', 'id_calificacion_inmueble');
    }

    // ======================================================================

    public function dotacionComunal()
    {                                                   // visita ------ id_dotacion_comunal
        return $this->belongsTo(DotacionComunal::class,'id_visita', 'id_dotacion_comunal');
    }

    // ======================================================================

    public function condicionesUrbanisticas()
    {                                                           // visita ------ id_condiciones_urbanisticas
        return $this->belongsTo(CondicionesUrbanisticas::class,'id_visita', 'id_condiciones_urbanisticas');
    }

    // ======================================================================

    public function infoSector()
    {                                               // visitas ------ id_info_sector
        return $this->belongsTo(InfoSector::class,'id_visita', 'id_info_sector');
    }

    // ======================================================================

    public function observacionesGenerales()
    {                                                       // visitas ------ id_obs_generales
        return $this->belongsTo(ObservacionesGenerales::class,'id_visita', 'id_obs_generales');
    }

    // ======================================================================

    public function valorEstimadoAvaluo()
    {                                                       // visitas ------ id_valor_estimado_avaluo
        return $this->belongsTo(ValorEstimadoAvaluo::class,'id_visita', 'id_valor_estimado_avaluo');
    }

    // ======================================================================

    public function estadoConservacion()
    {                                                       // visitas ------ id_estado_conservacion
        return $this->belongsTo(EstadoConservacion::class,'id_visita', 'id_estado_conservacion');
    }

    // ======================================================================

    public function registroFotografico()
    {                                                       // visitas ------ id_reg_foto
        return $this->belongsTo(RegistroFotografico::class,'id_visita', 'id_reg_foto');
    }

    // ======================================================================


}
