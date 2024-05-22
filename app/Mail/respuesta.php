<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class respuesta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mensajeid;

    /**
     * Create a new message instance.
     */
    public function __construct($mensajeid)
    {
        $this->mensajeid = $mensajeid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Respuesta de mensaje')
                ->view('mails.respuesta', ['mensajeid' => $this->mensajeid]);
    }
}