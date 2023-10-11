<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcabadosInmueble extends Model
{
    use SoftDeletes;

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
        'servicios_publicios',
        'pisos',
        'telefono',
        'banios',
        'energia',
        'cocina',
        'agua',
        'meson',
        'gas',
        'patios',
        'obs_acabados_inmueble'
    ];
}