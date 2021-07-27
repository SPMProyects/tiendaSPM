<?php

namespace App\Mail;

use App\Configuration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $request, $data, $configurations;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($request, $data)
    {   
        $this->configurations = Configuration::first();
        $this->request = $request;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])->view('emails.contact');
    }
}
