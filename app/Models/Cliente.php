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
        'cliente_nombres',
        'cliente_celular',
        'cliente_email',
        'id_tipo_persona',
        'id_empresa',
        'id_tipo_documento',
        'objeto_avaluo',
        'id_ciudad',
        'barrio',
        'direccion',
        'id_tipo_inmueble',
        'area',
        'estrato',
        'numero_inmueble',
        'cant_parqueaderos',
        'cant_cuartos_utiles',
        'cant_kioskos',
        'cant_piscinas',
        'cant_establos',
        'cant_billares',
        'id_referido_por',
        'porcentaje_descuento',
        'valor_cotizacion',
        'visitado'
    ];
}