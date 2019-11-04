<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookReservationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $book;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book, $user)
    {
        $this->book = $book;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.books.reservation');
    }
}
