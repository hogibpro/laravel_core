<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailTransport;
use App\Services\UserService;

class UserController extends Controller 
{
    private $userService;
    //khi khoi tao laravel dung container de khoi tao no se doc vao __construct de khoi tao
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {dump($this->userService,$this->service,$this->service);
        // $service = new UserService(
        //     new Sha1Hasher('0123'), 
        //     new Mailer(new FakeMailTransport)
        // );

        // $container = Container::getInstance();
        // $container->bind(Hasher::class, Sha1Hasher::class);
        // $container->bind(MailTransport::class, FakeMailTransport::class);
        // $container->bind(MailTransport::class, GmailMailTransport::class);
        /*
        * sau khi khai bao singleton tat ca instance se cho khai bao 1 lan 
        * khong can phai NEW nhieu lan
        */
        // $container->singleton(UserService::class);
        // $service = $container->make(UserService::class);

        // $appRequest = app('request');
        // dd($appRequest, $request);
        // dd($service, $container->make(UserService::class), $container->make(UserService::class));
        $this->userService->register($request);
    }
}

// interface Hasher
// {
//     /**
//      * 
//      * @param string $value
//      * @return string
//      */
//     public function make($value);

//     /**
//      * @param string $value
//      * @param string $hasher
//      * @return boolean
//      */
//     public function verify($value, $hasher);
// } 

// class Sha1Hasher implements Hasher
// {
//     private $salt;

//     public function __construct($salt = '012233')
//     {
//         $this->salt = $salt;
//     }

//     /**
//      * @param string $value
//      * @return string
//      */
//     public function make($value)
//     {
//         return sha1($value . $this->salt);
//     }

//     /**
//      * @param string $value
//      * @param string $hasher
//      * @return boolean
//      */
//     public function verify($value, $hasher)
//     {
//         return $this->make($value) === $hasher;
//     }
// }

// interface MailTransport
// {
//     public function send($to, $content);
// }

// class GmailMailTransport implements MailTransport
// {
//     public function send($to, $content){
//         echo "Send email to: {$to} via gmail with content: {$content}";
//     }
// }

// class FakeMailTransport implements MailTransport
// {
//     protected $sents = [];

//     public function send($to, $content){
//         echo "Send email to: {$to} via fake gmail with content: {$content}";
//         $this->sents[$to][] = $content;
//     }

//     public function assertSent($to)
//     {
//         if (! isset($this->sents[$to])) {
//             throw new \Exception("Fail to asserts sending email to address: {$to}");
//         }
//     }
// }

// class Mailer
// {
//     private $transport;

//     public function __construct(MailTransport $transport)
//     {
//         $this->transport = $transport;
//     }

//     public function send($to, string $template, array $data = [])
//     {
//         $composed = $this->compose($template, $data);
//         $this->transport->send($to, $composed);
//     }

//     private function compose(string $template, array $data)
//     {
//         return "hello {$data['user']}";
//     }
// }

// class UserService
// {
//     protected $hasher;
//     protected $mailer;

//     public function __construct(Hasher  $hasher, Mailer $mailer)
//     {
//         $this->hasher = $hasher; 
//         $this->mailer = $mailer;
//     }

//     public function register(Request $request)
//     {
//         $user = new User();
//         $user->password = $this->hasher->make($request->get('password'));
//         $user->email = 'hodh6c3@gmail.com';
//         $this->mailer->send($user->email, 'user.register', ['user' => $user]);
//         // dd($user);
//     }

//     /*  neu khong su dung dependency injection thi cu moi khi su dung 1 
//         function lai phai khai bao moi cac class

//         public function register1(Request $request)
//         {
//             $hasher = new Sha1Hasher('0123');
//             Tao user
//             $user = new User();
//             //hash password
//             $user->password = $this->hasher->make($request->get('password'));
//             $user->email = 'hodh6c3@gmail.com';
//             //send mail
//             $mailer = new Mailer(new GmailMailTransport);
//             $this->mailer->send($user->email, 'user.register', ['user' => $user]);
//             dd($user);
//         }

//         public function register2(Request $request)
//         {
//             $hasher = new Sha1Hasher('01235433');
//             Tao user
//             $user = new User();
//             //hash password
//             $user->password = $this->hasher->make($request->get('password'));
//             $user->email = 'hodh6c3@gmail.com';
//             //send mail
//             $mailer = new Mailer(new GmailMailTransport);
//             $this->mailer->send($user->email, 'user.register', ['user' => $user]);
//             dd($user);
//         }

//         ....
//     */
// }
