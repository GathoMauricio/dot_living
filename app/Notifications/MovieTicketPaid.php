<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\WhatsApp\Component;
use NotificationChannels\WhatsApp\WhatsAppChannel;
use NotificationChannels\WhatsApp\WhatsAppTextMessage;

class MovieTicketPaid extends Notification
{
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    public function toWhatsapp($notifiable)
    {
        return WhatsAppTextMessage::create()
            ->message('Hello, this is a test message')
            ->to('+525519323932');
    }
}
