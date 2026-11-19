<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Empresa extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'empresas';
    protected $primaryKey = 'id_empresa';
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    protected $fillable = [
        'nombre_empresa',
        'nit_empresa',
    ];
}
