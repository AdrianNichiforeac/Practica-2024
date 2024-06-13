<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OperatorInsertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $operator_request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($operator_request)
    {
        $this->operator_request = $operator_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.mails.operator_request', ['solicitare' => $this->operator_request])
            ->subject('Request to register');
    }
}
