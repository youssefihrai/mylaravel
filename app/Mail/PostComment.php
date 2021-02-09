<?php

namespace App\Mail;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PostComment extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Comment $comment)
    {
    $this->comment=$comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subjet="ce email est consacre a ce post ".$this->comment->commentable->title;
        return 
        $this
        ->subject($subjet)->
      /*solution 1 
      attach(storage_path('app/public').'/'.$this->comment->user->image->path,
       ['as'=>'profil'.$this->comment->user->name,
       ])*/
       //solution 2
       attachFromStorage($this->comment->user->image->path,'profile_image')
       -> view('comments');
    }
}
