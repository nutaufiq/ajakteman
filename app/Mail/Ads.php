<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Ads extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[OLX Ajak Teman] Jangan lupa untuk pasang iklan-mu untuk mendapatkan Saldo OLX!')
                    ->view('emails.ads')
                    ->with([
                        'name'  => $this->data['name'],
                    ]);
    }
}
