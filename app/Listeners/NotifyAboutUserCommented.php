<?php

namespace App\Listeners;

use App\Events\CommentPosted;
use App\Mail\CommentPostedMarkdown;
use App\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAboutUserCommented
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
     * @param  object  $event
     * @return void
     */
    public function handle(CommentPosted $event)//le  code que  tu vas l'executer
    {
    
        $nows=now()->addMinute(1);
        Mail::to($event->comment->commentable->user->email)->later($nows,new CommentPostedMarkdown( $event->comment)); 
    }
}
