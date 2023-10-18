<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'informe';
    protected $primaryKey = 'inf_codigo';
    protected $fillable = [
        'inf_descripcion',
        'tabla_principal',
        'where_principal'
    ];
}
