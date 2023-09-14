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

class RegistroFotografico extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'registro_fotografico';
    protected $primaryKey = 'id_reg_foto';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_visita',
        'rf_fachada',
        'rf_entrada',
        'rf_sala1',
        'rf_sala2',
        'rf_sala3',
        'rf_comedor1',
        'rf_comedor2',
        'rf_comedor3',
        'rf_cocina1',
        'rf_cocina2',
        'rf_cocina3',
        'rf_habitacion1',
        'rf_habitacion2',
        'rf_habitacion3',
        'rf_habitacion4',
        'rf_habitacion5',
        'rf_habitacion6',
        'rf_habitacion7',
        'rf_bano1',
        'rf_bano2',
        'rf_bano3',
        'rf_patio1',
        'rf_patio2',
        'rf_patio3',
        'rf_estudio1',
        'rf_estudio2',
        'rf_estudio3',
        'rf_cuarto_util1',
        'rf_cuarto_util2',
        'rf_cuarto_util3',
        'rf_pasillo1',
        'rf_pasillo2',
        'rf_pasillo3',
        'rf_zona_ropa1',
        'rf_zona_ropa2',
        'rf_zona_ropa3',
        'rf_balcon1',
        'rf_balcon2',
        'rf_balcon3'
    ];
}
