<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class DotacionComunal extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'dotacion_comunal';
    protected $primaryKey = 'id_dotacion_comunal';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'porteria_24',
        'parqueo_comun',
        'juegos_infantiles',
        'zona_mascotas',
        'piscinas',
        'zonas_verdes',
        'sauna',
        'salon_social',
        'turco',
        'canchas',
        'gimnasio',
        'playground',
        'barbecue',
        'supermercado',
        'sala_cine',
        'cafeteria',
        'restaurante',
        'squash',
        'obs_dotacion_comunal',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }
}
