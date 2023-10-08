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
use App\Models\Usuario;
use App\Models\Rol;
use App\Models\Cargo;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\DepartamentoEstado;
use App\Models\Municipio;
use App\Models\TipoVivienda;
use App\Models\TipoInmueble;
use App\Models\UsoInmueble;
use App\Models\Topografia;
use App\Models\Forma;
use App\Models\IndicadorNumerico;
use App\Models\SiNo;
use App\Models\SistemaConstructivo;
use App\Models\PuertasMaterial;
use App\Models\TipoFachada;
use App\Models\TipoMuro;
use App\Models\Ventaneria;
use App\Models\TipoTecho;
use App\Models\Empresa;
use App\Models\TipoSuelo;
use App\Models\CondicionInmueble;
use App\Models\FittoCorvini;
use App\Models\Valorizacion;
use App\Models\CalificacionGeneral;
use App\Models\TipoVias;
use App\Models\TipoPersona;
use App\Models\ReferidoPor;
use App\Models\RedSocial;
use App\Models\DirigidoA;
use App\Models\Cliente;
use App\Models\TipoPiso;
use App\Models\TipoBanio;
use App\Models\TipoCocina;
use App\Models\TipoMeson;
use App\Models\Comuna;
use App\Models\FactorCalidad;
use App\Models\FactorZona;
use App\Models\FactorTiempo;
use App\Models\FactorPendiente;
use App\Models\FactorUbicacion;
use App\Models\EstadoConservacionOpciones;

class Visita extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'visitas';
    protected $primaryKey = 'id_visita';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $fillable = [
        'id_cliente',
        'id_dirigido_a',
        'id_doc_empresa',
        'documento_empresa',
        'objeto_avaluo',
        'id_pais',
        'id_departamento',
        'id_ciudad',
        'id_comuna',
        'sector',
        'cerca_de',
        'barrio',
        'unidad_edificio',
        'direccion',
        'id_tipo_inmueble',
        'area',
        'id_estrato',
        'numero_inmueble',
        'id_cant_parqueaderos',
        'id_cant_cuarto_util',
        'id_cant_kioskos',
        'id_cant_piscinas',
        'id_cant_establos',
        'id_cant_billares',
        'latitud',
        'longitud',
        'porcentaje_descuento',
        'valor_cotizacion',
        'obser_visita',
        'id_visitado',
        'fecha_visita',
        'hora_visita',
        'id_visitador',
        'usu_logueado',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_visitador', 'id_usuario');
        // return $this->belongsTo(Usuario::class);
    }

//     public function usuario()
//     {
//         return $this->belongsTo(Usuario::class ,'id_usuario', 'id_usuario');
//     }
}