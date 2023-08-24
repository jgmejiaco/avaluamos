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

class Cliente extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'cli_nombres',
        'cli_celular',
        'cli_email',
        'id_tipo_persona',
        'id_dirigido_a',
        'objeto_avaluo',
        'id_ciudad',
        'sector',
        'barrio',
        'direccion',
        'id_tipo_inmueble',
        'area',
        'id_estrato',
        'numero_inmueble',
        'id_cant_parqueaderos',
        'id_cant_cuarto_util',
        'id_cant_kioskos',
        'id_cant_piscinas',
        'id_cant_establos',
        'id_cant_billares',
        'id_referido_por',
        'porcentaje_descuento',
        'valor_cotizacion',
        'id_visitado'
    ];
}