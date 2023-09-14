<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class CondicionesUrbanisticas extends Model
{
    use SoftDeletes;

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
        'cu_barrios_sectores',
        'cu_tipo_edificaciones',
        'obs_condiciones_urbanisticas'
    ];
}