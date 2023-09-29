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

class DotacionComunal extends Model
{
    use SoftDeletes;

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
        'obs_dotacion_comunal'
    ];
}