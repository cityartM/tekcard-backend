<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class UserRegistered extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*$subject = sprintf("[%s] %s", setting('app_name'), __('New User Registration'));
        return $this->subject($subject)->markdown('mail.user-registered');*/

        return $this->markdown('mail.userSignup')
            ->from('noreply@justravel.pro', 'Just Travel')
            ->replyTo('contact@justravel.pro')
            ->subject("Bonne nouvelle, votre compte a été activé | Justravel.pro");
    }
}
