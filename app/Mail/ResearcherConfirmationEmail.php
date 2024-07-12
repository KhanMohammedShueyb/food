<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResearcherConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
        
        $this->url = 'http://localhost:8000';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sohail@affinity.com')
                ->subject('Authenticate Researcher')
                ->view('email_templates.researcher_confirmation',[
                    'user' => $this->user,
                    'url' => $this->url
            ]);
    }
}
