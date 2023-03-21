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

class Persona extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'id_tipo_documento',
        'numero_documento',
        'correo',
        'direccion',
        'celular',
        'telefono_fijo',
        'nombre_contacto',
        'telefono_contacto',
        'id_ciudad',
        'id_estado',
        'id_cargo',
        'id_usuario'
    ];
}
