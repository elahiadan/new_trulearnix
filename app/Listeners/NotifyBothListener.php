<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserRegisteredNotification;

class NotifyBothListener
{
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
    public function handle(UserRegisteredEvent $event): void
    {
        Notification::route('mail', 'admin@example.com')
            ->route('mail', $event->user->email)
            ->notify(new NewUserRegisteredNotification($event->user));
    }
}
