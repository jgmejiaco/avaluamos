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

class ValorEstimadoAvaluo extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'valor_estimado_avaluo';
    protected $primaryKey = 'id_valor_estimado_avaluo';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_visita',
        'valor_estimado_inmueble'
    ];
}