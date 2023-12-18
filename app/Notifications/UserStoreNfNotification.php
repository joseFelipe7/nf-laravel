<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserStoreNfNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($nf)
    {
        $this->nf = $nf;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                 ->from(env('MAIL_FROM_ADDRESS', 'welcome@example.com'), 'Felipe')
                 ->subject('Nota fiscal cadastrada.')
                 ->greeting(sprintf('Olá %s!', $notifiable->name))
                 ->line(sprintf('Sua nota fiscal número %s foi gerada com sucesso', $this->nf->nf_code) );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
