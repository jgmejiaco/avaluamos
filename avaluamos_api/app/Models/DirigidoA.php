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

class DirigidoA extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'dirigido_a';
    protected $primaryKey = 'id_dirigido_a';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'dirigido_a',
        'id_tipo_documento',
        'numero_documento',
        'usu_logueado',
    ];
}
