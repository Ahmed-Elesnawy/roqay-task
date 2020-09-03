<?php

namespace App\Listeners\Admin;

use App\Mail\AdminForgetPassword;
use Illuminate\Support\Facades\Mail;
use App\Events\Admin\PasswordForgotten;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResetLinkMail
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
     * @param  PasswordForgotten  $event
     * @return void
     */
    public function handle(PasswordForgotten $event)
    {
        Mail::to($event->admin->email)
            ->send(new AdminForgetPassword($event->admin,$event->token));
    }
}
