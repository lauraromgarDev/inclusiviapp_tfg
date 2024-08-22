<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class InterpretationRequestMail extends Mailable
{

    use Queueable, SerializesModels;

    public $datosSolicitud;
    public $locale;

    /**
     * Create a new message instance and pass the details to the view.
     * @return void
     */
    public function __construct(array $datosSolicitud, string $locale)
    {
        $this->datosSolicitud = $datosSolicitud;
        $this->locale = $locale;
    }

    /**
     * @return $this
     * Build the message and send it to the specified recipients.
     */
    public function build()
    {
        return $this->subject('Nueva solicitud de interpretación')
            ->view('emails.interpretationRequest', ['datosSolicitud' => $this->datosSolicitud]);
    }

}
