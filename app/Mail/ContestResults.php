<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class ContestResults extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($winningcreation, $user)
    {
        $this->winningcreation = $winningcreation;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('robin.deherdt@student.kdg.be')
        ->view('emails.contestresults')
        ->with(['winner_id' => $this->user->id,
                'winner_fname' => $this->user->first_name,
                'winner_lname' => $this->user->last_name,
        ]);
    }
}
