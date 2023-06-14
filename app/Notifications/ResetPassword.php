<?php



namespace App\Notifications;



use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Messages\MailMessage;



class ResetPassword extends Notification {



    public $token;



    public function __construct($token) {

        $this->token = $token;

    }



    public function via($notifiable) {

        return ['mail'];

    }



    public function toMail($notifiable) {

        

        $plaintext = $notifiable->email;



        $email = base64_encode($plaintext);

        return (new MailMessage)

                        ->from('customerservice@rescueteststrips.com','Rescue Test Strips')

                        ->view('mails.reset', ['token' => $this->token, 'email' => $email]);

    }



}

