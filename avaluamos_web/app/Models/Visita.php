<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
use App\Models\Topografia;
use App\Models\Forma;
use App\Models\IndicadorNumerico;
use App\Models\SiNo;
use App\Models\SistemaConstructivo;
use App\Models\PuertasMaterial;
use App\Models\TipoFachada;
use App\Models\TipoMuro;
use App\Models\Ventaneria;
use App\Models\TipoTecho;
use App\Models\Empresa;
use App\Models\TipoSuelo;
use App\Models\CondicionInmueble;
use App\Models\FittoCorvini;
use App\Models\Valorizacion;
use App\Models\CalificacionGeneral;
use App\Models\TipoVias;
use App\Models\DirigidoA;
use App\Models\TipoPiso;
use App\Models\TipoBanio;
use App\Models\TipoCocina;
use App\Models\TipoMeson;
use App\Models\Comuna;
use App\Models\FactorCalidad;
use App\Models\FactorZona;
use App\Models\FactorTiempo;
use App\Models\FactorPendiente;
use App\Models\FactorUbicacion;
use App\Models\EstadoConservacionOpciones;

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
        return $this->belongsTo(Cliente::class,'id_cliente', 'id_cliente');
    }

    // ======================================================================

    public function tipoPersona()
    {                                              // cliente ------ tipoPersona
        return $this->belongsTo(TipoPersona::class,'id_cliente', 'id_tipo_persona');
    }

    // ======================================================================

    public function tipoDocCliente()
    {                                              // cliente ------ tipo_documento
        return $this->belongsTo(TipoDocumento::class,'id_cliente', 'id_tipo_documento');
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
        return $this->belongsTo(Pais::class,'id_pais', 'id_pais');
    }

    // ======================================================================
    
    public function clienteDepartamento()
    {                                       // visita ------ departamentos
        return $this->belongsTo(DepartamentoEstado::class,'id_departamento', 'id_departamento_estado');
    }

    // ======================================================================

    public function visitaDepartamento()
    {                                       // visita ------ departamentos
        return $this->belongsTo(DepartamentoEstado::class,'id_departamento', 'id_departamento_estado');
    }

    // ======================================================================

    public function clienteCiudad()
    {                                       // visita ------ ciudades
        return $this->belongsTo(Ciudad::class,'id_ciudad', 'id_ciudad');
    }

    // ======================================================================

    public function visitaCiudad()
    {                                       // visita ------ ciudades
        return $this->belongsTo(Ciudad::class,'id_ciudad', 'id_ciudad');
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
    {                                               // infoInmueble ------ tipoVivienda
        return $this->belongsTo(UsoInmueble::class,'id_visita', 'id_tipo_vivienda');
    }

    // ======================================================================

    // ======================================================================

    // ======================================================================
    
    
    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================
    // ======================================================================

    // ======================================================================

    // ======================================================================

    // ======================================================================


}
