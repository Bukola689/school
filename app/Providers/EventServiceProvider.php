<?php

namespace App\Providers;

use App\Events\Auth\ResetPassword;
use App\Events\Userlogin;
use App\Events\UserRegistered;
use App\Listeners\Auth\ResetPasswordMail;
use App\Listeners\UserloginMail;
use App\Listeners\UserRegisteredMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ResetPassword::class => [
            ResetPasswordMail::class
        ],

        UserRegistered::class => [
            UserRegisteredMail::class
        ],

        Userlogin::class => [
            UserloginMail::class
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
