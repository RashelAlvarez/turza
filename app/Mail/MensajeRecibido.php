<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajeRecibido extends Mailable
{
    use Queueable, SerializesModels;
    public $subject= 'Mensaje Recibido de Turza';
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto)
    {
        //
        $this->msg=$contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('emailcontacto')->attach($this->msg['fcontacto']->getRealPath(), 
        ['as'=>$this->msg['fcontacto']->getClientOriginalName()
        ]);
      
    
    }
}
