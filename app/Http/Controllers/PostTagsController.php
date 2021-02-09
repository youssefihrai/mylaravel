<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class PostTagsController extends Controller
{
    public function index($id){
        $tag=Tag::find($id);
        return view(
            'post.index',
            [
                "posts"=>$tag->posts()->postwithusertagcommentspostwithusertagcomments()->get()
                ,'tab'=>"archive"
            ]
        );
    }
}
