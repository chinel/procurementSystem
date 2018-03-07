<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VendorSend extends Mailable
{
    use Queueable, SerializesModels;
    private $email;
    private $name;
    private $company;
    private $password;
    private $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name, $company, $password, $phone)
    {
        $this->email = $email;
        $this->name = $name;
        $this->company = $company;
        $this->password = $password;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("info@procuresystem.com")->subject("Registration on Procurement Portal")->view("emails.send")
            ->with('email', $this->email)
            ->with('name', $this->name)
            ->with('company', $this->company)
            ->with('password', $this->password)
            ->with('phone', $this->phone);
    }
}
