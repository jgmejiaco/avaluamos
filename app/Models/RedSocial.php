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

class RedSocial extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'redes_sociales';
    protected $primaryKey = 'id_red_social';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'red_social'
    ];
}