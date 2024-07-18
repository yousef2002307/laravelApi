<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
class SendWelcomeEmail
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
    public function handle(object $event): void
    {
      dump("post created");
      // \Illuminate\Support\Facades\Mail::to($event->user)->send(new \App\Mail\WelcomeMail($event->user));


     
    }
}
