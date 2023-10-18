<?php

namespace App\Http\Responsable\informes;

use App\Clases\Custom\FormatoInformes;
use Illuminate\Contracts\Support\Responsable;

/**
 * Se encarga de la respuesta del informe
 */
class RespuestaInforme implements Responsable
{

    public function toResponse($request)
    {
        $formato = new FormatoInformes();
        //se sacan los datos enviados por la petición
        
        $datos = $request->all();
        
        //se le envían los datos para que procesa hacer la tabla
        $respuesta = $formato->carga($datos);
        
        if ($respuesta['status']) {
            $input = $respuesta['input'];
            return response()->json(['status'=> true,'data'=>$input],200);
        }
        return response()->json(['status'=> false]);
    }
}