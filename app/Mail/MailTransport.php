<?php

namespace App\Mail;

interface MailTransport
{
    public function send($to, $content);
}