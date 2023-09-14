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

class CalificacionInmueble extends Model
{
    use SoftDeletes;

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
        'obs_calificacion_inmueble'
    ];
}