<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DriverInsertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $driver_request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($driver_request)
    {
        $this->driver_request = $driver_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.mails.driver_request', ['solicitare' => $this->driver_request])
            ->subject('Request to register');
    }
}
