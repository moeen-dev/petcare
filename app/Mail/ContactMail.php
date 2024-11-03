<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $fromName;
    public $fromMail;

    public function __construct($data, $fromName = null, $fromMail = null)
    {
        $this->data = $data;
        $this->fromName = $fromName ?? config('mail.from.name');
        $this->fromMail = $fromMail ?? config('mail.from.address');
    }

    public function build()
    {
        return $this->from($this->fromMail, $this->fromName)->view('frontend.emails.form-submission')->with(['data' => $this->data]);
    }
}
