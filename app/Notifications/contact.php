<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class contact extends Notification
{
    use Queueable;
 public $value;
    /**
     * Create a new notification instance.
     */
    public function __construct($value)
    {

       $this->value=$value;
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
                    ->line(':  إسم المرسل')
                    ->line($this->value['name'])
                    ->line(':  الإيميل ')
                    ->line($this->value['email'])
                    ->line(':  الموضوع ')
                    ->line($this->value['subject'])
                    ->line(':  الرسالة ')
                    ->view('website.contact');


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
