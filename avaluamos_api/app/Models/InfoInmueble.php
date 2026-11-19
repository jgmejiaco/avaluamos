<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class InfoInmueble extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'info_inmueble';
    protected $primaryKey = 'id_info_inmueble';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'id_tipo_inmueble',
        'id_tipo_vivienda',
        'id_uso_inmueble',
        'id_tipo_suelo',
        'id_topografia',
        'id_forma',
        'pisos_inmueble',
        'pisos_edificio',
        'valor_administracion',
        'barrio',
        'remodelado',
        'altura',
        'frente',
        'fondo',
        'area_libre',
        'anios_construccion',
        'anios_remodelacion',
        'area_construida',
        'area_patios',
        'id_condicion_inmueble',
        'porcentaje_depreciacion',
        'id_fitto_corvini',
        'vida_util_anios',
        'vetustez_anios',
        'vida_permanente_anios',
        'obs_info_inmueble',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }

    public function tipoInmueble(): BelongsTo
    {
        return $this->belongsTo(TipoInmueble::class, 'id_tipo_inmueble', 'id_tipo_inmueble');
    }

    public function tipoVivienda(): BelongsTo
    {
        return $this->belongsTo(TipoVivienda::class, 'id_tipo_vivienda', 'id_tipo_vivienda');
    }

    public function usoInmueble(): BelongsTo
    {
        return $this->belongsTo(UsoInmueble::class, 'id_uso_inmueble', 'id_uso_inmueble');
    }

    public function tipoSuelo(): BelongsTo
    {
        return $this->belongsTo(TipoSuelo::class, 'id_tipo_suelo', 'id_tipo_suelo');
    }

    public function topografia(): BelongsTo
    {
        return $this->belongsTo(Topografia::class, 'id_topografia', 'id_topografia');
    }

    public function forma(): BelongsTo
    {
        return $this->belongsTo(Forma::class, 'id_forma', 'id_forma');
    }

    public function condicionInmueble(): BelongsTo
    {
        return $this->belongsTo(CondicionInmueble::class, 'id_condicion_inmueble', 'id_condicion_inmueble');
    }

    public function fittoCorvini(): BelongsTo
    {
        return $this->belongsTo(FittoCorvini::class, 'id_fitto_corvini', 'id_fitto_corvini');
    }
}
