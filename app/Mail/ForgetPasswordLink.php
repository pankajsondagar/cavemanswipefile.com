<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
class ForgetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;
 
    public $body;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Password Reset Request for Caveman Leads...')
            ->markdown('emails.forget_password',[['data' => $this->body]]);
    }
}