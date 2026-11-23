<?php

namespace App\Mails\recuperar_clave;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRecuperarClave extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $fecha;

    public function __construct($usuario, $fecha)
    {
        $this->usuario = $usuario;
        $this->fecha = $fecha;
    }

    public function build()
    {
        return $this->subject('Recuperación de Contraseña')
            ->view('emails.recuperar_clave.recuperarClaveMail');
    }
}
