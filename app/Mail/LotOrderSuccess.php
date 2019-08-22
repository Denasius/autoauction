<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LotOrderSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->mail = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.lot_buy_one_click_client');
    }
}
