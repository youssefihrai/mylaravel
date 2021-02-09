<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\User;
use Illuminate\Http\Request;

class UserCommentController extends Controller
{
    public function store(StoreComment $request,User $user ){
        $user->comments()->create([

            'content'=> $request->content,
            'user_id'=>$request->user()->id,
        ]
        );
       return redirect()->back();
    }

}
