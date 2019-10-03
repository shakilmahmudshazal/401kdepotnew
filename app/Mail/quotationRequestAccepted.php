<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class quotationRequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $quotationRequest;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quotationRequest)
    {
        //
        $this->quotationRequest = $quotationRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.quotationRequestAccepted');
    }
}
