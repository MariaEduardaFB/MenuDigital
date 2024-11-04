<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EmpresaRegistrada extends Notification
{
    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmação de Registro')
            ->greeting('Olá, ' . $notifiable->nome . '!')
            ->line('Sua empresa foi registrada com sucesso.')
            ->action('Acessar o Dashboard', url('/dashboard'))
            ->line('Obrigado por se registrar em nossa plataforma!');
    }
}
