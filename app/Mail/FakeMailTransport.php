<?php

namespace App\Mail;

use App\Mail\MailTransport;

class FakeMailTransport implements MailTransport
{
    protected $sents = [];

    public function send($to, $content){
        echo "Send email to: {$to} via fake gmail with content: {$content}";
        $this->sents[$to][] = $content;
    }

    public function assertSent($to)
    {
        if (! isset($this->sents[$to])) {
            throw new \Exception("Fail to asserts sending email to address: {$to}");
        }
    }
}