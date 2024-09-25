<?php

namespace App\Listeners;

use App\Events\LoggedIn;
use App\Notifications\LoginNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 5;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoggedIn $event): void
    {
        try {
            $event->user->notify(new LoginNotification());

            //more codes for other things
        } catch (\Exception $e) {
            //
        }
    }
}
