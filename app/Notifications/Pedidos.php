<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Pedido;
use App\User;
use App\Cliente;


class Pedidos extends Notification
{
    protected $fromUser;
    
    use Queueable;
   
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($fromUser)
    {
        //
        
        $this->fromUser = $fromUser;
      /*   dd($fromUser->nombre); */
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        
            //
        /*    return  $this->fromUse r;*/
            
        return[
           
           'text' => "Has recibido un nuevo pedido de:  " . User::find($this->fromUser)->id ,
           
        ];
    }
}
