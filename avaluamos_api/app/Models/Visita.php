<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Visita extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

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
    // FK directas de visitas
    // ======================================================================

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function dirigidoA(): BelongsTo
    {
        return $this->belongsTo(DirigidoA::class, 'id_dirigido_a', 'id_dirigido_a');
    }

    public function tipoDocEmpresa(): BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class, 'id_doc_empresa', 'id_tipo_documento');
    }

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(DepartamentoEstado::class, 'id_departamento', 'id_departamento_estado');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id_ciudad');
    }

    public function comuna(): BelongsTo
    {
        return $this->belongsTo(Comuna::class, 'id_comuna', 'id_comuna');
    }

    public function tipoInmueble(): BelongsTo
    {
        return $this->belongsTo(TipoInmueble::class, 'id_tipo_inmueble', 'id_tipo_inmueble');
    }

    public function estrato(): BelongsTo
    {
        return $this->belongsTo(IndicadorNumerico::class, 'id_estrato', 'id_indicador_numerico');
    }

    public function visitado(): BelongsTo
    {
        return $this->belongsTo(SiNo::class, 'id_visitado', 'id_si_no');
    }

    public function visitador(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_visitador', 'id_usuario');
    }

    public function usuarioLogueado(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usu_logueado', 'id_usuario');
    }

    public function tipoDocCliente(): HasOneThrough
    {
        return $this->hasOneThrough(
            TipoDocumento::class,
            Cliente::class,
            'id_cliente',
            'id_tipo_documento',
            'id_cliente',
            'id_doc_cliente'
        );
    }

    // ======================================================================
    // Tablas hijas (id_visita FK)
    // ======================================================================

    public function infoJuridica(): HasOne
    {
        return $this->hasOne(InfoJuridica::class, 'id_visita', 'id_visita');
    }

    public function infoInmueble(): HasOne
    {
        return $this->hasOne(InfoInmueble::class, 'id_visita', 'id_visita');
    }

    public function caracteristicasInmueble(): HasOne
    {
        return $this->hasOne(CaracteristicasInmueble::class, 'id_visita', 'id_visita');
    }

    public function acabadosInmueble(): HasOne
    {
        return $this->hasOne(AcabadosInmueble::class, 'id_visita', 'id_visita');
    }

    public function calificacionInmueble(): HasOne
    {
        return $this->hasOne(CalificacionInmueble::class, 'id_visita', 'id_visita');
    }

    public function dotacionComunal(): HasOne
    {
        return $this->hasOne(DotacionComunal::class, 'id_visita', 'id_visita');
    }

    public function condicionesUrbanisticas(): HasOne
    {
        return $this->hasOne(CondicionesUrbanisticas::class, 'id_visita', 'id_visita');
    }

    public function infoSector(): HasOne
    {
        return $this->hasOne(InfoSector::class, 'id_visita', 'id_visita');
    }

    public function observacionesGenerales(): HasOne
    {
        return $this->hasOne(ObservacionesGenerales::class, 'id_visita', 'id_visita');
    }

    public function valorEstimadoAvaluo(): HasOne
    {
        return $this->hasOne(ValorEstimadoAvaluo::class, 'id_visita', 'id_visita');
    }

    public function estadoConservacion(): HasOne
    {
        return $this->hasOne(EstadoConservacion::class, 'id_visita', 'id_visita');
    }

    public function registroFotografico(): HasOne
    {
        return $this->hasOne(RegistroFotografico::class, 'id_visita', 'id_visita');
    }
}
