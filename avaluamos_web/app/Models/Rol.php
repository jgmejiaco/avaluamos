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

class Rol extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'nombre_rol',
        'mod_usuario',
        'mod_clientes',
        'mod_calendario',
        'mod_visitas',
        'mod_avaluo',
        'mod_informes',
    ];
}