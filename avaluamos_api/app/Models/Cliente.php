<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Cliente extends Model implements Auditable
{
    use SoftDeletes, AuditableTrait;

    protected $connection = 'mysql';
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $dates = ['deleted_at', 'fecha_nacimiento'];
    public $timestamps = true;

    protected $fillable = [
        'cli_nombres',
        'id_doc_cliente',
        'documento_cliente',
        'fecha_nacimiento',
        'cli_celular',
        'cli_email',
        'id_tipo_persona',
        'id_pais',
        'id_dpto_estado',
        'id_ciudad',
        'id_referido_por',
        'id_red_social',
        'nombre_quien_refiere',
        'empresa_que_refiere',
        'usu_logueado',
    ];

    public function tipoDocCliente()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_doc_cliente', 'id_tipo_documento');
    }

    public function tipoPersona()
    {
        return $this->belongsTo(TipoPersona::class, 'id_tipo_persona', 'id_tipo_persona');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }

    public function departamento()
    {
        return $this->belongsTo(DepartamentoEstado::class, 'id_dpto_estado', 'id_departamento_estado');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad', 'id_ciudad');
    }

    public function referidoPor()
    {
        return $this->belongsTo(ReferidoPor::class, 'id_referido_por', 'id_referido_por');
    }

    public function redSocial()
    {
        return $this->belongsTo(RedSocial::class, 'id_red_social', 'id_red_social');
    }

    public function usuarioLogueado()
    {
        return $this->belongsTo(Usuario::class, 'usu_logueado', 'id_usuario');
    }
}
