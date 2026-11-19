<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class InfoJuridica extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'info_juridica';
    protected $primaryKey = 'id_info_juridica';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'id_visita',
        'propietario1',
        'doc_propietario1',
        'propietario2',
        'doc_propietario2',
        'matricula_inmueble',
        'coeficiente_copropiedad',
        'certificado_libertad',
        'escritura_publica',
        'notaria',
        'imp_predial_anual',
        'administracion',
        'avaluo_catastral',
        'normas_usos',
        'mejor_mayor_uso',
    ];

    public function visita(): BelongsTo
    {
        return $this->belongsTo(Visita::class, 'id_visita', 'id_visita');
    }
}
