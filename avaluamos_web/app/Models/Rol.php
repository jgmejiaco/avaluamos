<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'rol';
    protected $primaryKey = 'id_rol';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'nombre_rol',
        'mod_usuario',
        'mod_clientes',
        'mod_calendario',
        'mod_visitas',
        'mod_avaluo',
        'mod_informes',
    ];
}
