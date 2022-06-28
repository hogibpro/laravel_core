<?php

namespace App\Mail;

use App\Mail\MailTransport;

class Mailer
{
    private $transport;

    public function __construct(MailTransport $transport)
    {
        $this->transport = $transport;
    }

    public function send($to, string $template, array $data = [])
    {
        $composed = $this->compose($template, $data);
        $this->transport->send($to, $composed);
    }

    private function compose(string $template, array $data)
    {
        return "hello {$data['user']}";
    }
}