<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

    class ContactMail extends Mailable
    {
        use Queueable, SerializesModels;

        public $details;

        /**
         * Create a new message instance and pass the details to the view.
         * @return void
         */
        public function __construct($details)
        {
            $this->details = $details;
        }

        /**
         * Build the message and send it to the specified recipients.
         * @return $this
         */

        public function build()
        {
            return $this->subject('Correo de inclusiviapp')
                ->view('emails.info')
                ->with('details', $this->details);
        }


    }
