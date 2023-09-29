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

class InfoInmueble extends Model
{
    use SoftDeletes;

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
        'obs_info_inmueble'
    ];
}