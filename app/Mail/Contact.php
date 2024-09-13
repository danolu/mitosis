<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Site;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $site = Site::firstOrFail();
        $this->email = $site->support_email;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->subject('New Customer Enquiry')
                    ->view('email.contact')
                    ->with(['name' => $this->data['name'],
                            'email' => $this->data['email'],
                            'content' => $this->data['content']]);
    }
}