<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Model implements AuthenticatableContract, JWTSubject, Auditable
{
    use Authenticatable;
    use SoftDeletes;
    use AuditableTrait;
    use HasRoles;

    protected $connection = 'mysql';
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guard_name = 'web';
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

    protected $auditExclude = [
        'clave',
    ];

    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'id_rol' => $this->id_rol,
        ];
    }
}
