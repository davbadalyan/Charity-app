<?php

namespace App\Notifications;

use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VolunteerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $attempts = 3;

    public $subject;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $message)
    {
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  \App\Models\Volunteer  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(Volunteer $notifiable)
    {
        return (new MailMessage)
            ->greeting("Hello ".$notifiable->full_name)
                    ->subject($this->subject)
                    ->line($this->message)
                    ->action('Charity App', url('/'))
                    ->line('Thank you for using our application!');
    }
}
