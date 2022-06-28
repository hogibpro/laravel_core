<?php

namespace App\Services;

use App\Models\User;
use App\Hashing\Hasher;
use App\Mail\Mailer;

class UserService
{
    protected $hasher;
    protected $mailer;

    public function __construct(Hasher  $hasher, Mailer $mailer)
    {
        $this->hasher = $hasher; 
        $this->mailer = $mailer;
    }

    public function register($request)
    {
        $user = new User();
        $user->password = $this->hasher->make($request->get('password'));
        $user->email = 'hodh6c3@gmail.com';
        $this->mailer->send($user->email, 'user.register', ['user' => $user]);
    }
}