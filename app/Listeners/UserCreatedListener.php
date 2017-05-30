<?php

namespace App\Listeners;

use App\Classes\smsHelper;
use App\Events\UserCreatedEvent;
use App\Mail\LeadCreated;
//use App\Notifications\NewUserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreatedEvent  $event
     * @return void
     */
    public function handle(UserCreatedEvent $event)
    {
        Mail::to($event->lead)->send(new LeadCreated($event->lead));
        $smsHelper = new smsHelper();
        $smsHelper->sendSms($event->lead);
    }
}
