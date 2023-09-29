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

class InfoJuridica extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'info_juridica';
    protected $primaryKey = 'id_info_juridica';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_visita',
        'propietario1',
        'doc_propietario1',
        'propietario2',
        'doc_propietario2',
        'matricula_inmueble',
        'coeficiente_copropiedad',
        'certificado_libertad',
        'escritura_publica',
        'notaria',
        'imp_predial_anual',
        'administracion',
        'avaluo_catastral',
        'normas_usos',
        'mejor_mayor_uso'
    ];
}