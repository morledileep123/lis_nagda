<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComposeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantData;
    public $data;
    // public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applicantData)
    {
        $file = $applicantData['file'];
        $data = $applicantData['data'];
        $exe = $applicantData['exe'];
        $this->exe = $exe;
        $this->data = $data;
        $this->file = base64_encode($file);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->subject('Lakshya Internation School, Nagda')
                    ->view('admin.composeSmsAndEmail.email.mail-tempalte')->attachData(base64_decode($this->file), 'LIS,Nagda.'.$this->exe, [
                            'mime' => 'application/'.$this->exe,
                        ]);
    }
}
