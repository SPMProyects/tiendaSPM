<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Configuration;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject, $data, $configurations;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->configurations = Configuration::first();
        $this->subject = 'Bienvenido a ' . json_decode($this->configurations->general)->store_name;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])->view('emails.newuser');
    }
}
