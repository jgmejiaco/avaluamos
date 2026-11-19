<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class AcabadosInmueble extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'acabados_inmueble';
    protected $primaryKey = 'id_acabados_inmueble';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'id_sistema_constructivo',
        'porton_principal',
        'id_tipo_fachada',
        'puertas',
        'id_tipo_muro',
        'id_ventaneria',
        'id_tipo_techo',
        'servicios_publicos',
        'pisos',
        'telefono',
        'banios',
        'energia',
        'cocina',
        'agua',
        'meson',
        'gas',
        'patios',
        'obs_acabados_inmueble',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }

    public function sistemaConstructivo(): BelongsTo
    {
        return $this->belongsTo(SistemaConstructivo::class, 'id_sistema_constructivo', 'id_sistema_constructivo');
    }

    public function tipoFachada(): BelongsTo
    {
        return $this->belongsTo(TipoFachada::class, 'id_tipo_fachada', 'id_tipo_fachada');
    }

    public function tipoMuro(): BelongsTo
    {
        return $this->belongsTo(TipoMuro::class, 'id_tipo_muro', 'id_tipo_muro');
    }

    public function ventaneria(): BelongsTo
    {
        return $this->belongsTo(Ventaneria::class, 'id_ventaneria', 'id_ventaneria');
    }

    public function tipoTecho(): BelongsTo
    {
        return $this->belongsTo(TipoTecho::class, 'id_tipo_techo', 'id_tipo_techo');
    }
}
