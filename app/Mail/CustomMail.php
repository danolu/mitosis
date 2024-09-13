<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Site;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
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
                    ->subject($this->data->subject)
                    ->view('email.custom')
                    ->with($this->data);
    }
}