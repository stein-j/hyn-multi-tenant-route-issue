<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RouteMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $url_before;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->url_before = route('world');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.routeMail')
            ->from('support@route.com')->with([
            'url_on_build' => route('world'),
            'url_before' => $this->url_before
        ]);
    }
}
