<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class EstadoConservacion extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'estado_conservacion';
    protected $primaryKey = 'id_estado_conservacion';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'id_factor_calidad',
        'id_factor_zona',
        'id_factor_tiempo',
        'id_factor_pendiente',
        'valor_pendiente',
        'id_factor_ubicacion',
        'valor_ubicacion',
        'id_estado_conservacion_opciones',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }

    public function factorCalidad(): BelongsTo
    {
        return $this->belongsTo(FactorCalidad::class, 'id_factor_calidad', 'id_factor_calidad');
    }

    public function factorZona(): BelongsTo
    {
        return $this->belongsTo(FactorZona::class, 'id_factor_zona', 'id_factor_zona');
    }

    public function factorTiempo(): BelongsTo
    {
        return $this->belongsTo(FactorTiempo::class, 'id_factor_tiempo', 'id_factor_tiempo');
    }

    public function factorPendiente(): BelongsTo
    {
        return $this->belongsTo(FactorPendiente::class, 'id_factor_pendiente', 'id_factor_pendiente');
    }

    public function factorUbicacion(): BelongsTo
    {
        return $this->belongsTo(FactorUbicacion::class, 'id_factor_ubicacion', 'id_factor_ubicacion');
    }

    public function estadoConservacionOpciones(): BelongsTo
    {
        return $this->belongsTo(EstadoConservacionOpciones::class, 'id_estado_conservacion_opciones', 'id_estado_conservacion_opciones');
    }
}
