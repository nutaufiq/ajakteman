<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invite extends Mailable
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
        return $this->subject('[OLX Ajak Teman] Terima kasih telah mengajak '.$this->data['x'].' teman untuk pasang iklan di OLX!')
                    ->view('emails.invite')
                    ->with([
                        'x'  => $this->data['x'],
                    ]);
    }
}
