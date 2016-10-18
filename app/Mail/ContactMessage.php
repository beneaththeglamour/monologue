<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $from_name;
    private $from_email;
    private $contact_msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_name, $from_email, $contact_msg)
    {
        $this->from_name = $from_name;
        $this->from_email = $from_email;
        $this->contact_msg = $contact_msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('CONTACT_EMAIL_FROM'), env('CONTACT_EMAIL_FROM_NAME'))
            ->subject('Message received from '.$this->from_name)
            ->view('emails.contact', [
                'from_name' => $this->from_name,
                'from_email' => $this->from_email,
                'contact_msg' => $this->contact_msg
            ]);
    }
}
