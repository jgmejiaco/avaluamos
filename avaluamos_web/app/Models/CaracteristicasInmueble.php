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

class CaracteristicasInmueble extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'caracteristicas_inmueble';
    protected $primaryKey = 'id_caracteristicas_inmueble';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_visita',
        'cocinas',
        'habitaciones',
        'salas',
        'habitaciones_servicio',
        'comedores',
        'banios_servicio',
        'banios_social',
        'banios_privado',
        'balcones',
        'zona_ropa',
        'estudios',
        'patios',
        'vestier',
        'escala_emergencia',
        'closets',
        'shut_basura',
        'cant_parqueaderos',
        'cant_cuarto_util',
        'cant_kioskos',
        'cant_piscinas',
        'cant_establos',
        'cant_billares',
        'cant_ascensores',
        'obs_caract_inmueble'
    ];
}