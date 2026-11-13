<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class Ciudad extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'ciudad';
    protected $primaryKey = 'id_ciudad';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'descripcion_ciudad',
        'barrio',
        'comuna',
        'estrato',
        'latitud',
        'longitud',
        'id_estado',
        'id_departamento_estado'
    ];
}
