<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Calendario extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'calendario';
    protected $primaryKey = 'id_visita_calendario';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'fecha_visita_calendario',
        'nombre_cliente',
        'celular',
        'tipo_inmueble',
        'municipio',
        'barrio',
        'direccion',
        'visita_cumplida',
    ];

    public function visitaCumplida(): BelongsTo
    {
        return $this->belongsTo(SiNo::class, 'visita_cumplida', 'id_si_no');
    }

    public function tipoInmueble(): BelongsTo
    {
        return $this->belongsTo(TipoInmueble::class, 'tipo_inmueble', 'id_tipo_inmueble');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'municipio', 'id_ciudad');
    }
}
