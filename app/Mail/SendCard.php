<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCard extends Mailable
{
    use Queueable, SerializesModels;

    public $card;

    public function __construct($card)
    {
        $this->card = $card;
    }

    public function build()
    {
        return $this->subject('Subject of the Email')
                    ->view('card');
    }
}
