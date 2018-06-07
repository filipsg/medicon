<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsuarioCreado extends Mailable
{
    use Queueable, SerializesModels;

    // 2018-05-09 parte2: Variables para recibir los parametros enviados

    public $email;
    public $nombre;
    public $pass;

    public function __construct($nombre,$email,$pass)
    {
        // 2018-05-09 parte2: inclusion de lo siguiente
        $this->email = $email;
        $this->nombre = $nombre;
        $this->pass = $pass;

    }

    public function build()
    {   
        // por defecto viene así
        //return $this->view('view.name');
        return $this->from('medicon@masterweb.la')
                    ->subject('Se ha registrado en Medicon')
                    ->view('mails.usuario'); //no se pone compose pues no se esta llamando a la vista sin o se esta invocando en esta
    }
}
