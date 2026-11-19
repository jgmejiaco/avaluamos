<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class CalificacionInmueble extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'calificacion_inmueble';
    protected $primaryKey = 'id_calificacion_inmueble';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'cal_estructura',
        'cal_porton_ppal',
        'cal_fachada',
        'cal_puertas',
        'cal_muros',
        'cal_ventaneria',
        'cal_techos',
        'cal_carpinteria',
        'cal_pisos',
        'cal_ventilacion',
        'cal_cocina',
        'cal_iluminacion',
        'cal_banios',
        'cal_distribucion',
        'cal_zona_ropas',
        'cal_humedades',
        'cal_patios',
        'obs_calificacion_inmueble',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }
}
