<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class CondicionesUrbanisticas extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'condiciones_urbanisticas';
    protected $primaryKey = 'id_condiciones_urbanisticas';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'id_valorizacion',
        'cu_alumbrado_publico',
        'cu_transporte',
        'cu_orden_publico',
        'cu_seguridad',
        'cu_salubridad',
        'cu_vias',
        'id_tipo_vias',
        'cu_aceras',
        'cu_red_gas',
        'cu_red_telco',
        'cu_red_acueducto',
        'cu_red_alcantarillado',
        'cu_barrios_sectores',
        'cu_tipo_edificaciones',
        'obs_condiciones_urbanisticas',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }

    public function valorizacion(): BelongsTo
    {
        return $this->belongsTo(Valorizacion::class, 'id_valorizacion', 'id_valorizacion');
    }

    public function tipoVias(): BelongsTo
    {
        return $this->belongsTo(TipoVias::class, 'id_tipo_vias', 'id_tipo_vias');
    }
}
