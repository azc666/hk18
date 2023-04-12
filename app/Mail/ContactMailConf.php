<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailConf extends Mailable
{
    use Queueable, SerializesModels;

    public $loc_name;
    public $name;
    public $email;
    public $msg;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loc_name = session('loc_name');
        $this->name = session('name');
        $this->email = session('email');
        $this->msg = session('msg');
        $this->type = session('type');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@g-d.com')
            ->subject('Your Message Confirmation')
            ->markdown('emails.contact');
    }
}