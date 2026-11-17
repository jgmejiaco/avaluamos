<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
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

    protected $hidden = [
        'clave',
    ];

    public function getAuthPassword()
    {
        return $this->clave;
    }
}
