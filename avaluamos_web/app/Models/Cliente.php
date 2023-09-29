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
        'id_doc_cliente',
        'documento_cliente',
        'fecha_nacimiento',
        'cli_celular',
        'cli_email',
        'id_tipo_persona',
        'id_pais',
        'id_dpto_estado',
        'id_ciudad',
        'id_referido_por',
        'id_red_social',
        'nombre_quien_refiere',
        'empresa_que_refiere',
    ];
}