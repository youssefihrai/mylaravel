<?php

namespace App\Http\Controllers;

use App\Events\CommentPosted;
use App\Http\Requests\StoreComment;
use App\Http\Resources\CommentRessource;
use App\Mail\CommentPostedMarkdown;
use App\Mail\PostComment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostCommentsController extends Controller
{

    public function store(StoreComment $request,Post $post ){

        $comment = $post->comments()->create([
            'content' => $request->content,
            'entreprise_id' => Auth::guard('entreprise')->user()->id
        ]);
     
       return redirect()->back();
    }
    public function show(Post $post){
       
       return   CommentRessource::collection($post->comments()->with('user')->get());//pour retourner une liste

    }
}
//$post->comment relation lazy pour des petit ligne selectionne



