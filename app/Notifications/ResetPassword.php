<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
        $subject = sprintf("[%s] %s", settings('app_name'), trans('app.reset_password'));

        return (new MailMessage)
            ->from('reservation@caravane2.com','Reservation Package Caravane2.com')
            //->subject($subject)
            ->line(trans('app.request_for_password_reset_made'))
            ->action(trans('app.reset_password'), url('password/reset', $this->token))
            ->line(trans('app.if_you_did_not_requested'));
    }
}
