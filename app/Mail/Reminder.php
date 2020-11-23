<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $pathToImage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function __construct($event)   {
        $this->event = $event;
        $this->contact = "Foo Bar";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        // return $this->view('emails.reminder');
        // return $this->from('hello@app.com', '<From Cool Application>')->view('emails.reminder');
        // return $this->from("hello@app.com", "From Cool Application")->subject("Remember Me!")->view("emails.reminder");
        // return $this->from("hello@app.com", "From Cool Application")->subject("Remember Me!")->view("emails.reminder")->text('emails.reminder_plain');
        // return $this->from('hello@app.com', 'Ваше приложение')->subject('Напоминание о событии: ' . $this->event)->view('emails.reminder')->text('emails.reminder_plain');
        // return $this->from('hello@app.com', 'Ваше приложение')->subject('Напоминание о событии: ' . $this->event)->view('emails.reminder')->text('emails.reminder_plain')->with(['contact' => $this->contact]);
        $this->pathToImage = public_path().'/img/avatar.png';
        return $this->from('hello@app.com', 'Ваше приложение')->subject('Напоминание о событии: ' . $this->event)->view('emails.reminder')->text('emails.reminder_plain')->with(['contact' => $this->contact])
        ->withPathToImage($this->pathToImage);
        
        // ->attach(public_path().'/img/avatar.png');
        // ->attach(public_path().'/path/to/file', [
        //     'as' => 'name.pdf',
        //     'mime' => 'application/pdf',
        // ]);

        // ->attachFromStorage('/thumbnail.jpg');
        // ->attachFromStorage('/path/to/file', 'name.pdf', [
        //     'mime' => 'application/pdf'

        // ->attachFromStorageDisk('s3', '/path/to/file');


    }

    
    
}
