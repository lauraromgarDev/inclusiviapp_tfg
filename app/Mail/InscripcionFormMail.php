<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InscripcionFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datosInscripcion;

    /**
     * Create a new message instance and pass the details to the view.
     *
     * @param array $datosInscripcion
     */
    public function __construct($datosInscripcion)
    {
        $this->datosInscripcion = $datosInscripcion;
    }

    /**
     * Build the message and send it to the specified recipients.
     *
     * @return $this
     */
    public function build()
    {
//        dd($this->datosInscripcion);

        return $this->subject('Nueva inscripción en proyectos')
            ->view('emails.infoProyectos')
            ->with('datosInscripcion', $this->datosInscripcion)
            ->locale(app()->getLocale());
    }

}
