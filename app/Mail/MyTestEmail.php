<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use App\Models\User;

class MyTestEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The User instance.
     * 
     * @var \App\Models\User
     * 
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\User $user
     * 
     * @return void
     */



    public function __construct(User $user)
    {
        //
        // dd('Name:'.$user->name);
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');

        return $this
            ->view('email_templates.test-email')
            ->subject('Account Opening – Verification Code
            ')
            ->with([
                'OTP' => $this->user->otp
            ]);
    }
}
