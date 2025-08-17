<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\NewUserRegisteredMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminEmailListener
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
        Mail::to('admin@example.com')->send(new NewUserRegisteredMail($event->user));
    }
}
