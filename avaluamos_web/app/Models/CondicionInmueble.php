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

class CondicionInmueble extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'condicion_inmueble';
    protected $primaryKey = 'id_condicion_inmueble';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'condicion_inmueble'
    ];
}