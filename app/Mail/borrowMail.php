<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Borrow;

class borrowMail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrow;
    public $reader;
    public $book;
    public $borrowedDate;
    public $returnDate;


    public function __construct($borrow)
    {
        $this->reader = $borrow->user->first_name." ". $borrow->user->last_name;
        $this->book = $borrow->book->name;
        $this->borrowedDate = $borrow->issued_at;
        // $this->returnDate = $borrow->return_date;
    }

    public function build()
    {
        return $this->view('emails.borrowed_book');
    }
}
