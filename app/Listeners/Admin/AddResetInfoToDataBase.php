<?php

namespace App\Listeners\Admin;

use Illuminate\Support\Facades\DB;
use App\Events\Admin\PasswordForgotten;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddResetInfoToDataBase
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
        DB::table('password_resets')->insert([

            'email'      => $event->admin->email,
            'token'      => $event->token,
            'created_at' => now() 
            
        ]);
    }
}
