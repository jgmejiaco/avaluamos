<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeInnerJoin extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'pgsql';
    protected $table = 'informe_innerjoin';
    protected $fillable = [
        'informe_codigo',
        'infxcampos',
        'inner_join',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
