<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email_content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email_content)
    {
        $this->subject = $subject;
        $this->email_content = $email_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $template = $this->email_content;
        $subject = $this->subject;
        
        return $this->subject($subject)->view('email_blast.blast', compact('template'))->from('no-reply@momentuminternet.my', 'Momentum Internet Sdn Bhd');
    }
}
