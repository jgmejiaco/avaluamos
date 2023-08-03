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

class ReferidoPor extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'referido_por';
    protected $primaryKey = 'id_referido_por';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'referido_por',
        'id_red_social',
        'nombre_quien_refiere',
        'empresa_que_refiere'
    ];
}