<?php

namespace App\Http\Responsable\visita;

use App\Support\FalloServicio;
use App\Traits\MetodosTrait;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class VisitaEdit implements Responsable
{
    use MetodosTrait;

    protected $idVisita;

    public function __construct($idVisita)
    {
        $this->idVisita = $idVisita;
    }

    public function toResponse($request)
    {
        try {
            $response = $this->getClientApi()->get('visitas_edit/'.$this->idVisita);

            $respuesta = json_decode($response->getBody()->getContents());
            $editarVisita = $respuesta->visita ?? null;

            if (! is_object($editarVisita) || ! isset($editarVisita->id_visita)) {
                alert()->warning('No se encontró la visita.');
                return redirect()->route('visita.index');
            }

            return view('visita.edit', compact('editarVisita'));

        } catch (Exception $e) {
            if (FalloServicio::esConexion($e)) {
                throw $e;
            }

            logger()->error('Error VisitaEdit: '.$e->getMessage());
            alert()->error('Error cargando la visita.');

            return redirect()->route('visita.index');
        }
    }
}
