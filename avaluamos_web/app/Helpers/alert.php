<?php

use RealRashid\SweetAlert\Toaster;

/**
 * Declaración para el editor. Este archivo no entra en el autoload de Composer.
 * En ejecución sigue el helper de SweetAlert, igual que en storedimoapp y web_jgmcdigital.
 *
 * El paquete documenta el retorno como void, e Intelephense marca alert()->error().
 * Aquí el editor ve que alert() devuelve el objeto que tiene error() y success().
 *
 * @return Toaster
 */
function alert($title = null, $message = '', $type = null): Toaster
{
    /** @var Toaster $alert */
    $alert = app('alert');

    return $alert;
}
