<?php
namespace App\Subscribers\Models;

use App\Events\UserCreated;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Contracts\Events\Dispatcher;

class UserSubscriber
{
    public function subscribe(Dispatcher $events){
        $events->listen(UserCreated::class, SendWelcomeEmail::class.'@handle');
    }    
}
