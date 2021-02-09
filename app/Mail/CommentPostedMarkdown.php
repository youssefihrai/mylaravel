<?php

namespace App\Mail;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentPostedMarkdown extends Mailable //implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
           $this->comment=$comment;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { $subjet="ce email est consacre a ce post ".$this->comment->commentable->title;
        return $this
        ->subject($subjet)->
        markdown('commentmarkdown');
    }
}
