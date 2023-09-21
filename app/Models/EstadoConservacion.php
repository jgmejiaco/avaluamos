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

class EstadoConservacion extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'estado_conservacion';
    protected $primaryKey = 'id_estado_conservacion';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'estado_conservacion'
    ];
}