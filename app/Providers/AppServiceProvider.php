<?php

namespace App\Providers;

use App\Hashing\Hasher;
use App\Hashing\Sha1Hasher;
use App\Mail\FakeMailTransport;
use App\Mail\GmailMailTransport;
use App\Mail\MailTransport;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Hasher::class, Sha1Hasher::class);
        //khai bao dependency injection su dung binding
        // $this->app->bind(Sha1Hasher::class, function () {
        //     return new Sha1Hasher('099ss');
        // });
        $this->app->instance(Sha1Hasher::class, new Sha1Hasher('099ss'));
        //end
        $this->app->bind(MailTransport::class, GmailMailTransport::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
