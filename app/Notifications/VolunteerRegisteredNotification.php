<?php

namespace App\Notifications;

use App\Channels\TelegramChannel;
use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VolunteerRegisteredNotification extends Notification
{
    use Queueable;

    public $volunteer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', TelegramChannel::class];
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
            ->line('A new volunteer just registered.')
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
        return [
            'email' => $this->volunteer->email,
            'phone' => $this->volunteer->phone,
            'full_name' => $this->volunteer->full_name,
        ];
    }

    public function toTelegram($notifiable)
    {
        $message = "A new Volunteer has just registered. \n";
        $message .= "Email: {$this->volunteer->email} \n";
        $message .= "Phone: {$this->volunteer->phone} \n";
        $message .= "Full name: {$this->volunteer->full_name} \n";
        $message .= "Message: {$this->volunteer->message} \n";

        return $message;
    }
}
