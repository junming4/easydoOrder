<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $sendEmailContract;
    protected $type;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $type = 'default')
    {
        $this->email = $email;
        $this->type = $type;
        $this->sendEmailContract = app('App\Repositories\SendEmail\SendEmailContract');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code = rand(1000, 9999);
        $this->sendEmailContract->setCode($this->email, $this->type, $code);
        return $this->from(env('MAIL_USERNAME'))->view('email.sendEmailCode')
            ->with(['code'=>$code]);
    }
}
