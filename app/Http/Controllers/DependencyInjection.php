<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DependencyInjection extends Controller
{
    /**
     * tao 1 class sha1 ma hoa passwork
     * tao 1 class de send gmail
     * Dependency Injectiom vap trong ServiceDependencyInjection
     */
    public function register()
    {
        $serviceDependencyInjection = new ServiceDependencyInjection(new Sha1, new Gmailer(new Gmail));
        return $serviceDependencyInjection->beforeSend('passwork', 'e@gmail.com');
    }
}

interface Sha1Interface
{
    public function make(string $passwork);
}

interface GmailInterface
{
    public function send($to, $content);
}

class Sha1 implements Sha1Interface
{
    public function make(string $passwork)
    {
        return sha1($passwork);
    }
}

class Gmail implements GmailInterface
{
    public function send($to, $content)
    {
        echo "to: {$to}, content: {$content}";
    }
}

class Gmailer
{
    protected $gmail;

    public function __construct(GmailInterface $gmail)
    {
        $this->gmail = $gmail;
    }

    public function send($to)
    {
        $this->gmail->send($to, $this->compose());
    }

    public function compose()
    {
        return 'compose content';
    }
}
 
class ServiceDependencyInjection
{
    protected $sha1; 
    protected $gmail;
    public function __construct(Sha1Interface $sha1, Gmailer $gmail)
    {
        $this->sha1 = $sha1; 
        $this->gmail = $gmail;
    }

    public function beforeSend($passwork, $gmailTo)
    {
        ($this->sha1->make($passwork)) 
        ? 
        $this->gmail->send($gmailTo) 
        : 
        throw new \Exception("faile to send");

        dd($this->sha1->make($passwork));
    }
}
