<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManagerInsertMail extends Mailable
{
    use Queueable, SerializesModels;

    public $manager_request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($manager_request)
    {
        $this->manager_request = $manager_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.mails.manager_request', ['solicitare' => $this->manager_request])
            ->subject('Request to register');
    }
}
