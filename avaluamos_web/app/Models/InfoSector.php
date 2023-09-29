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

class InfoSector extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'info_sector';
    protected $primaryKey = 'id_info_sector';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_visita',
        'barrios_sectores',
        'actividad_predominante',
        'transporte',
        'vias_acceso'
    ];
}