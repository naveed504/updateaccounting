<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactusMail extends Mailable
{
    use Queueable, SerializesModels;
protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        try {
            $this->from('Accounting@gmail.com' ,'Inaction Photos')
                ->subject('Thank You For Contacting Us')
                ->view('admin.jobs.template')
                ->with('data', $this->data);
        } catch (Exception $e) {
           return $e->getMessage();
        }
     
    }
}
