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
    public $email_from;
    public $name_from;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email_content, $email_from, $name_from)
    {
        $this->subject = $subject;
        $this->email_content = $email_content;
        $this->email_from = $email_from;
        $this->name_from = $name_from;
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
        $email_from = $this->email_from;
        $name_from = $this->name_from;
        
        return $this->subject($subject)->view('email_blast.blast', compact('template'))->from($email_from, $name_from);
    }
}
