<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Krucas\Notification\Notification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
        // Fired on each authentication attempt...
        $events->listen('auth.attempt', function ($credentials, $remember, $login) {
        	//
        });
        
        // Fired on successful logins...
        $events->listen('auth.login', function ($user, $remember) {
        	//
        	console.log('login');
        	\Notification::success('Login Successful');
        	
        });
        
        // Fired on logouts...
        $events->listen('auth.logout', function ($user) {
        	//
        });
    }
}
