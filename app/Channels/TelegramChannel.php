<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class TelegramChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toTelegram($notifiable);

        try {
            Http::get(
                "https://api.telegram.org/bot" . config("app.telegram_api_key") .
                    "/sendMessage?chat_id=" . config("app.telegram_chat_id") .  "&text={$message}"
            );
        } catch (\Exception $e) {
        }
    }
}
