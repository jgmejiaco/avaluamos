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

class Visita extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'visitas';
    protected $primaryKey = 'id_visita';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_cliente',
        'id_dirigido_a',
        'id_doc_empresa',
        'documento_empresa',
        'objeto_avaluo',
        'id_pais',
        'id_departamento',
        'id_ciudad',
        'id_comuna',
        'sector',
        'cerca_de',
        'barrio',
        'unidad_edificio',
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
        'latitud',
        'longitud',
        'porcentaje_descuento',
        'valor_cotizacion',
        'obser_visita',
        'id_visitado',
        'fecha_visita',
        'hora_visita',
        'id_visitador'
    ];
}