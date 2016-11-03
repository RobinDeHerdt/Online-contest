<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyExcel extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $storagePath       = storage_path();

        return $this->from('robindh95@gmail.com', 'Humo')
        ->subject('Deelnemerslijst')
        ->view('emails.dailyexcel')
        ->attach($storagePath . "/exports/deelnemers.xlsx");
    }
}
