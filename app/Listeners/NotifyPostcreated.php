<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactusMail;
use App\Models\User;
use App\Models\Post;

class NotifyPostcreated
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {

        $users=User::all();
        foreach($users as $user){
            $email = new ContactusMail($user->name);
            Mail::to($user)->send($email);
        }
        //
    }
}
