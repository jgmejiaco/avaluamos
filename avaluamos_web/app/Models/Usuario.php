<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'nombre_usuario',
        'clave',
        'clave_fallas',
        'nombres',
        'apellidos',
        'id_tipo_documento',
        'numero_documento',
        'correo',
        'celular',
        'id_estado',
        'id_cargo',
        'id_rol',
    ];
}