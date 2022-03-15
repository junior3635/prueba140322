<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $logs;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($logs,$user)
    {
        $this->logs = $logs;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.template');
    }
}
