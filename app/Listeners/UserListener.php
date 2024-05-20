<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Mail\RegistrationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserListener
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
    public function handle(UserEvent $event): void
    {
        $user = $event->user;
        Mail::to($user['email'])->send(new RegistrationMail($user));
    }
}
