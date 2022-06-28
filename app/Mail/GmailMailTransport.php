<?php

namespace App\Mail;

use App\Mail\MailTransport;

class GmailMailTransport implements MailTransport
{
    public function send($to, $content){
        echo "Send email to: {$to} via gmail with content: {$content}";
    }
}