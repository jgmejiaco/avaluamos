<?php

namespace App\Mails\recuperar_clave;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailRecuperarClave extends Mailable //implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $usuario;
    public $fecha;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $fechaFormato)
    {
        $this->usuario = $usuario;
        $this->fecha = $fechaFormato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recuperar_clave.recuperarClaveMail')
                    ->subject('Recuperación Contraseña ' . $this->usuario);
    }
}
